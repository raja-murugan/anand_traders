<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use App\Models\Expense;
use App\Models\Expense_note_cost;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use PDF;

class ExpenseController extends Controller
{
    public function index()
    {
        $today = Carbon::now()->format('Y-m-d');
        $data = Expense::where('soft_delete', '!=', 1)->where('date', '=', $today)->orderBy('id', 'DESC')->get();
        $from_date = $today;
        $to_date = $today;

        return view('page.backend.expense.index', compact('data', 'from_date', 'to_date', 'today'));
    }


    public function datefilter(Request $request) {
        $fromdate = $request->get('from_date');
        $todate = $request->get('todate');
        $today = Carbon::now()->format('Y-m-d');
        $data = Expense::whereBetween('date', [$fromdate, $todate])->where('soft_delete', '!=', 1)->orderBy('id', 'DESC')->get();

        
            $from_date = $fromdate;
            $to_date = $todate;
        

        return view('page.backend.expense.index', compact('data', 'from_date', 'to_date', 'today'));
    }



    public function expense_pdfexport($from_date, $to_date) 
    {
        $expesen_exportdate_arr = [];

        $ExpenseData = Expense::whereBetween('date', [$from_date, $to_date])->where('soft_delete', '!=', 1)->get();
        if($ExpenseData != ""){
            foreach ($ExpenseData as $key => $ExpenseDatas) {
                $expesen_exportdate_arr[] = $ExpenseDatas->date;
            }
        }

           
        usort($expesen_exportdate_arr, function ($a, $b) {
            $dateTimestamp1 = strtotime($a);
            $dateTimestamp2 = strtotime($b);
    
            return $dateTimestamp1 < $dateTimestamp2 ? 1 : -1;
        });

        $Expensearr_data = [];
        foreach (array_unique($expesen_exportdate_arr) as $key => $date_array) {
            $Expensedatearr = Expense::where('date', '=', $date_array)->where('soft_delete', '!=', 1)->get();
            foreach ($Expensedatearr as $key => $Expensedatearray) {

                $bank_id = Bank::findOrFail($Expensedatearray->bank_id);

                $Expensedetaildatearr = Expense_note_cost::where('expenses_id', '=', $Expensedatearray->id)->where('soft_delete', '!=', 1)->get();
                foreach ($Expensedetaildatearr as $key => $Expensedetails_datearr) {

                    $Expensearr_data[] = array(
                        'date' => $date_array,
                        'bank' => $bank_id->name,
                        'price' => $Expensedetails_datearr->price,
                        'note' => $Expensedetails_datearr->note,
                    );
                }

                
            }
        }



        $pdf = Pdf::loadView('page.backend.expense.expensepdfexport_view', [
            'Expensearr_data' => $Expensearr_data,
            'from_date' => $from_date,
            'to_date' => $to_date,
            
        ]);
        $name = 'Expense' . $from_date . '-' . $to_date . '.' . 'pdf';
        return $pdf->stream($name);

        
    }

    public function create()
    {
        $today = Carbon::now()->format('Y-m-d');
        $timenow = Carbon::now()->format('H:i');

        $bank = Bank::where('soft_delete', '!=', 1)->get();

        $Latest_expense = Expense::latest('id')->first();
        if($Latest_expense != ''){
            $expence_number = $Latest_expense->expence_number + 1;
        }else {
            $expence_number = 1;
        }

        return view('page.backend.expense.create', compact('today', 'timenow', 'expence_number', 'bank'));
    }


    public function store(Request $request)
    {
        $randomkey = Str::random(5);

        $data = new Expense();

        $data->unique_key = $randomkey;
        $data->expence_number = $request->get('expence_number');
        $data->date = $request->get('date');
        $data->time = $request->get('time');
        $data->bank_id = $request->get('bank_id');
        $data->grand_total = $request->get('total_expense_amount');
        $data->add_on_note = $request->get('add_on_note');

        $data->save();

        $expense_id = $data->id;

        foreach ($request->get('note') as $key => $note) {
            if ($note != "") {

                $Expencenote = new Expense_note_cost();

                $Expencenote->expenses_id = $expense_id;
                $Expencenote->note = $request->note[$key];
                $Expencenote->price = $request->expense_price[$key];

                $Expencenote->save();
            }
        }

        return redirect()->route('expense.index')->with('message', 'Added !');
    }

    public function edit($unique_key)
    {
        $ExpenseData = Expense::where('unique_key', '=', $unique_key)->first();
        $ExpenseNote = Expense_note_cost::where('expenses_id', '=', $ExpenseData->id)->get();

        $bank = Bank::where('soft_delete', '!=', 1)->get();

        return view('page.backend.expense.edit', compact('ExpenseData', 'ExpenseNote', 'bank'));
    }


    public function update(Request $request, $unique_key)
    {
        $ExpenseData = Expense::where('unique_key', '=', $unique_key)->first();

        $ExpenseData->expence_number = $request->get('expence_number');
        $ExpenseData->date = $request->get('date');
        $ExpenseData->time = $request->get('time');
        $ExpenseData->bank_id = $request->get('bank_id');
        $ExpenseData->grand_total = $request->get('total_expense_amount');
        $ExpenseData->add_on_note = $request->get('add_on_note');

        $ExpenseData->update();

        $expense_id = $ExpenseData->id;


        $getInserted = Expense_note_cost::where('expenses_id', '=', $expense_id)->get();
        $notecosts = array();
        foreach ($getInserted as $key => $getInserted_notecost) {
            $notecosts[] = $getInserted_notecost->id;
        }

        $updated_notecost = $request->expense_details_id;
        $updated_notecost_arr = array_filter($updated_notecost);
        $different_ids = array_merge(array_diff($notecosts, $updated_notecost_arr), array_diff($updated_notecost_arr, $notecosts));

        if (!empty($different_ids)) {
            foreach ($different_ids as $key => $different_id) {
                Expense_note_cost::where('id', $different_id)->delete();
            }
        }


        foreach ($request->get('expense_details_id') as $key => $expense_details_id) {
            if ($expense_details_id > 0) {

                $expense_price = $request->expense_price[$key];
                $note = $request->note[$key];

                DB::table('expense_note_costs')->where('id', $expense_details_id)->update([
                    'expenses_id' => $expense_id, 'price' => $expense_price, 'note' => $note
                ]);
            } else if ($expense_details_id == '') {
                

                    $Expencenote = new Expense_note_cost();
    
                    $Expencenote->expenses_id = $expense_id;
                    $Expencenote->note = $request->note[$key];
                    $Expencenote->price = $request->expense_price[$key];
    
                    $Expencenote->save();
                
            }
        }


        return redirect()->route('expense.index')->with('message', 'Updated !');


    }

    public function delete($unique_key)
    {
        $data = Expense::where('unique_key', '=', $unique_key)->first();

        $data->soft_delete = 1;

        $data->update();

        return redirect()->route('expense.index')->with('warning', 'Deleted !');
    }
}
