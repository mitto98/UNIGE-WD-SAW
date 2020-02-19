<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Comment;

class CommentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class, 572)->create()->each(function ($user) {
            for ($i=0; $i<mt_rand(1,5); $i++)
                $user->comments()->save(factory(Comment::class)->make());
        });
    }
}
