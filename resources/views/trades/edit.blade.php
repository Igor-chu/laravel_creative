@extends('layouts.main')

@section('content')

    <form action="{{route('trade.update', $trade->id)}}" method="POST">

        @csrf

        @method('put')

        <div class="mb-3">

            <label for="ticker" class="form-label">Ticker</label>

            <input type="text" name="ticker" class="form-control" id="ticker" autofocus value="{{$trade->ticker}}">

        </div>

        <div class="mb-3">

            <label for="price" class="form-label">Price</label>

            <input type="text" name="price" class="form-control" id="price" value="{{$trade->price}}">

        </div>

        <div class="mb-3">

            <label for="description" class="form-label">Description</label>

            <textarea name="description" class="form-control" id="description">{{$trade->description}}</textarea>

        </div>

        <button type="submit" class="btn btn-primary">Update</button>

    </form>

@endsection
