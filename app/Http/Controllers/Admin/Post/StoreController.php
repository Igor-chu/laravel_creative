<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Post\BaseController;
use App\Http\Requests\Post\StoreRequest;


class StoreController extends BaseController
{

    public function __invoke(StoreRequest $request)
    {
        $validated = $request->validated();

        $this->service->store($validated);

        return redirect()->route('admin.post.index');

    }

}
