<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\UpdateRequest;
use App\Models\Post;


class UpdateController extends Controller
{

    public function __invoke(UpdateRequest $request, Post $post)
    {

//        dd($request);

        $validated = $request->validated();

//        получаем все теги у поста
        $tags = $validated['tags'];

//        удаляем теги из массива (т.к. в таблице нету такого поля (связь manyToMany))
        unset($validated['tags']);

        $post->update($validated);

        $post->tags()->sync($tags);

        return redirect()->route('post.show', $post->id);

    }

}
