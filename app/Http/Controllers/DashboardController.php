<?php

namespace App\Http\Controllers;

class DashboardController
{
    public function dashboard(){

        $data = [
            'account' => \App\Models\Account::find(auth()->user()->id),
            'transactions' => \App\Models\Transaction::all(),
            'budgets' => \App\Models\Budget::all(),
            'lastTransaction' => \App\Models\Transaction::orderBy('created_at', 'DESC')->first(),
        ];

        return view('dashboard',$data);
    }
}
