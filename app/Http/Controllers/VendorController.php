<?php

namespace App\Http\Controllers;

use App\Models\Vendor;
use App\Models\PaymentBalance;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;
use PDF;

class VendorController extends Controller
{
    public function index()
    {
        $data = Vendor::where('soft_delete', '!=', 1)->get();

        $Vendor_data = [];
        foreach ($data as $key => $datas) {

            $PaymentBalanceAmount = PaymentBalance::where('vendor_id', '=', $datas->id)->first();
            if($PaymentBalanceAmount != ""){
                $vendor_bal = $PaymentBalanceAmount->vendor_balance;
            }else {
                $vendor_bal = '0';
            }

            $Vendor_data[] = array(
                'name' => $datas->name,
                'unique_key' => $datas->unique_key,
                'address' => $datas->address,
                'phone_number' => $datas->phone_number,
                'email_id' => $datas->email_id,
                'id' => $datas->id,
                'shop_name' => $datas->shop_name,
                'vendor_balance' => $vendor_bal,
            );

        }
        return view('page.backend.vendor.index', compact('Vendor_data'));
    }


    public function store(Request $request)
    {
        $randomkey = Str::random(5);

        $data = new Vendor();

        $data->unique_key = $randomkey;
        $data->name = $request->get('name');
        $data->address = $request->get('address');
        $data->phone_number = $request->get('phone_number');
        $data->email_id = $request->get('email_id');
        $data->shop_name = $request->get('shop_name');
        $data->balance_amount = $request->get('balance_amount');

        $data->save();


        $vendorid = $data->id;
        $PaymentBalanceDAta = PaymentBalance::where('vendor_id', '=', $vendorid)->first();
        if($PaymentBalanceDAta == ""){
            $balance_amount = $request->get('balance_amount');
            $paymentbalacedata = new PaymentBalance();

            $paymentbalacedata->vendor_id = $vendorid;
            $paymentbalacedata->vendor_amount = $balance_amount;
            $paymentbalacedata->vendor_paid = 0;
            $paymentbalacedata->vendor_balance = $balance_amount;
            $paymentbalacedata->save();
        }


        return redirect()->route('vendor.index')->with('message', 'Added !');
    }


    public function edit(Request $request, $unique_key)
    {
        $VendorData = Vendor::where('unique_key', '=', $unique_key)->first();

        $VendorData->name = $request->get('name');
        $VendorData->address = $request->get('address');
        $VendorData->phone_number = $request->get('phone_number');
        $VendorData->email_id = $request->get('email_id');
        $VendorData->shop_name = $request->get('shop_name');

        $VendorData->update();

        return redirect()->route('vendor.index')->with('info', 'Updated !');
    }


    public function delete($unique_key)
    {
        $data = Vendor::where('unique_key', '=', $unique_key)->first();

        $data->soft_delete = 1;

        $data->update();

        return redirect()->route('vendor.index')->with('warning', 'Deleted !');
    }


    public function checkduplicate(Request $request)
    {
        if(request()->get('query'))
        {
            $query = request()->get('query');
            $supplierdata = Vendor::where('phone_number', '=', $query)->first();

            $userData['data'] = $supplierdata;
            echo json_encode($userData);
        }
    }
}
