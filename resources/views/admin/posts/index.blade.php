@extends('layouts.app')

@section('content')
    <section class="container">
        <article>
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Titolo</th>
                    <th scope="col">slug</th>
                    <th scope="col">Contenuto</th>
                    <th scope="col" colspan="3">Azioni</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                    <tr>
                      <th scope="row">{{ $post->id }}</th>
                      <td>{{ $post->title }}</td>
                      <td>{{ $post->slug }}</td>
                      <td>{{ $post->content }}</td>
                      <td><a href="{{ route('admin.posts.show', $post->id) }}" class="btn btn-info">Informazioni</a></td>
                      <td><a href="#" class="btn btn-secondary">Modifica</a></td>
                      <td><a href="#" class="btn btn-danger">Elimina</a></td>
                    </tr>
                    @endforeach
                </tbody>
              </table>
        </article>
    </section>
@endsection