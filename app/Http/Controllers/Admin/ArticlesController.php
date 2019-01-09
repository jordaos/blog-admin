<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Article;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $breadcrumbList = json_encode([
            [
                "text" => "Home",
                "href" => route('home')
            ],
            [
                "text" => "Artigos",
                "active" => true
            ]
        ]);

        $articleList = json_encode(Article::select('id', 'title', 'description', 'publish')->get());

        return view(
            'admin.articles.index',
            compact('breadcrumbList', 'articleList')
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $breadcrumbList = json_encode([
            [
                "text" => "Home",
                "href" => route('home')
            ],
            [
                "text" => "Artigos",
                "href" => route('articles.index')
            ],
            [
                "text" => "Novo",
                "active" => true
            ]
        ]);
        return view(
            'admin.articles.create',
            compact('breadcrumbList')
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $validation = \Validator::make($data, [
            'title' => 'required',
            'description' => 'required',
            'publish' => 'required',
        ]);

        if ($validation->fails()) {
            return redirect()->back()->withErrors($validation)->withInput();
        }
        
        Article::create($data);

        return redirect()->route('articles.index');
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = Article::find($id);

        $breadcrumbList = json_encode([
            [
                "text" => "Home",
                "href" => route('home')
            ],
            [
                "text" => "Artigos",
                "href" => route('articles.index')
            ],
            [
                "text" => "Editar",
                "active" => true
            ]
        ]);
        return view(
            'admin.articles.create',
            compact('breadcrumbList', 'article')
        );
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
        $data = $request->all();

        $validation = \Validator::make($data, [
            'title' => 'required',
            'description' => 'required',
            'publish' => 'required',
        ]);

        if ($validation->fails()) {
            return redirect()->back()->withErrors($validation)->withInput();
        }
        
        Article::find($id)->update($data);

        return redirect()->route('articles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Article::find($id)->delete();

        return response()->json(['success' => 'success'], 204);
    }
}
