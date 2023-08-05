<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Quotation;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;
use PDF;

class QuotationController extends Controller
{
    public function index()
    {
        $data = Quotation::where('soft_delete', '!=', 1)->get();
        return view('page.backend.quotation.index', compact('data'));
    }


    public function create()
    {
        $customer = Customer::where('soft_delete', '!=', 1)->get();
        $today = Carbon::now()->format('Y-m-d');
        $timenow = Carbon::now()->format('H:i');



        return view('page.backend.quotation.create', compact('customer', 'today', 'timenow'));
    }


    public function store(Request $request)
    {
        $randomkey = Str::random(5);

        $data = new Quotation();

        $data->unique_key = $randomkey;
        $data->quotation_number = $request->get('quotation_number');
        $data->date = $request->get('date');
        $data->time = $request->get('time');
        $data->customer_id = $request->get('customer_id');
        $data->sub_total = $request->get('sub_total');
        $data->discount_price = $request->get('discount_price');
        $data->final_amount = $request->get('final_amount');
        $data->extracost_amount = $request->get('extracost_amount');
        $data->grand_total = $request->get('grand_total');
        $data->paid_amount = $request->get('paid_amount');
        $data->balance_amount = $request->get('balance_amount');
        $data->add_on_note = $request->get('add_on_note');

        $data->save();


        return redirect()->route('quotation.index')->with('add', 'Quotation Data added successfully!');
    }



    public function edit(Request $request, $unique_key)
    {
        $QuotationData = Quotation::where('unique_key', '=', $unique_key)->first();

        $QuotationData->date = $request->get('date');
        $QuotationData->time = $request->get('time');
        $QuotationData->customer_id = $request->get('customer_id');
        $QuotationData->sub_total = $request->get('sub_total');
        $QuotationData->discount_price = $request->get('discount_price');
        $QuotationData->final_amount = $request->get('final_amount');
        $QuotationData->extracost_amount = $request->get('extracost_amount');
        $QuotationData->grand_total = $request->get('grand_total');
        $QuotationData->paid_amount = $request->get('paid_amount');
        $QuotationData->balance_amount = $request->get('balance_amount');
        $QuotationData->add_on_note = $request->get('add_on_note');

        $QuotationData->update();

        return redirect()->route('quotation.index')->with('update', 'Quotation Data updated successfully!');
    }



    public function delete($unique_key)
    {
        $data = Quotation::where('unique_key', '=', $unique_key)->first();

        $data->soft_delete = 1;

        $data->update();

        return redirect()->route('quotation.index')->with('soft_destroy', 'Successfully deleted the Quotation !');
    }
}
