@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <form action="" method="post">
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $post->name }}">
                </div>
                <div class="form-group">
                    <label for="content">Content</label>
                    <input type="text" class="form-control" id="price" name="price" value="{{ $post->price }}">
                </div>
                <div class="form-group">
                    <label for="content">Content</label>
                    <input type="text" class="form-control" id="description" name="description" value="{{ $post->description }}">
                </div>
                {{ csrf_field() }}
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection