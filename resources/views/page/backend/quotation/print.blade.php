<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <!-- Meta Tags -->
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Laralink">
    <!-- Site Title -->
    <title>Zwork Technology - Custom Billing Sysytem</title>
    <link rel="stylesheet" href="{{ asset('assets/bill/css/style.css') }}">
</head>

<body>
    <div class="tm_container">
        <div class="tm_invoice_wrap">

        
            <div class="tm_invoice tm_style2" id="tm_download_section">
                <div class="tm_invoice_in">
                    <div class="tm_invoice_head tm_top_head tm_mb20">
                        <div class="tm_invoice_left">
                            <div class="tm_logo"><img src="assets/img/logo.svg" alt="Logo"></div>
                        </div>
                        <div class="tm_invoice_right">
                            <div class="tm_grid_row tm_col_3">
                                <div>
                                    <b class="tm_primary_color">Email</b> <br>
                                    info@anandtraders.com <br>
                                    anandtraders@gmail.com
                                </div>
                                <div>
                                    <b class="tm_primary_color">Phone</b> <br>
                                    +91 98426 56590 <br>
                                    +91 86102 52177
                                </div>
                                <div>
                                    <b class="tm_primary_color">Address</b> <br>
                                    #14, Ganesh Complex, Kumaran Nagar, Trichy.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tm_invoice_info tm_mb10">
                        <div class="tm_invoice_info_left">
                            <p class="tm_mb2"><b>Invoice To:</b></p>
                            <p>
                                <b class="tm_f16 tm_primary_color">{{$customer->name}}</b> <br>
                                {{$customer->address}}. <br>
                                {{$customer->email_id}} <br>
                                {{$customer->phone_number}}
                            </p>
                        </div>
                        <div class="tm_invoice_info_right">
                            <div
                                class="tm_ternary_color tm_f50 tm_text_uppercase tm_text_center tm_invoice_title tm_mb15 tm_mobile_hide">
                                Invoice</div>
                            <div class="tm_grid_row tm_col_3 tm_invoice_info_in tm_accent_bg">
                                <div>
                                    <span class="tm_white_color_60">Grand Total:</span> <br>
                                    <b class="tm_f16 tm_white_color">₹ {{$QuotationData->grand_total}}</b>
                                </div>
                                <div>
                                    <span class="tm_white_color_60">Invoice Date:</span> <br>
                                    <b class="tm_f16 tm_white_color">{{ date('d M Y', strtotime($QuotationData->date)) }}</b>
                                </div>
                                <div>
                                    <span class="tm_white_color_60">Quotation No:</span> <br>
                                    <b class="tm_f16 tm_white_color"># {{$QuotationData->quotation_number}}</b>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tm_table tm_style1">
                        <div class="tm_round_border">
                            <div class="tm_table_responsive">
                                <table>
                                    <thead>
                                        <tr>
                                            <th class="tm_width_1 tm_semi_bold tm_accent_color">S.No</th>
                                            <th class="tm_width_5 tm_semi_bold tm_accent_color">Descriptions</th>
                                            <th class="tm_width_1 tm_semi_bold tm_accent_color">Width</th>
                                            <th class="tm_width_1 tm_semi_bold tm_accent_color">Height</th>
                                            <th class="tm_width_1 tm_semi_bold tm_accent_color">Qty</th>
                                            <th class="tm_width_1 tm_semi_bold tm_accent_color">Area/Sq.Ft</th>
                                            <th class="tm_width_1 tm_semi_bold tm_accent_color">Rate</th>
                                            <th class="tm_width_1 tm_semi_bold tm_accent_color tm_text_right">Cost</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($productsdata as $index => $productsdata_arr)
                                        <tr class="tm_gray_bg">
                                            <td class="tm_width_1">{{ ++$index }}</td>
                                            <td class="tm_width_5">
                                                <p class="tm_m0 tm_f16 tm_primary_color">{{$productsdata_arr['product_name']}}</p>
                                            </td>
                                            <td class="tm_width_1">{{$productsdata_arr['width']}}</td>
                                            <td class="tm_width_1">{{$productsdata_arr['height']}}</td>
                                            <td class="tm_width_1">{{$productsdata_arr['qty']}}</td>
                                            <td class="tm_width_1">{{$productsdata_arr['areapersqft']}}</td>
                                            <td class="tm_width_1">{{$productsdata_arr['rate']}}</td>
                                            <td class="tm_width_1 tm_text_right">₹ {{$productsdata_arr['product_total']}}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tm_invoice_footer tm_mb15 tm_m0_md">
                            <div class="tm_left_footer">
                                <div class="tm_card_note tm_ternary_bg tm_white_color"><b>In Words: </b>Credit Card
                                    - 236***********928</div>
                                <p class="tm_mb2"><b class="tm_primary_color">Important Note:</b></p>
                                <p class="tm_m0">{{$QuotationData->add_on_note}}</p>
                            </div>
                            <div class="tm_right_footer">
                                <table class="tm_mb15">
                                    <tbody>
                                        <tr>
                                            <td class="tm_width_3 tm_primary_color tm_border_none tm_bold">Subtoal</td>
                                            <td
                                                class="tm_width_3 tm_primary_color tm_text_right tm_border_none tm_bold">
                                                ₹ {{$QuotationData->sub_total}}.00</td>
                                        </tr>
                                        <tr>
                                            <td class="tm_width_3 tm_danger_color tm_border_none tm_pt0">
                                            
                                            Discount {{$QuotationData->discount}}{{$tag}}
                                            </td>
                                            <td class="tm_width_3 tm_danger_color tm_text_right tm_border_none tm_pt0">
                                            ₹ {{$QuotationData->discount_price}}</td>
                                        </tr>
                                        <tr>
                                            <td class="tm_width_3 tm_primary_color tm_border_none tm_pt0">Tax {{$QuotationData->tax_percentage}}%</td>
                                            <td class="tm_width_3 tm_primary_color tm_text_right tm_border_none tm_pt0">
                                            ₹ {{$QuotationData->tax_amount}}</td>
                                        </tr>
                                        <tr>
                                            <td class="tm_width_3 tm_primary_color tm_border_none tm_pt0">Extracost </td>
                                            <td class="tm_width_3 tm_primary_color tm_text_right tm_border_none tm_pt0">
                                            ₹ {{$QuotationData->extracost_amount}}.00</td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="tm_width_3 tm_border_top_0 tm_bold tm_f16 tm_white_color tm_accent_bg tm_radius_6_0_0_6">
                                                Grand Total </td>
                                            <td
                                                class="tm_width_3 tm_border_top_0 tm_bold tm_f16 tm_primary_color tm_text_right tm_white_color tm_accent_bg tm_radius_0_6_6_0">
                                                ₹ {{$QuotationData->grand_total}}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tm_invoice_footer tm_type1">
                            <div class="tm_left_footer"></div>
                            <div class="tm_right_footer">
                                <div class="tm_sign tm_text_center">
                                    <img src="assets/img/sign.svg" alt="Sign">
                                    <p class="tm_m0 tm_ternary_color">Anand</p>
                                    <p class="tm_m0 tm_f16 tm_primary_color">Accounts Manager</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tm_note tm_font_style_normal tm_text_left">
                        <hr class="tm_mb15">
                        <p class="tm_mb2"><b class="tm_primary_color">Terms & Conditions:</b></p>
                        <p class="tm_m0">1. Payment : 50% Advance along with purchase Order, 40 % before delivery the meterial, 10 % Completion works.<br>
                            2. Delivery : Maximium 10 days from the date of purchase order. <br>
                            3. Validity : This quotation validity 10 days.
                        </p>
                    </div><!-- .tm_note -->
                    <div class="tm_note tm_font_style_normal tm_text_center">
                        <hr class="tm_mb15">
                        <p class="tm_mb2"><b class="tm_primary_color">Thanks you for your business!</b>
                    </div><!-- .tm_note -->
                </div>
            </div>



            <div class="tm_invoice_btns tm_hide_print">
                <a href="javascript:window.print()" class="tm_invoice_btn tm_color1">
                    <span class="tm_btn_icon">
                        <svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512">
                            <path
                                d="M384 368h24a40.12 40.12 0 0040-40V168a40.12 40.12 0 00-40-40H104a40.12 40.12 0 00-40 40v160a40.12 40.12 0 0040 40h24"
                                fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32" />
                            <rect x="128" y="240" width="256" height="208" rx="24.32"
                                ry="24.32" fill="none" stroke="currentColor" stroke-linejoin="round"
                                stroke-width="32" />
                            <path d="M384 128v-24a40.12 40.12 0 00-40-40H168a40.12 40.12 0 00-40 40v24" fill="none"
                                stroke="currentColor" stroke-linejoin="round" stroke-width="32" />
                            <circle cx="392" cy="184" r="24" fill='currentColor' />
                        </svg>
                    </span>
                    <span class="tm_btn_text">Print</span>
                </a>
                <button id="tm_download_btn" class="tm_invoice_btn tm_color2">
                    <span class="tm_btn_icon">
                        <svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512">
                            <path
                                d="M320 336h76c55 0 100-21.21 100-75.6s-53-73.47-96-75.6C391.11 99.74 329 48 256 48c-69 0-113.44 45.79-128 91.2-60 5.7-112 35.88-112 98.4S70 336 136 336h56M192 400.1l64 63.9 64-63.9M256 224v224.03"
                                fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="32" />
                        </svg>
                    </span>
                    <span class="tm_btn_text">Download</span>
                </button>
            </div>
        </div>
    </div>
    <script src="{{ asset('assets/bill/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/bill/js/jspdf.min.js') }}"></script>
    <script src="{{ asset('assets/bill/js/html2canvas.min.js') }}"></script>
    <script src="{{ asset('assets/bill/js/main.js') }}"></script>
</body>

</html>
