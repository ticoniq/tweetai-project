<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;
use App\Models\Autobot;
use Illuminate\Support\Facades\Broadcast;

class CreateAutobotsJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        $users = Http::get('https://jsonplaceholder.typicode.com/users')->json();
        $posts = Http::get('https://jsonplaceholder.typicode.com/posts')->json();
        $comments = Http::get('https://jsonplaceholder.typicode.com/comments')->json();

        for ($i = 0; $i < 500; $i++) {
            $user = $users[$i % count($users)];

            $autobot = Autobot::create([
                'name' => $user['name'],
                'username' => $user['username'],
                'email' => $user['email']
            ]);

            for ($j = 0; $j < 10; $j++) {
                $post = $posts[$j % count($posts)];
                $newPost = $autobot->posts()->create([
                    'title' => $post['title'] . "-$i-$j", // Ensure unique titles
                    'body' => $post['body']
                ]);

                for ($k = 0; $k < 10; $k++) {
                    $comment = $comments[$k % count($comments)];
                    $newPost->comments()->create([
                        'body' => $comment['body']
                    ]);
                }
            }
        }

        $autobotCount = Autobot::count();
        Broadcast::channel('autobot-updates', function () use ($autobotCount) {
            return ['autobotCount' => $autobotCount];
        });
    }
}
