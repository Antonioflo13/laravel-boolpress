@extends('layouts.app')

@section('content')
<section class="container my-5">
    <h4 class="mb-5">Modifica Post</h4>
    <form action="{{ route('admin.posts.store') }}" method="POST">
        @csrf
        @method('POST')
        <div class="mb-3">
            <label for="title" class="form-label">Titolo</label>
            <input type="text" class="form-control" id="title" placeholder="Inserisci il titolo" name="title" value="{{ old("title") }}">
        </div>
        <div class="mb-3">
            <label for="slug" class="form-label">slug</label>
            <input type="number" step="0.01" class="form-control" id="price" placeholder="Inserisci il prezzo" name="slug" value="{{old("slug") }}">
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Contenuto</label>
            <input type="text" class="form-control" id="series" placeholder="Inserisci la serie" name="series" value="{{ old("content") }}">
        </div>
        <button type="submit" class="btn btn-primary mt-5">Salva</button>
      </form>
</section>
@endsection