<?php

namespace App\Http\Controllers;

use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;
use PDF;

class VendorController extends Controller
{
    public function index()
    {
        $data = Vendor::where('soft_delete', '!=', 1)->get();
        return view('page.backend.vendor.index', compact('data'));
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

        $data->save();


        return redirect()->route('vendor.index')->with('add', 'Vendor Data added successfully!');
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

        return redirect()->route('vendor.index')->with('update', 'Vendor Data updated successfully!');
    }


    public function delete($unique_key)
    {
        $data = Vendor::where('unique_key', '=', $unique_key)->first();

        $data->soft_delete = 1;

        $data->update();

        return redirect()->route('vendor.index')->with('soft_destroy', 'Successfully deleted the Vendor !');
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
