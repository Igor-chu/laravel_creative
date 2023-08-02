@extends('layouts.main')

@section('content')

    <div class="container">

        <div class="row">



            <div>

                <a href="{{route('post.index')}}" class="btn btn-primary mb-3">Back</a>

            </div>

            <div>

                <form action="{{route('post.update', $post->id)}}" method="POST">

                    @csrf

                    @method('patch')

                    <div class="mb-3">

                        <label for="title" class="form-label">Title</label>

                        <input type="text" name="title" class="form-control" id="title" placeholder="Title" value="{{ $post->title }}">

                        @error('title')

                            <div class="alert alert-danger">{{ $message }}</div>

                        @enderror

                    </div>

                    <div class="mb-3">

                        <label for="content" class="form-label">Content</label>

                        <textarea name="content" class="form-control"  id="content" placeholder="Content" >{{$post->content}}</textarea>

                        @error('content')

                            <div class="alert alert-danger">{{ $message }}</div>

                        @enderror

                    </div>

                    <div class="mb-3">

                        <label for="image" class="form-label">Image</label>

                        <input type="text" name="image" class="form-control" id="image" placeholder="Image" value="{{ $post->image }}">

                        @error('image')

                            <div class="alert alert-danger">{{ $message }}</div>

                        @enderror

                    </div>

                    <div class="mb-3">

                        <label for="category" class="form-label">Category</label>

                        <select name="tags" id="category" class="form-select" >

                            @foreach($categories as $category)

                                <option {{$post->category_id == $category->id ? 'selected' : ''}} value="{{$category->id}}">{{$category->title}}</option>

                            @endforeach

                        </select>

                    </div>

                    <div class="mb-3">

                        <label for="tags" class="form-label">Tags</label>

                        <select name="tags[]" id="tags" class="form-control" multiple>

                            @foreach($tags as $tag)

                                <option

                                    @foreach($post->tags as $postTag)

                                        {{$tag->id == $postTag->id ? 'selected' : ''}}

                                    @endforeach

                                    value="{{$tag->id}}">{{$tag->title}}

                                </option>

                            @endforeach
                        </select>

                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>

                </form>

            </div>

        </div>

    </div>

@endsection


