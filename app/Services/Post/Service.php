<?php


namespace App\Services\Post;


use App\Models\Post;

class Service
{

    public function store($validated)
    {

//        получаем все теги у поста
        $tags = $validated['tags'];

//        удаляем теги из массива (т.к. в таблице нету такого поля (связь manyToMany))
        unset($validated['tags']);

//        создаем пост (без тегов)
        $post = Post::create($validated);

//        создаем запись в связаной таблице postsTags
        $post->tags()->attach($tags);

    }

    public function update($validated)
    {

//        получаем все теги у поста
        $tags = $validated['tags'];

//        удаляем теги из массива (т.к. в таблице нету такого поля (связь manyToMany))
        unset($validated['tags']);

        $post->update($validated);

        $post->tags()->sync($tags);

    }

}
