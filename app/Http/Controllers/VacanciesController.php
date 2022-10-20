<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VacanciesController extends Controller
{
    function show()
    {
        return view('Vacancies.show');
    }
}
