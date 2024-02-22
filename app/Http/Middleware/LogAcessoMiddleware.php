<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\logAcesso;

class logAcessoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        // dd($request);
        $ip = $request->server->get('REMOTE_ADDR');
        $rotaAcessada = $request->getRequestUri();
        logAcesso::create(['ip' => $ip, 'rota' => $rotaAcessada]);

        return $next($request);
    }
}
