<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;


class CreateController extends Controller
{

    public function __invoke()
    {

        $posts = Post::paginate(10);

        $categories = Category::all();

        $tags = Tag::all();

        return view('admin.post.create', compact(['categories', 'tags', 'posts']));

    }

}
