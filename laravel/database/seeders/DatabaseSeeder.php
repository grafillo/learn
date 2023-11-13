<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Article;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    private static $articles = 30;
    private static $tags = ['политика','спорт','новости','смешное'];

    public function run(): void
    {
        User::factory(10)->create();
        Article::factory(self::$articles)->create();
        $this->tagSeeder();
        $this->tagsArticlesSeeder();

    }

    private function tagSeeder(){


        for($i=0; $i<count(self::$tags); $i++){

            Tag::create([
                'tag' => self::$tags[$i],
            ]);

        }

    }

    private function tagsArticlesSeeder(){

        $articles = Article::get();

        for($i=0; $i<count(self::$tags); $i++){

            $tagsIds[] = $i+1;
        }


        foreach ($articles as $article){

            shuffle($tagsIds);

            $tagsQuantyty = rand(1,count(self::$tags));
            $tags = [];

            for($i=0; $i<$tagsQuantyty; $i++){
                $tags[] = $tagsIds[$i];
            }

            $article->tags()->attach($tags);
        }


    }

}
