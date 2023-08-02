@extends('layouts.main')

@section('content')

    <form action="{{route('trade.store')}}" method="POST">

        @csrf

        <div class="mb-3">

            <label for="ticker" class="form-label">Ticker</label>

            <input type="text" name="ticker" class="form-control" id="ticker" autofocus>

        </div>

        <div class="mb-3">

            <label for="price" class="form-label">Price</label>

            <input type="text" name="price" class="form-control" id="price">

        </div>

        <div class="mb-3">

            <label for="description" class="form-label">Description</label>

            <textarea name="description" class="form-control" id="description"></textarea>

        </div>

        <button type="submit" class="btn btn-primary">Create</button>

    </form>

@endsection
