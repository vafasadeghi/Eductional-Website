<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;

class ArticleController extends  AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $articles = Article::latest()->paginate(20);

        return view('Admin.article.all',compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('Admin.article.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ArticleRequest|Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleRequest $request , Article $article)
    {

        $imagesUrl = $this->uploadImages($request->file('images'));
       $article = auth()->user()->article()->create(array_merge($request->all() , [ 'images' => $imagesUrl]));

        Article::find($article->id)->categories()->attach(($request->input('category_id')));
        alert()->success('مقاله با موفقیت ایجاد  شد','متن پیام')->persistent('خیلی خوب');
        return redirect(route('articles.index'));


//        $imagesUrl = $this->uploadImages($request->file('images'));
//        auth()->user()->article()->create(array_merge($request->all() , [ 'images' => $imagesUrl]));
//        alert()->success('مقاله با موفقیت ایجاد  شد','متن پیام')->persistent('خیلی خوب');
//        return redirect(route('articles.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {

        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
       return  view('Admin.article.edit',compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(ArticleRequest $request, Article $article)
    {
        $file = $request->file('images');
        $inputs = $request->all();
        if($file){
            $inputs['images'] = $this->uploadImages($request->file('images'));
        }else{
            $inputs['images'] = $article->images;
            $inputs['images']['thumb']=$inputs['imagesThumb'];

        }

        unset($inputs['imagesThumb']);
        $article->update($inputs);
        Article::find($article->id)->categories()->sync(($request->input('category_id')));

        alert()->success('محصول با موفقیت ویرایش  شد','متن پیام')->persistent('خیلی خوب');

        return redirect()->route('articles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $article->delete();
        alert()->success('مقاله با موفقیت حذف شد','متن پیام')->persistent('خیلی خوب');
        return back();

    }
}
