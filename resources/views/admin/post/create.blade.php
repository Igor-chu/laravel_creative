@extends('layouts.admin')

@section('content')

    <div class="container">

        <div class="row">

            <div class="col-2">

                <a href="{{route('admin.post.index')}}" class="btn btn-primary mb-3">Back</a>

            </div>


            <div class="col-8">

                <form action="{{route('admin.post.store')}}" method="POST">

                    @csrf

                    <div class="mb-3">

                        <label for="title" class="form-label">Title</label>

                        <input type="text" name="title" class="form-control" id="title" placeholder="Title" value="{{ old('title') }}">

                        @error('title')

                            <div class="alert alert-danger">{{ $message }}</div>

                        @enderror

                    </div>

                    <div class="mb-3">

                        <label for="content" class="form-label">Content</label>

                        <textarea name="content" class="form-control"  id="content" placeholder="Content">{{ old('content') }}</textarea>

                        @error('content')

                            <div class="alert alert-danger">{{ $message }}</div>

                        @enderror

                    </div>

                    <div class="mb-3">

                        <label for="image" class="form-label">Image</label>

                        <input type="text" name="image" class="form-control" id="image" placeholder="Image" value="{{ old('image') }}">

                        @error('image')

                            <div class="alert alert-danger">{{ $message }}</div>

                        @enderror

                    </div>

                    <div class="mb-3">

                        <label for="category" class="form-label">Category</label>

                        <select name="category_id" id="category" class="form-select form-control" >

                            @foreach($categories as $category)

                                <option

                                    {{old('category_id') == $category->id ? ' selected' : ''}}

                                     value="{{$category->id}}">{{$category->title}}</option>

                            @endforeach

                        </select>

                    </div>

                    <div class="mb-3">

                        <label for="tags" class="form-label">Tags</label>

                        <select name="tags[]" class="form-control" id="tags" multiple>

                            @foreach($tags as $tag)

                                <option value="{{$tag->id}}">{{$tag->title}}</option>

                            @endforeach

                        </select>

                    </div>


                    <button type="submit" class="btn btn-primary">Create</button>

                </form>

            </div>

        </div>

    </div>

@endsection


