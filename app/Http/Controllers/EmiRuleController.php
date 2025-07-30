<?php

// Controller: EmiRuleController
namespace App\Http\Controllers;

use App\Models\EmiRule;
use App\Models\Month;
use Illuminate\Http\Request;

class EmiRuleController extends Controller
{
    public function index()
    {
        $emis = EmiRule::with('month')->get();
        // dd($emis);
        return view('emis.index', compact('emis'));
    }

    public function create()
    {
        $months = Month::all();
        return view('emis.create', compact('months'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'min_amount' => 'required|numeric',
            'max_amount' => 'required|numeric',
            'months_id' => 'required|exists:months,id',
            'interest_rate' => 'required|numeric',
        ]);

        EmiRule::create($request->all());
        return redirect()->route('emis.index')->with('success', 'EMI rule created successfully.');
    }

    public function edit(EmiRule $emi)
    {
        $months = Month::all();
        return view('emis.edit', compact('emi', 'months'));
    }

    public function update(Request $request, EmiRule $emi)
    {
        $request->validate([
            'min_amount' => 'required|numeric',
            'max_amount' => 'required|numeric',
            'months_id' => 'required|exists:months,id',
            'interest_rate' => 'required|numeric',
        ]);

        $emi->update($request->all());
        return redirect()->route('emis.index')->with('success', 'EMI rule updated successfully.');
    }

    public function destroy(EmiRule $emi)
    {
        $emi->delete();
        return redirect()->route('emis.index')->with('success', 'EMI rule deleted successfully.');
    }
}

