<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;


class StoreController extends Controller
{

    public function __invoke()
    {

        $validated = request()->validate([

            'title' => ['required', 'string', 'max:100'],

            'content' => ['required', 'string', 'max:10000'],

            'image' => ['nullable', 'string', 'max:50'],

            'category_id' => ['required', 'integer'],

            'tags' => ['required'],

        ]);


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
