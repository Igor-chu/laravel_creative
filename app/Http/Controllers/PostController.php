<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;
use function PHPUnit\Runner\validate;


class PostController extends Controller
{
    public function index()
    {

        $posts = Post::all();

//        dd($tag->posts);

        return view('posts.index', compact('posts'));

    }

    public function create()
    {

        $categories = Category::all();

        $tags = Tag::all();

        return view('posts.create', compact(['categories', 'tags']));

    }

    public function store()
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

    public function show(Post $post)
    {

//        dd($post->title);

        return view('posts.show', compact('post'));

    }

    public function edit(Post $post)
    {

        $categories = Category::all();

        $tags = Tag::all();


        return view('posts.edit', compact(['post', 'categories', 'tags']));

    }

    public function update(Post $post)
    {

        $validated = request()->validate([

            'title' => ['required', 'string'],

            'content' => ['required', 'string'],

            'image' => ['string'],

            'category_id' => '',

            'tags' => '',

        ]);

//        получаем все теги у поста
        $tags = $validated['tags'];

//        удаляем теги из массива (т.к. в таблице нету такого поля (связь manyToMany))
        unset($validated['tags']);

        $post->update($validated);

        $post->tags()->sync($tags);

        return redirect()->route('post.show', $post->id);

    }

    public function destroy(Post $post)
    {

        $post->delete();

        return redirect()->route('post.index');
    }

    public function firstOrCreate()
    {
//        $post = Post::find(1);

        $anotherPost = [

            'title' => 'some post',
            'content' => 'some content',
            'image' => 'some image.jpg',
            'likes' => 5000,
            'is_published' => '1',

        ];

        $post = Post::firstOrCreate([

            'title' => 'some title phpstorm'

        ], [

            'title' => 'some title phpstorm',
            'content' => 'some content',
            'image' => 'some image.jpg',
            'likes' => 5000,
            'is_published' => '1',

        ]);

        dump($post->content);

        dd('finished');

    }

    public function updateOrCreate()
    {
        $anotherPost = [

            'title' => 'update_or_create post',
            'content' => 'update_or_create content',
            'image' => 'update_or_create image.jpg',
            'likes' => 50,
            'is_published' => '0',

        ];


        $post = Post::query()->updateOrCreate([

            'title' => 'some title not phpstorm',

        ], [

            'title' => 'some title not phpstorm',
            'content' => 'update_or_create content',
            'image' => 'update_or_create image.jpg',
            'likes' => 50,
            'is_published' => '0',

        ]);

        dump($post->content);

        dd('update_or_create');
    }
}
