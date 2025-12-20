<?php

namespace App\Http\Controllers;

use App\Models\Budget;
use App\Models\Transaction;
use Illuminate\Http\Request;
use JetBrains\PhpStorm\NoReturn;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'transactions' => Transaction::getTransactionByAccount(auth()->user()->account)
        ];

        return view('transactions.index', $data);

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
    #[NoReturn]
    public function store(Request $request)
    {
        $data = $request->validate([
            'type' => 'required|string',
            'value' => 'required|numeric',
            'budget_id' => 'required',
            'reason' => 'required|string'
        ]);

        $budgetId = ($data['budget_id'] == 0) ? null : $data['budget_id'];

        if($data['type'] != 'positive') {
            $data['value'] *= -1;
        }

        if($budgetId !== null){
            $budget = Budget::find($budgetId);
            if($budget) {
                $budget->update(['remainingValue' => $budget->remainingValue + $data['value']]);
            }
        }

        Transaction::create([
            'value' => $data['value'],
            'budget_id' => $budgetId, // On utilise la variable traitée
            'reason' => $data['reason'],
            'account_id' => auth()->user()->account_id,
        ]);

        auth()->user()->account()->update(['sold' => auth()->user()->account->sold + $data['value']]);

        return redirect()->route('dashboard')->with('success', 'Transaction ajoutée !');
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
        //
    }
}
