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
        <button type="submit" class="btn btn-primary mt-5">Salva</button>
      </form>
</section>
@endsection