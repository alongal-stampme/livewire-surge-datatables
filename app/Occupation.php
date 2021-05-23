<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Sushi\Sushi;

class Occupation extends Model
{
    use Sushi;

    protected $rows = [
        ['title' => 'Salesperson'],
        ['title' => 'Juggler'],
        ['title' => 'Hair Stylist'],
        ['title' => 'Housewife'],
        ['title' => 'Househusband'],
        ['title' => 'Houseperson'],
        ['title' => 'Farmer'],
        ['title' => 'Live Streamer'],
        ['title' => 'Programmer'],
        ['title' => 'Multi-Level Marketer'],
    ];
}
