<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [

        'text',
        'title',
        'user_id'

    ];


    public function tags(){

        return $this->belongsToMany(Tag::class,ArticleTag::class);
    }

    public function autor(){

        return $this->belongsTo(User::class,'user_id','id');
    }



}
