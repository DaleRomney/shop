@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <form action="" method="post">
                <div class="form-group">
                    <label for="title">Item Name</label>
                    <input
                            type="text"
                            class="form-control"
                            id="name"
                            name="name"
                            value="{{ $post->name }}">
                </div>
                <div class="form-group">
                    <label for="content">Price</label>
                    <input
                            type="text"
                            class="form-control"
                            id="price"
                            name="price"
                            value="{{ $post->price }}">
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <input
                            type="text"
                            class="form-control"
                            id="description"
                            name="description"
                            value="{{ $post->description }}">
                </div>
                <input type="hidden" name="id" value="{{ $postId }}">
                {{ csrf_field() }}
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection