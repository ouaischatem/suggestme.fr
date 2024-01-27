<?php

namespace App\Http\Controllers\Suggestion;

use App\Http\Controllers\Controller;
use App\Models\Suggestion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SuggestionCreateController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('suggestions.create');
    }

    public function store(Request $request)
    {
        $user = auth()->user();

        if ($user) {
            $validator = Validator::make($request->all(), [
                'description' => 'required|string',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $data = [
                'user_id' => $user->id,
                'description' => $request->input('description'),
            ];

            $suggestion = new Suggestion($data);
            $suggestion->save();
            return redirect()->back();
        }

        return redirect()->back();
    }
}
