<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Transaction;
use Livewire\WithPagination;

class Dashboard extends Component
{
    use WithPagination;

    public function render()
    {
        return view('livewire.dashboard', [
            'transactions' => Transaction::paginate(10),
        ]);
    }
}
