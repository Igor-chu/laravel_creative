<?php


namespace App\Services\Post;


use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Support\Facades\DB;

class Service
{

    public function store($validated)
    {

        try {

            DB::beginTransaction();

            /*Получаем категорию и все теги у поста*/
            $category = $validated['category'];
            $tags = $validated['tags'];

            /*удаляем теги из массива (т.к. в таблице нету такого поля (связь manyToMany))*/
            unset($validated['category'], $validated['tags']);

            $tagIds = $this->getTagIds($tags);

            $validated['category_id'] = $this->getCategoryId($category);

            /*создаем пост (без тегов и категорий)*/
            $post = Post::create($validated);

            /*создаем запись в связаной таблице postsTags*/
            $post->tags()->attach($tagIds);

            DB::commit();

        } catch (\Exception $exception) {


            DB::rollBack();

            return $exception->getMessage();

        }

        return $post;

    }

    public function update($post, $validated)
    {

        try {

            DB::beginTransaction();

            /*получаем категорию и все теги у поста*/
            $category = $validated['category'];
            $tags = $validated['tags'];

            /*удаляем теги из массива (т.к. в таблице нету такого поля (связь manyToMany))*/
            unset($validated['category'], $validated['tags']);


            $validated['category_id'] = $this->getCategoryWithUpdate($category);
            $tagIds = $this->getTagsWithUpdate($tags);

            /*обновляем post*/
            $post->update($validated);

            /**/
            $post->tags()->sync($tagIds);

            DB::commit();

        } catch (\Exception $exception) {

            DB::rollBack();

            return $exception->getMessage();

        }

        return $post->fresh();

    }

    private function getCategoryId($item)
    {

        $category = !isset($item['id']) ? Category::create($item) : Category::find($item['id']);

        return $category->id;
    }


    private function getTagIds($tags)
    {

        $tagIds = [];

        foreach ($tags as $tag) {

            $tag = !isset($tag['id']) ? Tag::create($tag) : Tag::find($tag['id']);

            $tagIds[] = $tag->id;

        }

        return $tagIds;

    }

    private function getCategoryWithUpdate($item)
    {
        if (!isset($item['id'])) {

            $category = Category::create($item);

        } else {

            $category = Category::find($item['id']);

            $category->update($item);

            $category->fresh();

        }

        return $category->id;

    }

    private function getTagsWithUpdate($tags)
    {
        $tagIds = [];

        foreach ($tags as $tag) {

            if (!isset($tag['id'])) {

                $tag = Tag::create($tag);

            } else {

                $currentTag = Tag::find($tag['id']);

                $currentTag->update($tag);

                $tag = $currentTag->fresh();
            }

            $tagIds[] = $tag->id;

        }

        return $tagIds;

    }


}
