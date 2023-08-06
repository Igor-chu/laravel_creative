@extends('layouts.admin')

@section('content')

    <div class="container">

        <div class="row">

            <div class="col-12">

                <h2>

                    {{$post->id}}. {{$post->title}}

                </h2>

                <div>

                    {{$post->content}}

                </div>

            </div>

        </div>

        <div class="row">

            <div class="col-12 mt-5">

                <div class="btn-group" role="group">

                    <div class="col-6">

                        <a href="{{route('admin.post.index')}}" class="btn btn-primary mt-3 w-100">Back</a>

                    </div>

                    <div class="col-6">

                        <a href="{{route('admin.post.edit', $post->id)}}" class="btn btn-success mt-3 w-100">Edit</a>

                    </div>

                    <div class="col-6">

                        <form action="{{route('admin.post.delete', $post->id)}}" method="post" class="normal">

                            @csrf

                            @method('delete')

                            <input type="submit" value="Delete" class="btn btn-danger mt-3 w-100">

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div>

@endsection


