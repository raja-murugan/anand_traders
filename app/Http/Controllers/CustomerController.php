<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\PaymentBalance;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;
use PDF;

class CustomerController extends Controller
{
    public function index()
    {
        $data = Customer::where('soft_delete', '!=', 1)->get();
        return view('page.backend.customer.index', compact('data'));
    }


    public function store(Request $request)
    {
        $randomkey = Str::random(5);

        $data = new Customer();

        $data->unique_key = $randomkey;
        $data->name = $request->get('name');
        $data->address = $request->get('address');
        $data->phone_number = $request->get('phone_number');
        $data->email_id = $request->get('email_id');
        $data->balance_amount = $request->get('balance_amount');
        $data->save();

        $customerid = $data->id;
        $PaymentBalanceDAta = PaymentBalance::where('customer_id', '=', $customerid)->first();
        if($PaymentBalanceDAta == ""){
            $balance_amount = $request->get('balance_amount');
            $paymentbalacedata = new PaymentBalance();

            $paymentbalacedata->customer_id = $customerid;
            $paymentbalacedata->customer_amount = $balance_amount;
            $paymentbalacedata->customer_paid = 0;
            $paymentbalacedata->customer_balance = $balance_amount;
            $paymentbalacedata->save();
        }


        return redirect()->route('customer.index')->with('message', 'Added !');
    }


    public function edit(Request $request, $unique_key)
    {
        $CustomerData = Customer::where('unique_key', '=', $unique_key)->first();

        $CustomerData->name = $request->get('name');
        $CustomerData->address = $request->get('address');
        $CustomerData->phone_number = $request->get('phone_number');
        $CustomerData->email_id = $request->get('email_id');
        $CustomerData->update();

        return redirect()->route('customer.index')->with('info', 'Updated !');
    }


    public function delete($unique_key)
    {
        $data = Customer::where('unique_key', '=', $unique_key)->first();

        $data->soft_delete = 1;

        $data->update();

        return redirect()->with('warning', 'Deleted !');
    }

    public function checkduplicate(Request $request)
    {
        if(request()->get('query'))
        {
            $query = request()->get('query');
            $customerdata = Customer::where('phone_number', '=', $query)->first();

            $userData['data'] = $customerdata;
            echo json_encode($userData);
        }
    }
}
