<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Critic;
use App\Http\Requests\CriticRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Film;

class CriticController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CriticRequest $request)
    {
        $film = Film::find($request['film_id']);
        
        if($film == null)
        {
            return response()->json([
                'status' => 'Fail',
                'message' => 'Film not found',
            ], 404);
        }
        
        $critic = Critic::create([
            'film_id' => $request['film_id'],
            'score' => $request['score'],
            'comment' => $request['comment'],
            'user_id' => Auth::id(),
            'role_id' => $request['role_id']
        ]);

        return $critic;
    }
}
