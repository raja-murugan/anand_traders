<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Customer;
use App\Models\Quotation;
use App\Models\Product;
use App\Models\QuotationProduct;
use App\Models\QuotationExtracost;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;
use PDF;

class QuotationController extends Controller
{
    public function index()
    {
        $data = Quotation::where('soft_delete', '!=', 1)->get();
        $products = [];
        $quotation_data = [];
        foreach ($data as $key => $datas) {
            $customer = Customer::findOrFail($datas->customer_id);

            $QuotationProducts = QuotationProduct::where('quotation_id', '=', $datas->id)->get();
            foreach ($QuotationProducts as $key => $QuotationProducts_arr) {

                $product = Product::findOrFail($QuotationProducts_arr->product_id);
                $products[] = array(
                    'quantity' => $QuotationProducts_arr->quantity,
                    'rateper_quantity' => $QuotationProducts_arr->rateper_quantity,
                    'product_total' => $QuotationProducts_arr->product_total,
                    'product_name' => $product->name,
                    'quotation_id' => $QuotationProducts_arr->quotation_id,

                );
            }
                $quotation_data[] = array(
                    'unique_key' => $datas->unique_key,
                    'quotation_number' => $datas->quotation_number,
                    'date' => $datas->date,
                    'time' => $datas->time,
                    'customer' => $customer->name,
                    'sub_total' => $datas->sub_total,
                    'discount_price' => $datas->discount_price,
                    'overallamount' => $datas->overallamount,
                    'tax_percentage' => $datas->tax_percentage,
                    'tax_amount' => $datas->tax_amount,
                    'tax_added_amunt' => $datas->tax_added_amunt,
                    'extracost_amount' => $datas->extracost_amount,
                    'grand_total' => $datas->grand_total,
                    'paid_amount' => $datas->paid_amount,
                    'balance_amount' => $datas->balance_amount,
                    'products_data' => $products,
                );


        }
        return view('page.backend.quotation.index', compact('quotation_data'));
    }


    public function create()
    {
        $customer = Customer::where('soft_delete', '!=', 1)->get();
        $product = Product::where('soft_delete', '!=', 1)->get();
        $today = Carbon::now()->format('Y-m-d');
        $timenow = Carbon::now()->format('H:i');


        $Latest_quotaion = Quotation::latest('id')->first();
        if($Latest_quotaion != ''){
            $quotation_no = $Latest_quotaion->quotation_number + 1;
        }else {
            $quotation_no = 1;
        }


        return view('page.backend.quotation.create', compact('customer', 'today', 'timenow', 'quotation_no', 'product'));
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
        $data->discount_type = $request->get('discount_type');
        $data->discount = $request->get('discount');
        $data->tax_percentage = $request->get('tax_percentage');
        $data->add_on_note = $request->get('add_on_note');


        $data->sub_total = $request->get('sub_total');
        $data->discount_price = $request->get('discount_price');
        $data->total_amount = $request->get('total_amount');
        $data->tax_amount = $request->get('tax_amount');
        $data->extracost_amount = $request->get('extracost_amount');
        $data->grand_total = $request->get('grand_total');

        $data->save();

        $quotation_id = $data->id;

        foreach ($request->get('product_id') as $key => $product_id) {

            $QuotationProduct = new QuotationProduct;
            $QuotationProduct->quotation_id = $quotation_id;
            $QuotationProduct->product_id = $product_id;
            $QuotationProduct->quantity = $request->quantity[$key];
            $QuotationProduct->rateper_quantity = $request->rateper_quantity[$key];
            $QuotationProduct->product_total = $request->product_total[$key];
            $QuotationProduct->save();
        }


        foreach ($request->get('extracost_note') as $key => $extracost_note) {
            if ($extracost_note != "") {

                $QuotationExtracost = new QuotationExtracost;
                $QuotationExtracost->quotation_id = $quotation_id;
                $QuotationExtracost->extracost_note = $extracost_note;
                $QuotationExtracost->extracost = $request->extracost[$key];
                $QuotationExtracost->save();
            }
        }


        return redirect()->route('quotation.index')->with('message', 'Added !');
    }



    public function edit($unique_key)
    {
        $QuotationData = Quotation::where('unique_key', '=', $unique_key)->first();
        $customer = Customer::where('soft_delete', '!=', 1)->get();
        $product = Product::where('soft_delete', '!=', 1)->get();
        $QuotationProducts = QuotationProduct::where('quotation_id', '=', $QuotationData->id)->get();
        $QuotationExtracosts = QuotationExtracost::where('quotation_id', '=', $QuotationData->id)->get();

        return view('page.backend.quotation.edit', compact('QuotationData', 'customer', 'product', 'QuotationProducts', 'QuotationExtracosts'));
    }




    public function update(Request $request, $unique_key)
    {
        $QuotationData = Quotation::where('unique_key', '=', $unique_key)->first();

        $QuotationData->date = $request->get('date');
        $QuotationData->time = $request->get('time');
        $QuotationData->customer_id = $request->get('customer_id');
        $QuotationData->discount_type = $request->get('discount_type');
        $QuotationData->discount = $request->get('discount');
        $QuotationData->tax_percentage = $request->get('tax_percentage');
        $QuotationData->add_on_note = $request->get('add_on_note');


        $QuotationData->sub_total = $request->get('sub_total');
        $QuotationData->discount_price = $request->get('discount_price');
        $QuotationData->total_amount = $request->get('total_amount');
        $QuotationData->tax_amount = $request->get('tax_amount');
        $QuotationData->extracost_amount = $request->get('extracost_amount');
        $QuotationData->grand_total = $request->get('grand_total');
        
        $QuotationData->update();

        $quotation_id = $QuotationData->id;



        $getInserted = QuotationProduct::where('quotation_id', '=', $quotation_id)->get();
        $quotaton_products = array();
        foreach ($getInserted as $key => $getInserted_produts) {
            $quotaton_products[] = $getInserted_produts->id;
        }

        $updated_products = $request->quotation_detail_id;
        $updated_product_ids = array_filter($updated_products);
        $different_ids = array_merge(array_diff($quotaton_products, $updated_product_ids), array_diff($updated_product_ids, $quotaton_products));

        if (!empty($different_ids)) {
            foreach ($different_ids as $key => $different_id) {
                QuotationProduct::where('id', $different_id)->delete();
            }
        }



// Products
        foreach ($request->get('quotation_detail_id') as $key => $quotation_detail_id) {
            if ($quotation_detail_id > 0) {


                $ids = $quotation_detail_id;
                $product_id = $request->product_id[$key];
                $quantity = $request->quantity[$key];
                $rateper_quantity = $request->rateper_quantity[$key];
                $product_total = $request->product_total[$key];

                DB::table('quotation_products')->where('id', $ids)->update([
                    'quotation_id' => $quotation_id, 'product_id' => $product_id, 'quantity' => $quantity, 'rateper_quantity' => $rateper_quantity, 'product_total' => $product_total
                ]);

            } else if ($quotation_detail_id == '') {

                $QuotationProduct = new QuotationProduct;
                $QuotationProduct->quotation_id = $quotation_id;
                $QuotationProduct->product_id = $request->product_id[$key];
                $QuotationProduct->quantity = $request->quantity[$key];
                $QuotationProduct->rateper_quantity = $request->rateper_quantity[$key];
                $QuotationProduct->product_total = $request->product_total[$key];
                $QuotationProduct->save();
            }
        }


// Extracost
        $QuotationExtracosts = QuotationExtracost::where('quotation_id', '=', $quotation_id)->first();
        if($QuotationExtracosts != ""){
            foreach ($request->get('extracost_detail_id') as $key => $extracost_detail_id) {
                $ids = $extracost_detail_id;
                $extracost_note = $request->extracost_note[$key];
                $extracost = $request->extracost[$key];

                DB::table('quotation_extracosts')->where('id', $ids)->update([
                    'quotation_id' => $quotation_id, 'extracost_note' => $extracost_note, 'extracost' => $extracost
                ]);
            }
        }else {
            foreach ($request->get('extracost_note') as $key => $extracost_note) {
                if ($extracost_note != "") {

                    $QuotationExtracost = new QuotationExtracost;
                    $QuotationExtracost->quotation_id = $quotation_id;
                    $QuotationExtracost->extracost_note = $extracost_note;
                    $QuotationExtracost->extracost = $request->extracost[$key];
                    $QuotationExtracost->save();
                }
            }
        }


        return redirect()->route('quotation.index')->with('info', 'Updated !');
    }



    public function delete($unique_key)
    {
        $data = Quotation::where('unique_key', '=', $unique_key)->first();

        $data->soft_delete = 1;

        $data->update();

        return redirect()->route('quotation.index')->with('warning', 'Deleted !');
    }
}
