<?php

namespace App\Http\Controllers\Post;

use App\Http\Requests\Post\StoreRequest;


class StoreController extends BaseController
{

    public function __invoke(StoreRequest $request)
    {
        $validated = $request->validated();

        $this->service->store($validated);

        return redirect()->route('post.index');

    }

}
