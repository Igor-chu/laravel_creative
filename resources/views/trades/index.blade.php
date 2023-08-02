@extends('layouts.main')

@section('content')

        <div>

            <a href="{{route('trade.create')}}" class="btn btn-primary mb-3">Создать трейд</a>

        </div>

        @if($trades->isEmpty())

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

                    @foreach($trades as $trade)

                        <tr>
                            <th scope="row">{{$trade->id}}</th>
                            <td>{{$trade->ticker}}</td>
                            <td>{{$trade->price}}</td>
                            <td>{{$trade->description}}</td>
                            <td>

                                <a href="{{route('trade.show', $trade->id)}}" class="btn btn-success">Show</a>

                            </td>

                        </tr>

                    @endforeach

                </tbody>

            </table>


        @endif

@endsection
