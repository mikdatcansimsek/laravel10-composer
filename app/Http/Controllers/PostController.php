<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $title = 'Yazılar';
        $posts = Post::get();
        
        return view('posts.index', compact('title', 'posts'));
    }
}
