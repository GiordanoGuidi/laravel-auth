@extends('layouts.app')

@section('title', 'Projects')


@section('content')
<h1>Projects</h1>
<table class="table table-dark">
    <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Titolo</th>
          <th scope="col">Slug</th>
          <th scope="col">Creato il</th>
          <th scope="col">Ultima modifica</th>
        </tr>
      </thead>
      <tbody class="table-group-divider">
        @forelse ($projects as $project )
        <tr>
            <th scope="row">{{$project->id}}</th>
            <td>{{$project->title}}</td>
            <td>{{$project->slug}}</td>
            <td>{{$project->created_at}}</td>
            <td>{{$project->Updated_at}}</td>
            <td>
                <a href=""></a>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="6">
                <h3>Non ci sono progetti</h3>
            </td>
        </tr>
        @endforelse
      </tbody>
  </table>

@endsection