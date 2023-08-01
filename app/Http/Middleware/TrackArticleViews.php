<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Author\Article;

class TrackArticleViews
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
        $articleSlug = $request->route('slug');
        $article = Article::where('slug', $articleSlug)->first();
        
        if ($article) {
            $article->update(['views_count' => $article->views_count + 1]);
        }
        
        return $next($request);
    }
}
