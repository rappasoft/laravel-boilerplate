<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Content\ArticleCategory\ArticleCategory;

/**
 * Class ArticleCategoryTableSeeder
 */
class ArticleCategoryTableSeeder extends Seeder
{
    public function run()
    {
        if (env('DB_CONNECTION') == 'mysql') {
            DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        }

        $tableName = config('content.article_categories_table');
        
        if (env('DB_CONNECTION') == 'mysql') {
            DB::table($tableName)->truncate();
        } elseif (env('DB_CONNECTION') == 'sqlite') {
            DB::statement('DELETE FROM ' . $tableName);
        } else {
            //For PostgreSQL or anything else
            DB::statement('TRUNCATE TABLE ' . $tableName . ' CASCADE');
        }

        //Add the categories
        $articleCategories = [
            [
                'user_id' => 1,
                'title' => 'World News',
                'slug' => 'world-news',
                'status' => ArticleCategory::STATUS_PUBLISHED,
            ],
            [
                'user_id' => 1,
                'title' => 'Asian News',
                'slug' => 'asian-news',
                'status' => ArticleCategory::STATUS_PUBLISHED,
            ],
            [
                'user_id' => 1,
                'title' => 'Photos',
                'slug' => 'photos',
                'status' => ArticleCategory::STATUS_DRAFT,
            ],
        ];

        DB::table($tableName)->insert($articleCategories);

        if (env('DB_CONNECTION') == 'mysql') {
            DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        }
    }
}