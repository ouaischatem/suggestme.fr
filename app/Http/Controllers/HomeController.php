<?php

namespace App\Http\Controllers;

use App\Models\Suggestion;

class HomeController extends Controller
{
    public function index()
    {
        $suggestions = Suggestion::query()->latest('created_at')->paginate(6);
        return view('home', compact('suggestions'));
    }
}
