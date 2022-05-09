<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Exceptions\UneCritiqueParFilmException;
use Illuminate\Support\Facades\DB;

class AjoutCritiqueMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $criticsCount = DB::table('critics')
                ->where('user_id', '=', auth()->user()->id)
                ->where('film_id', '=', $request->film_id)
                ->count();

        if ($criticsCount == 1)
        { 
            throw new UneCritiqueParFilmException("Une seule critique par film");
        } 
        return $next($request);
    }
}
