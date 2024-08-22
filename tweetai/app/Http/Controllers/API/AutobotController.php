<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Autobot;
use App\Models\Post;
use App\Models\Comment;

class AutobotController extends Controller
{
    public function index()
    {
        return Autobot::paginate(10);
    }

    public function posts($id)
    {
        return Post::where('autobot_id', $id)->paginate(10);
    }

    public function comments($id)
    {
        return Comment::where('post_id', $id)->paginate(10);
    }
}
