<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Topic;
use App\Article;


class AdminArticleController extends Controller {

    public function index() {
        $articles = Article::all();
        $articles->load('topic');
        return view('admin.article.index', ['articles' => $articles]);
    }


    public function edit($id) {
        $article = Article::find($id);
        $topics = Topic::getListIdName();
        if($article) {
            return view('admin.article.edit', ['article' => $article, 'topics' => $topics]);
        }
        return redirect()->back();
    }

    protected function validator(array $data, $id = null)
    {
        $validator = [
            'text' => 'required'
        ];

        return Validator::make($data, $validator);
    }

    public function create() {
        $topics = Topic::getListIdName();
        return view('admin.article.create', ['topics' => $topics]);
    }


    public function save(Request $request) {
        $validator = $this->validator($request->all());
        if($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator->errors());
        }

        $article = new Article();
        $this->saveArticle($article,$request);

        return redirect()->route('admin.article.index');

    }

    public function update(Request $request, $id) {
        $article = Article::find($id);
        $password_required = isset($request->password);
        $validator = $this->validator($request->all(), $id);

        if($article === null) {
            return redirect()->back()->withInput()->withErrors(['error' => ['Article existiert nicht']]);
        }

        if($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator->errors());
        }

        $this->saveArticle($article,$request);
        return redirect()->route('admin.article.index');

    }

    public function destroy($id)
    {
        Article::find($id)->delete();
        return redirect()->route('admin.article.index');
    }


    private function saveArticle($article, $request) {
        $article->header = $request->header;
        $article->text = $request->text;
        $article->topic_id = $request->topic;
        $article->save();
    }

}
