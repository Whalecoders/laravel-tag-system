@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @if (\Session::has('success'))
            <div class="alert alert-success">
                <p>{{ \Session::get('success') }}</p>
            </div>
            @endif
            @foreach ($posts as $item)
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">{{$item->title}}</h5>
                    <p class="card-text">{{$item->description}}</p>
                    @foreach ($item->tags as $tag)
                    <a href="#" class="btn btn-primary">{{$tag->name}}</a>
                    @endforeach
                </div>
            </div>
            @endforeach
            
        </div>
    </div>
</div>
@endsection
