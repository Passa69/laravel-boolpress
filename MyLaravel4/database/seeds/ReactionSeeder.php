<?php

use Illuminate\Database\Seeder;

use App\Post;
use App\Reaction;

class ReactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Reaction::class, 20) -> create() -> each(function($reaction) {

            $posts = Post::inRandomOrder() -> limit(rand(0, 5)) -> get();

            $reaction -> posts() -> attach($posts);

            $reaction -> save();
        });
    }
}
