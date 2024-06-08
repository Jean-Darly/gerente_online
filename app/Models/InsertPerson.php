<?php
// app/Models/InsertPerson.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InsertPerson extends Model
{
    protected $fillable = [
        'nome',
        'idade',
        'status',
    ];
}