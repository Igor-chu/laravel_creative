@extends('layouts.admin')

@section('content')

    <div class="container">

        <div class="row">

            <div>

                <div>

                    <a class="btn btn-primary mb-3" href="{{route('admin.post.create')}}">Create post</a>

                </div>

                @foreach($posts as $post)

                    <div>

                        <a href="{{route('admin.post.show', $post->id)}}">

                            {{$post->id}}. {{$post->title}}

                        </a>

                    </div>

                @endforeach

                <div class="mt-3">

                    {{$posts->withQueryString()->links()}}

                </div>

            </div>

        </div>

    </div>

@endsection
