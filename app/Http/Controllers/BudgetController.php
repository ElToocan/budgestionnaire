<?php

namespace App\Http\Controllers;

use App\Models\Budget;
use App\Models\Transaction;
use Illuminate\Http\Request;

class BudgetController
{
    public function show(){

        $data = [
            'budgets' => Budget::all()
        ];

        return view('budgets', $data);
    }

    public function destroy($id){

        $budget = Budget::find($id);
        $transactions =

        dump($transactions);


        //return redirect('/budgets')->with('success', 'budget supprimée avec succès');
    }

    public function store(Request $request){

        Budget::create([
            'name' => $request['name'],
            'maxValue' => $request['maxValue'],
            'remainingValue' => $request['maxValue'],
        ]);

        $data = [
            'budgets' => Budget::all()
        ];

        return redirect('/budgets')->with('success', 'budget ajouté avec succès');
    }

}
