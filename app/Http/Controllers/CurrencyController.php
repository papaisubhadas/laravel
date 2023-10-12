<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Modules\Currency\Models\Currency;

class CurrencyController extends Controller
{
    public function switch($currency)
    {
        $currency_rate = Currency::select('currency_code','conversion_rate')->where('currency_code','=',$currency)->get();
        if(count($currency_rate) > 0)
        {
            session()->put('currency', $currency_rate[0]->currency_code);
            session()->put('conversion_rate', $currency_rate[0]->conversion_rate);

        }else{
            session()->put('currency', 'AED');
            session()->forget('conversion_rate'); // Removes a specific variable

        }

        flash()->success(__('Currency changed to').' '.strtoupper($currency))->important();

        return redirect()->back();
    }
}
