<?php

namespace App\Http\Controllers\Suggestion;

use App\Http\Controllers\Controller;
use App\Models\Suggestion;
use App\Models\Vote;
use Illuminate\Http\Request;

class SuggestionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function vote(Request $request, $suggestionId)
    {
        $user = auth()->user();

        if ($user) {
            $suggestion = Suggestion::find($suggestionId);

            if ($suggestion) {
                $voteType = $request->input('vote_type');

                $vote = Vote::where('user_id', $user->id)
                    ->where('suggestion_id', $suggestionId)
                    ->first();

                if (!$vote || $vote->vote_type != $voteType) {
                    if (!$vote) {
                        $vote = new Vote();
                        $vote->user_id = $user->id;
                        $vote->suggestion_id = $suggestionId;
                    }
                    $vote->vote_type = $voteType;
                    $vote->save();
                }
            }

            return redirect()->back();
        }

        return view("login");
    }
}
