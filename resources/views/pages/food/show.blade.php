@extends('layouts.default')

@section('content')
    <div class="col-md-8">
        <table class="table">
            <thead>
                <tr>
                    <th>Food Number</th>
                    <th>Food Title</th>
                    <th>Category</th>
                    <th>Tags</th>
                    <th>Ingredients</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th>{{ $Data->food_id }}</th>
                    <th>{{ $Data->title }}</th>
                    <th>{{ $Data->category->title }}</th>
                    <th>
                        @foreach ($Data->tag as $Tag)
                            {{ $Tag->title }},
                        @endforeach
                    </th>
                    <th>
                        @foreach ($Data->ingredient as $Ingredient)
                            {{ $Ingredient->title }},
                        @endforeach
                    </th>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
