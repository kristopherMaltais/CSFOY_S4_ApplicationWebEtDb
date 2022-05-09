<?php

namespace App\Http\Controllers;

use App\Http\Resources\FilmResource;
use Illuminate\Http\Request;
use App\Models\Film;
use App\Http\Requests\FilmRequest;

class FilmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    /** algorithme de filtrage inspiré de cette solution: https://m.dotdev.co/writing-advanced-eloquent-search-query-filters-de8b6c2598db */
    public function index(Request $request, Film $film)
    {
        $film = $film->newQuery();

        if($request->has('rating'))
        {
            $film->where('rating', $request->input('rating'));
        }

        if($request->has('max-length'))
        {
            $film->where('length', '<=', $request->input('max-length'));
        }

        if($request->has('keywords'))
        {
            $film
                ->where('title', 'regexp', '(?:^|\W)'.$request->input('keywords').'(?:$|\W)')
                ->orwhere('description', 'regexp', '(?:^|\W)'.$request->input('keywords').'(?:$|\W)');
        }

        $film->paginate(20);
        return $film->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FilmRequest $request)
    {
        $film = Film::create($request->all());
        return $film;
    }

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
        
        return new FilmResource($film);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $film = Film::find($id);
        
        if($film == null)
        {
            return response()->json([
                'status' => 'Fail',
                'message' => 'Film not found',
            ], 404);
        }

        $film->delete();
    }
}
