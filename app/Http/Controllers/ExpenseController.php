<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use App\Models\Expense;
use App\Models\Expense_note_cost;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ExpenseController extends Controller
{
    public function index()
    {
        $data = Expense::where('soft_delete', '!=', 1)->get();

        return view('page.backend.expense.index', compact('data'));
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
        $data->grand_total = $request->get('grand_total');
        $data->add_on_note = $request->get('add_on_note');

        $data->save();

        $expense_id = $data->id;

        foreach ($request->get('note') as $key => $note) {
            if ($note != "") {

                $Expencenote = new Expense_note_cost();

                $Expencenote->expenses_id = $expense_id;
                $Expencenote->note = $request->note[$key];
                $Expencenote->price = $request->price[$key];

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

    public function delete($unique_key)
    {
        $data = Expense::where('unique_key', '=', $unique_key)->first();

        $data->soft_delete = 1;

        $data->update();

        return redirect()->route('expense.index')->with('warning', 'Deleted !');
    }
}
