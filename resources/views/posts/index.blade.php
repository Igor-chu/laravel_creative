@extends('layouts.main')

@section('content')

    <div class="container">

        <div class="row">

            <div>

                <div>

                    <a class="btn btn-primary mb-3" href="{{route('post.create')}}">Create post</a>

                </div>

                @foreach($posts as $post)

                    <div>

                        <a href="{{route('post.show', $post->id)}}">

                            {{$post->id}}. {{$post->title}}

                        </a>

                    </div>

                @endforeach

            </div>

        </div>

    </div>

@endsection


