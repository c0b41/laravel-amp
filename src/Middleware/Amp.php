<?php

namespace c0b41\Amp;

class Middleware {

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {           

        if($request->route()->getPrefix('amp') &&  Arr::has($request->route()->gatherMiddleware(), 'amp')){
            $response = $next($request);

            $optimizedHtml = Amp::optimize($response->getOriginalContent())

            $response->setContent(
                $optimizedHtml
            );

            return $response;

        } else {
            return $next($request);
        }
        
    }

}