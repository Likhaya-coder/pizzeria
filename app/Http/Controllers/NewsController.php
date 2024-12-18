<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::latest()->paginate(5);
        return view('news.index', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        $validated = $req->validate([
            'title' => ['required', 'string', 'unique:news,title'],
            'text' => ['required', 'string'],
            'author' => ['required', 'string'],
            'image' => ['required']
        ]);

        $news = new News;
        $news->title = $req->title;
        $news->text = $req->text;
        $news->author = $req->author;

        $photo = $req->file('image')->getClientOriginalName();
        $req->image->move(public_path('images'), $photo);

        $news->image_name = $photo;
        $news->save();

        return redirect('/pizzas/news')->with('publish', 'POST SUCCESSFULLY CREATED');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        /*$newsPosts = News::all();
        return view('news.posts', compact('newsPosts'));*/
    }

    public function posts()
    {
        $newsPosts = News::all();
        return view('news.posts', compact('newsPosts'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delNews = News::findOrFail($id);
        $delNews->delete();

        return back()->with('deleted', 'POST SUCCESSFULLY DELETED');;
    }

    public function search()
    {
        $search = $_GET['search'];
        $results = News::where('id', 'LIKE', '%'.$search.'%')->get();

        return view('news.search', compact('results'));
    }
}
