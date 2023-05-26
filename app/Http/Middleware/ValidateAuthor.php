<?php

namespace App\Http\Middleware;

use App\Models\Blog;
use Closure;
use Illuminate\Http\Request;

class ValidateAuthor
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
        if(!is_object($request->blog)) {
            $blog = Blog::onlyTrashed()->find($request->blog);
        } else {
            $blog = $request->blog;
        }

        if(!auth()->user()->isOwner($blog)) {
            return abort(401);
        }

        return $next($request);
    }
}
