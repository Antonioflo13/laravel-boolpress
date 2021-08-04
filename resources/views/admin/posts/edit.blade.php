@extends('layouts.app')
@section('content')
<section class="container my-5">
    <h4 class="mb-5">Modifica Post</h4>
    <form action="{{ route('admin.posts.update', $post->id) }}" method="POST">
        @csrf
        @method('PATCH')
        <div class="mb-3">
            <label for="title" class="form-label">Titolo</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror"" id="title" placeholder="Inserisci il titolo" name="title" value="{{ old("title",$post->title) }}">
            @error('title')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Contenuto</label>
            <input type="text" class="form-control @error('content') is-invalid @enderror"" id="series" placeholder="Inserisci il contenuto" name="content" value="{{ old("content",$post->content) }}">
            @error('content')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="mb-3">
            <label for="category_id" class="form-label">Categoria</label>
            <select class="form-control" name="category_id" id="category_id">
                <option for="category_id" class="form-label" disabled selected>-- Seleziona la Categoria --</option>
                @foreach ($categories as $category)
                <option value="{{ $category->id }}" {{ $category->id == old('category_id') ? 'selected' : '' }}>{{$category->name}}</option>
                @endforeach
            </select>
        </div>
        <div>
            @foreach ($tags as $tag)
            <div class="form-check form-check-inline">
                @if ($errors->any())
                <input class="form-check-input" type="checkbox" id="{{$tag->id}}" value="{{$tag->id}}" name="tags[]" {{in_array($tag->id, old('tags',[])) ? 'checked' : ''}}>
                @else 
                    <input class="form-check-input" type="checkbox" id="{{$tag->id}}" value="{{$tag->id}}" name="tags[]" {{$post->tags->contains($tag->id) ? 'checked' : '' }}>
                @endif
                <label class="form-check-label" for="{{$tag->id}}">{{$tag->name}}</label>
            </div>
            @endforeach
            <div class="form-group">
                <label for="cover">Immagine di copertina</label>

                @if ($post->url_image)
                    <div class="mb-3">
                        <img style="width: 200px" src="{{ asset('storage/' . $post->url_image) }}" alt="{{ $post->title }}"> 
                    </div>
                @endif

                <input type="file" name="url_image" class="form-control-file @error('url_image') is-invalid @enderror" id="url_image">
                @error('url_image')
                    <h5 class="text-danger">{{ $message }}</h5>
                @enderror
            </div>
        </div>
        <button type="submit" class="btn btn-primary mt-5">Salva</button>
      </form>
</section>
@endsection