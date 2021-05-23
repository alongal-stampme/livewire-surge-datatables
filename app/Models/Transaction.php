<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaction extends Model
{
    use HasFactory;

    protected $casts = ['date' => 'date'];

    public function getStatusColorAttribute()
    {
        return [
            'success' => 'green',
            'failed' => 'red',
        ][$this->status] ?? 'cool-gray';
    }

    public function getDateForHumansAttribute()
    {
        return $this->date->format('M, d Y');
    }
}
