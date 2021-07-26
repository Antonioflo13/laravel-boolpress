@extends('layouts.app')

@section('content')
    <section class="container my-5">
        <article>
            <h1 class="mb-5">{{ $post->title }}</h1>
            <h3 class="mb-5">{{ $post->slug }}</h3>
            <h4 class="mb-5">{{ $post->content }}</h4>
            <a href="{{ route('admin.posts.index') }}" class="btn btn-primary">Elenco post</a>
            <a href="" class="btn btn-warning">Modifica</a>
        </article>
    </section>
@endsection