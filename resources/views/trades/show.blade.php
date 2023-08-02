@extends('layouts.main')

@section('content')

        <div>

            <a href="{{route('trade.create')}}" class="btn btn-primary mb-3">Создать трейд</a>

        </div>

{{--        {{dd($trade)}}--}}

        @if(!$trade)

            {{__('Нет ни одного поста')}}

        @else

            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Ticker</th>
                    <th scope="col">Price</th>
                    <th scope="col">Description</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>

                        <tr>
                            <th scope="row">{{$trade->id}}</th>
                            <td>{{$trade->ticker}}</td>
                            <td>{{$trade->price}}</td>
                            <td>{{$trade->description}}</td>
                            <td>

                                <form action="{{route('trade.destroy', $trade->id)}}" method="post">

                                    @csrf

                                    @method('delete')

                                    <input type="submit" class="btn btn-danger" value="Delete">

                                </form>


                                <a href="{{route('trade.edit', $trade->id)}}" class="btn btn-success">Edit</a>

                            </td>


                        </tr>

                </tbody>

            </table>


        @endif

@endsection
