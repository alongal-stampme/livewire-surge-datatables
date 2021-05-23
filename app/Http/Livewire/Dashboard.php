<?php

namespace App\Http\Livewire;

use App\Models\Transaction;
use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {
        return view('livewire.dashboard', [
            'transactions' => Transaction::all(),
        ]);
    }
}
