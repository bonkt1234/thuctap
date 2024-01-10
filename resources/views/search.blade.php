@extends('layouts.app')

@section('content')
    <h1>Search Results for "{{ $query }}"</h1>

    @forelse ($posts as $post)
        <div>
            <h2>{{ $post->title }}</h2>
            <p>{{ $post->content }}</p>
        </div>
    @empty
        <p>No results found.</p>
    @endforelse
@endsection