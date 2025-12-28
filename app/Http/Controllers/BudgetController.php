<?php

namespace App\Http\Controllers;

use App\Models\Budget;
use Illuminate\Http\Request;

class BudgetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'budgets' => auth()->user()->account->budgets,
        ];
        return view('budgets.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'maxValue' => 'required|numeric',
            'name' => 'required|string',
        ]);

        Budget::create([
            'maxValue' => $data['maxValue'],
            'remainingValue' => $data['maxValue'],
            'name' => $data['name'],
            'account_id' => auth()->user()->account->id,
        ]);

        return redirect()->route('budgets.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Budget::destroy($id);
        return redirect()->route('budgets.index');
    }
}
