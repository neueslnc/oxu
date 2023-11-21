<?php

namespace App\Http\Middleware;

use App\Models\ExamsContorlPC;
use Closure;
use Illuminate\Http\Request;

class LimitaionIP
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

        $pc = ExamsContorlPC::where('nomer', '=', $request->input('nomer') )->first();

        if(!empty($pc)){
            if ($pc->status == 1) {
                # code...
                return $next($request);
            }
        }

        abort(503);

        // return response(null, 520);

    }
}
