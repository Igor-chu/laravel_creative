@extends('layouts.main')

@section('content')

    <div class="container">

        <div class="row">

            <div>

                {{$post->id}}. {{$post->title}}

            </div>

            <div>

                {{$post->content}}

            </div>

            <div>

                <a href="{{route('post.edit', $post->id)}}" class="btn btn-success mt-3">Edit</a>

            </div>

            <div>

                <form action="{{route('post.delete', $post->id)}}" method="post">

                    @csrf

                    @method('delete')

                    <input type="submit" value="Delete" class="btn btn-danger mt-3">

                </form>

            </div>

            <div>

                <a href="{{route('post.index')}}" class="btn btn-primary mt-3">Back</a>

            </div>


        </div>

    </div>

@endsection


