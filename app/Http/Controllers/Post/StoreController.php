<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\StoreRequest;
use App\Models\Post;


class StoreController extends Controller
{

    public function __invoke(StoreRequest $request)
    {

        $validated = $request->validated();

//        получаем все теги у поста
        $tags = $validated['tags'];

//        удаляем теги из массива (т.к. в таблице нету такого поля (связь manyToMany))
        unset($validated['tags']);

//        создаем пост (без тегов)
        $post = Post::create($validated);

//        создаем запись в связаной таблице postsTags
        $post->tags()->attach($tags);

        return redirect()->route('post.index');

    }

}
