<?php

use Carbon\Carbon as Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/**
 * Class ArticleTableSeeder
 */
class ArticleTableSeeder extends Seeder
{
    public function run()
    {
        if (env('DB_CONNECTION') == 'mysql') {
            DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        }

        $tableName = config('content.articles_table');
        
        if (env('DB_CONNECTION') == 'mysql') {
            DB::table($tableName)->truncate();
        } elseif (env('DB_CONNECTION') == 'sqlite') {
            DB::statement('DELETE FROM ' . $tableName);
        } else {
            //For PostgreSQL or anything else
            DB::statement('TRUNCATE TABLE ' . $tableName . ' CASCADE');
        }

        //Add the articles
        $articles = [];
        $faker = \Faker\Factory::create();
        for ($i = 1; $i <= 100; $i++) {
            $title = $faker->sentence;
            $articles[] = [
                'user_id' => 1,
                'title' => $title,
                'slug' => rtrim(str_replace([' ', '.'], '-', $title), '-'),
                'excerpt' => $faker->paragraph,
                'content' => $faker->text(3000),
                'category_id' => ($i % 3) + 1,
                'status' => $i % 2,
                'updated_at' => null,
                'deleted_at' => ($i % 8 == 0) ? Carbon::now() : null
            ];
        }

        DB::table($tableName)->insert($articles);

        if (env('DB_CONNECTION') == 'mysql') {
            DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        }
    }
}