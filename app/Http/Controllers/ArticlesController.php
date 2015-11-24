<?php

namespace App\Http\Controllers;

use App\Article;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\Http\Requests\ArticleRequest;
use App\Tag;

class ArticlesController extends Controller
{
    public function __construct(){
        
        $this->middleware('auth', ['only' => 'create']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {       

        $articles = Article::latest('published_at')->published()->get();

        return view('articles.index')->with('articles', $articles );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {

        $tags = Tag::lists('name', 'id');

        return view('articles.create')->with('tags', $tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(ArticleRequest $request)
    {

        $article = \Auth::user()->articles()->create($request->all());

        $article->tags()->attach($request->input('tag_list'));

        return redirect('articles')->with([
            'flash_message' => 'Your article has been created',
            'flash_message_important' => NULL,
            ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {   
        $article = Article::findOrFail($id);

        return view('articles.show')->with('article', $article);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {   
        $article = Article::findOrFail($id);

         $tags = Tag::lists('name', 'id');

         return view('articles.edit')->with([
            'article' => $article,
            'tags' => $tags
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  ArticleRequest  $request
     * @param  Article $id
     * @return Response
     */
    public function update(ArticleRequest $request, $id)
    {
        $article = Article::findOrFail($id);

        $article->update($request->all());

        $article->tags()->sync($request->input('tag_list'));
        
        return redirect('articles');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    private function syncTags($article, $array)
    {
        
    }
}
