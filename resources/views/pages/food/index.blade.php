@extends('layouts.default')

@section('content')
    <div class="col-md-8">
        <table class="table">
            <thead>
                <tr>
                    <th>Food Number</th>
                    <th>Food Title</th>
                    <th>Category</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($Data as $food)
                    <tr>
                        <th><a href="food/{{ $food->food_id }}">{{ $food->food_id }}</a></th>
                        <th><a href="food/{{ $food->food_id }}">{{ $food->title }}</a></th>
                        <th><a href="food/{{ $food->food_id }}">{{ $food->category->title }}</a></th>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
@endsection
