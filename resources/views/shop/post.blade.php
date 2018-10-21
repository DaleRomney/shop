@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <p class="quote">{{ $post->name }}</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <p>{{ $post->price }}</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <p>{{ $post->description }}</p>
        </div>
    </div>
@endsection