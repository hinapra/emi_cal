<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Month;
use App\Models\EmiRule;

class PublicEmiController extends Controller
{
    public function index()
    {
        $months = Month::all();
        return view('emi.form', compact('months'));
    }

    public function calculate(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric|min:1',
            'months_id' => 'required|exists:months,id',
        ]);

        $amount = $request->amount;
        $months_id = $request->months_id;

        $emiRule = EmiRule::where('months_id', $months_id)
                    ->where('min_amount', '<=', $amount)
                    ->where('max_amount', '>=', $amount)
                    ->first();

        if (!$emiRule) {
            return back()->withErrors('No EMI rule found for the entered amount and tenure.')->withInput();
        }

        $r = $emiRule->interest_rate / (12 * 100);
        $n = $emiRule->month->months;

        $emi = ($amount * $r * pow(1 + $r, $n)) / (pow(1 + $r, $n) - 1);
        $total = $emi * $n;

        return view('emi.result', compact('amount', 'n', 'emi', 'total', 'emiRule'));
    }
}
