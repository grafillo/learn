<?php

namespace App\Http\Controllers;


use App\Http\Requests\CreateArticleRequest;
use App\Http\Requests\EditArticleRequest;
use App\Http\Requests\GetArticleAutorRequest;
use App\Http\Requests\GetArticleRequest;
use App\Http\Requests\GetArticleTagRequest;
use App\Models\Article;
use App\Models\ArticleTag;
use App\Models\Tag;
use App\Models\User;


class ArticleController extends Controller
{


    public function getAll (){

        $articles = Article::with('autor')->with('tags')->orderBy('id','desc')->get();

        return $articles;

    }

    public function get (GetArticleRequest $request){

        $article = Article::where('id',$request->id)->with('autor')->with('tags')->orderBy('id','desc')->get();

        return $article;

    }

    public function getAutor (GetArticleAutorRequest $request){

        $user = User::find($request->id);
        $article = Article::where('user_id',$request->id)->with('autor')->with('tags')->orderBy('id','desc')->get();


        return ['article' => $article,'user' => $user];

    }

    public function getTag (GetArticleTagRequest $request){


       $articles = Tag::where('tag',$request->tag)->with('articles:id')->first();

       $articlesIds = [];

       foreach ($articles->articles as $article){
           $articlesIds[] = $article->id;
       }

       $articles = Article::whereIn('id',$articlesIds)->with('autor')->with('tags')->orderBy('id','desc')->get();


        return $articles;

    }


    public function createArticle (CreateArticleRequest $request){


       $article = Article::create([
            'title' => $request->title,
            'text' => $request->text,
            'user_id' => $request->userId,
        ]);



        foreach($request->tags as $tag){

                ArticleTag::create([
                    'article_id'   => $article->id,
                    'tag_id' => $tag,
                ]);

        }

        return 'success';


    }

    public function editArticle (EditArticleRequest $request){

        Article::where('id', $request->articleId)
            ->update([
                'title' => $request->title,
                'text'=> $request->text,
            ]);

        $tags = ArticleTag::where('article_id', $request->articleId)->pluck('id');

        ArticleTag::destroy($tags);

        foreach($request->tags as $tag){

            ArticleTag::create([
                'article_id'   => $request->articleId,
                'tag_id' => $tag,
            ]);

        }


        return  'success';


    }

    public function delete($id){


        return Article::where('id',$id)->delete();

    }



}
