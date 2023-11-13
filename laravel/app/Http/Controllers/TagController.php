<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddArticleRequest;
use App\Http\Requests\GetArticleAutorRequest;
use App\Http\Requests\GetArticleRequest;
use App\Http\Requests\GetArticleTagRequest;
use App\Models\Article;
use App\Models\Tag;
use Illuminate\Support\Facades\DB;


class TagController extends Controller
{

    public function get (){

        return Tag::get();

    }





}
