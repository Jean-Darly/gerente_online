<?php

namespace App\Models\Pessoa;

use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{
    protected $fillable = [
        'nome',
        'idade',
        'status',
    ];
}
