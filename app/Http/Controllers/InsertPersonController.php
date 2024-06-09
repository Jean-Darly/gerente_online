<?php
// app/Http/Controllers/PersonController.php

namespace App\Http\Controllers;

use App\Models\InsertPerson;
use Illuminate\Http\Request;


class InsertPersonController extends Controller
{
    public function index()
    {
        return view('persons.insertPersons');
    }

    public function create()
    {
        return view('insertPerson');
    }

    public function store(Request $request)
    {
        // $person = new InsertPerson();
        // $person->name = $request->input('name');
        // $person->age = $request->input('age');
        // $person->save();

        return redirect()->route('welcome');
    }
}
