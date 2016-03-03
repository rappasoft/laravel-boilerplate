<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ArticleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //具体的seeder方法
        DB::table('articles')->delete();
        $articles = [];
        for ($i = 0; $i < 10; $i++) {
            $articles[] = array(
                "uid" => 1, 
                "title" => "article title{$i}", 
                "excerpt" => "article excerpt{$i}", 
                "content" => "article content{$i}", 
                "status" => $i % 2, 
                "created_at" => Carbon::now(), 
                "updated_at" => Carbon::now()
            );
        }

        DB::table('articles')->insert($articles);
    }
}
