@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <form action="{{url('add/post')}}" method="POST">
                @csrf
                
                <div class="card">
                    <div class="card-header">{{ __('Add Post') }}</div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <input type="text" name="description" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="formrow-email-input">Tags</label>
                            <select class="form-control select2 select-tags" name="tag[]" id="tags" multiple>
                                @foreach ($tags as $tag)
                                    <option value="{{$tag->name}}">{{$tag->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">{{ __('Add Post') }}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
