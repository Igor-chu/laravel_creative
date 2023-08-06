<?php

namespace App\Http\Controllers\Post;

use App\Http\Filters\PostFilter;
use App\Http\Requests\Post\FilterRequest;
use App\Models\Post;


class IndexController extends BaseController
{

    public function __invoke(FilterRequest $request)
    {

        $validated = $request->validated();

        $filter = app()->make(PostFilter::class, ['queryParams' => array_filter($validated)]);

        $posts = Post::filter($filter)->paginate(10);

        return view('posts.index', compact('posts'));

    }

}
