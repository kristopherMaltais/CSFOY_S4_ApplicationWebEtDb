<?php

namespace App\Http\Controllers;

use App\Models\Film;
use Illuminate\Http\Request;

class ActorController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $film = Film::find($id);

        if($film == null)
        {
            return response()->json([
                'status' => 'Fail',
                'message' => 'Film not found',
            ], 404);
        }

        return $film->actors;
    }
}
