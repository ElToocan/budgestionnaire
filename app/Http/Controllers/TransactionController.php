<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Budget;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;

class TransactionController
{

    public function store(Request $request)
    {

        // Validation
        $validated = $request->validate([
            'value' => 'required|numeric',
            'budget_id' => 'required|numeric',
            'reason' => 'required|string',
            'type' => 'required|in:positive,negative',
        ]);

        // Appliquer la valeur négative si nécessaire
        $value = $validated['value'];
        if ($validated['type'] === 'negative') {
            $value = -abs($value); // Force en négatif même si déjà négatif
        }

        // Création de la transaction
        if ($validated['budget_id'] === "0") {
            Transaction::create([
                'value' => $value,
                'budget_id' => null,
                'reason' => $validated['reason'],
            ]);
        }else {
            Transaction::create([
                'value' => $value,
                'budget_id' => $validated['budget_id'],
                'reason' => $validated['reason'],
            ]);
        }

        // Création de la transaction
        if ($validated['budget_id'] != "0") {
            // Mise à jour des soldes
            $budget = Budget::find($validated['budget_id']);
            $budget->update(['remainingValue' => $budget->remainingValue + $value]);
        }

        $account = Account::find(2); // tu peux adapter si nécessaire
        $account->update(['sold' => $account->sold + $value]);

        return redirect()->route('dashboard')->with('success', 'Transaction ajoutée.');
    }


    public function show(){
        $data = [
            'transactions' => Transaction::orderBy('created_at', 'desc')->get() ,
        ];

        return view('transactions', $data);
    }


    public function destroy($id)
    {
        $transaction = Transaction::find($id);
        $value = $transaction->value * -1;
        if ($transaction->budget_id !== null ) {
            $budget = Budget::find($transaction->budget_id);
            $budget->update(['remainingValue' => $budget->remainingValue + $value]);
        }
        $account = Account::find(2);
        $account->update(['sold' => $account->sold + $value]);

        Transaction::destroy($id);
        return redirect('/transactions')->with('success', 'Transaction supprimée avec succès');
    }

}
