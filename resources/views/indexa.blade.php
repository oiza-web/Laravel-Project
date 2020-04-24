@extends('admin')

@section('content')
@if(Session:: has('info'))
<div class="row">
            <div class="col-md-12">
                <p class="alert alert-info">{{ Session::get('info') }}</p>
            </div>
</div>
        @endif
<div class="row">
        <div class="col-md-12">
            <a href="{{ route('create') }}" class="btn btn-success">New Post</a>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-12">
            <p><strong>Nigeria Food</strong> <a href="{{ route('edit', ['id' => 1]) }}" >Edit</a></p>
        </div>
    </div>
@endsection