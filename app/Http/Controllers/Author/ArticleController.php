<?php

namespace App\Http\Controllers\Author;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Author\Article;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Auth;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::paginate(10);
        $count_articles = count($articles);
        return view('author.article-management.index',compact('articles','count_articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('author.article-management.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          $article = new Article();
          $article->title = $request['title'];
          $article->content = $request['content'];
          $article->user_id = auth()->id();
          $article->word_count = str_word_count($request->content);
          $article->slug = SlugService::createSlug(Article::class, 'slug', $request->title);
          $article->status = 0;
          $article->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    public function view($slug)
    {
        $article = Article::where('slug',$slug)->first();
        return  view('author.article-management.articleview', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $article = Article::where('slug',$slug)->first();
        return  view('author.article-management.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
          $article = Article::find($request->id);
          $article->title = $request['title'];
          $article->content = $request['content'];
          $article->user_id = auth()->id();
          $article->word_count = str_word_count($request->content);
          if ($article->isDirty('heading')) {
          $article->slug = SlugService::createSlug(Article::class, 'slug', $request->title);
          }
          $article->update();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = Article::find($id);
        $article->delete();
        return redirect()->route('author.articles');
    }

    //change status
    public function change_status(Request $request)
    {
        $article = Article::find($request->id);
       
        if($article->status == '0'){
           
            $article->status = 1;
            $article->save();
        }
        else{
            $article->status = 0;
            $article->save();
        }
       
    }
}
