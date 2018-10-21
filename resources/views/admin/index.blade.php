@extends('layouts.admin')

@section('content')
    @if(Session::has('info'))
        <div class="row">
            <div class="col-md-12">
                <p class="alert alert-info">{{ Session::get('info') }}</p>
            </div>
        </div>
    @endif
    <div class="row">
        <div class="col-md-12">
            <a href="{{route('admin.create')}}" class="btn btn-success">New Item </a>
        </div>
    </div>
    <hr>
    @foreach($posts as $post)
    <div class="row">
        <div class="col-md-12">
            <p><strong>{{ $post['name'] }}</strong>
                <a href="{{ route('admin.edit', ['id' => $post->id]) }}">Edit</a></p>
                <a href="{{ route('admin.delete', ['id' => $post->id]) }}">Delete</a></p>
        </div>
    </div>
    @endforeach
@endsection