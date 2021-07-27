<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    //
    public function index() {
        $article = Article::query()->with('user')->get();
        return view('articles.index', ['data' => $article]);
    }

    public function addView() {
        return view('articles.add');
    }

    public function add(Request $request) {
        $user = Auth::user();
        $article = new Article();
        $title = $request->input('name');
        $date = $request->input('post_date');
        $tag = $request->input('tag');
        $category = $request->input('category');
        $content = $request->input('content');
        if ($request->has('image')) {
            $image = $request->file('image');
            $base64 = base64_encode(file_get_contents($image));
            $article->image = $base64;
        }
        $article->name = $title;
        $article->post_date = $date;
        $article->tag = $tag;
        $article->category = $category;
        $article->content = $content;
        $article->user_id = $user->id;

        $article->save();
        return redirect('/cms/articles')->with('pesan', "Article Added");
    }

    public function updateView($id) {
        $article = Article::find($id);
        return view('articles.update', ['data' => $article]);
    }

    public function update(Request $request) {
        $user = Auth::user();
        $id = $request->input('id');
        $title = $request->input('name');
        $date = $request->input('post_date');
        $tag = $request->input('tag');
        $category = $request->input('category');
        $content = $request->input('content');
        $article = Article::find($id);

         if ($request->has('image')) {
            $image = $request->file('image');
            $base64 = base64_encode(file_get_contents($image));
            $article->image = $base64;
        }
        $article->name = $title ?? $article->name;
        $article->post_date = $date ?? $article->post_date;
        $article->tag = $tag ?? $article->tag;
        $article->category = $category ?? $article->category;
        $article->content = $content ?? $article->content;
        $article->user_id = $user->id;

        $article->save();
        return redirect('/cms/articles')->with('pesan', "Article Added");
    }

    public function viewArticle($id) {
        $article = Article::find($id);
        return view('articles.view', ['data' => $article]);
    }

    public function destroy($id) {
        $article = Article::find($id);
        $article->delete();
        return redirect()->back()->with(['pesan', 'Article Deleted']);
    }
}
