@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <p class="quote">The Shop</p>
        </div>
    </div>
    @foreach($posts as $post)
        <div class="row">
            <div class="col-md-12 text-center">
                <h1 class="post-title">{{ $post['name'] }}</h1>
                <p>{{ $post['price'] }}</p>
                <p>{{ $post['description'] }}</p>
                <p><a href="{{ route('shop.post', ['id' => array_search($post, $posts)]) }}">Buy Now</a></p>
            </div>
        </div>
    @endforeach
    <hr>
@endsection
