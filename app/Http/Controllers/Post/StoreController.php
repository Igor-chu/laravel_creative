<?php

namespace App\Http\Controllers\Post;

use App\Http\Requests\Post\StoreRequest;
use App\Http\Resources\Post\PostResource;
use App\Models\Post;


class StoreController extends BaseController
{

    public function __invoke(StoreRequest $request)
    {

        $validated = $request->validated();

        $post = $this->service->store($validated);

//        return redirect()->route('post.index');

        return $post instanceof Post ? new PostResource($post) : $post;

    }

}
