@extends('layouts.app')


@section('content')
    <h1>{{ $post->title }}</h1>
    <div class="body">
        {{ $post->body }}
    </div>
@endsection
