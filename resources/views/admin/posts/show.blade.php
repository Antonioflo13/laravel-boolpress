@extends('layouts.app')

@section('content')
    <section class="container my-5">
        <article>
            <h1 class="mb-5">{{ $post->title }}
                @if ($post->category)
                    <span class="badge badge-info">{{ $post->category->name }}</span>
                @endif
                @foreach ($post->tags as $tag)
                @if ($post->tags)
                    <span class="badge badge-warning">{{ $tag->name }}</span>
                @endif
                @endforeach
            </h1>
            <h3 class="mb-5">{{ $post->slug }}</h3>
            <div class="col-md-6">
                @if ($post->url_image)
                    <img class="img-fluid" src="{{ asset('storage/' . $post->url_image) }}" alt="{{ $post->title }}">
                @else 
                    <img class="img-fluid" src="{{ asset('images/placeholder.png') }}" alt="{{ $post->title }}">    
                @endif
            </div>
            <h4 class="mb-5">{{ $post->content }}</h4>
            <a href="{{ route('admin.posts.index') }}" class="btn btn-primary">Elenco post</a>
            <a href="{{route('admin.posts.edit', $post->id)}}" class="btn btn-warning">Modifica</a>
        </article>
    </section>
@endsection