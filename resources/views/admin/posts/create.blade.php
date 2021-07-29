@extends('layouts.app')

@section('content')
<section class="container my-5">
    <h4 class="mb-5">Crea Post</h4>
    <form action="{{ route('admin.posts.store') }}" method="POST">
        @csrf
        @method('POST')
        <div class="mb-3">
            <label for="title" class="form-label">Titolo</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror"" id="title" placeholder="Inserisci il titolo" name="title" value="{{ old("title") }}">
            @error('title')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Contenuto</label>
            <input type="text" class="form-control @error('content') is-invalid @enderror"" id="content" placeholder="Inserisci il contenuto" name="content" value="{{ old("content") }}">
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
                <input class="form-check-input" type="checkbox" id="{{$tag->id}}" value="{{$tag->id}}" name="tags[]" {{in_array($tag->id, old('tags',[])) ? 'checked' : ''}}>
                <label class="form-check-label" for="{{$tag->id}}">{{$tag->name}}</label>
            </div>
            @endforeach
        </div>
        <button type="submit" class="btn btn-primary mt-5">Salva</button>
      </form>
</section>
@endsection