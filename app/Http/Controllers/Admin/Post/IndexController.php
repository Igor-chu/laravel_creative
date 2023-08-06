<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Http\Filters\PostFilter;
use App\Http\Requests\Post\FilterRequest;
use App\Models\Post;


class IndexController extends Controller
{

    public function __invoke(FilterRequest $request)
    {

        $this->authorize('view', auth()->user());

        $validated = $request->validated();

        $filter = app()->make(PostFilter::class, ['queryParams' => array_filter($validated)]);

        $posts = Post::filter($filter)->paginate(15);

//        dd($posts);

        return view('admin.post.index', compact('posts'));

    }

}
