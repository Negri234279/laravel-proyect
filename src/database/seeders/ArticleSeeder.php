<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Sport;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sports = Sport::all();

        User::all()->each(function ($user) use ($sports) {
            $user->sports->each(function ($sport) use ($user) {
                Article::factory()->count(rand(1, 5))->create([
                    'sport_id' => $sport->id
                ])->each(function ($article) use ($user) {
                    $article->users()->attach($user);
                }
                    );
            }
            );
        });
    }
}
