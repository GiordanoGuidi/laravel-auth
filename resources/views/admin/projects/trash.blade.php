@extends('layouts.app')

@section('title', 'Projects')


@section('content')
{{--Index dei Progetti--}}
<section id="projects-index" class="my-5">
    <h1 class="mb-5">Progetti Eliminati</h1>
    {{--Tabella--}}
    <table class="table table-dark">
        <thead>
            <tr>
              <th scope="col">Id</th>
              <th scope="col">Titolo</th>
              <th scope="col">Slug</th>
              <th scope="col">Creato il</th>
              <th scope="col">Ultima modifica</th>
              <th scope="col" class="text-end">
                <div class="d-flex gap-2">
                    <a href="{{route('admin.projects.create')}}" class="btn btn-success"><i class="fa-solid fa-plus me-1"></i>Nuovo</a>
                    <a href="{{route('admin.projects.trash')}}" class="btn btn-danger"><i class="fa-solid fa-trash-can me-1"></i>Cestino</a>
                </div>
              </th>
            </tr>
          </thead>
          <tbody class="table-group-divider">
            @forelse ($projects as $project )
            <tr>
                <th scope="row">{{$project->id}}</th>
                <td>{{$project->title}}</td>
                <td>{{$project->slug}}</td>
                <td>{{$project->created_at}}</td>
                <td>{{$project->updated_at}}</td>
                <td>
                    <div class="d-flex justify-content-end gap-2">
                        <a href="{{route('admin.projects.show',$project)}}" class="btn btn-primary">
                            <i class="fa-solid fa-eye"></i>
                        </a>
                        <a href="{{route('admin.projects.edit',$project)}}" class="btn btn-warning">
                            <i class="fa-solid fa-pencil"></i>
                        </a>
    
                    <form action="{{route('admin.projects.destroy',$project->id)}}" method="POST" 
                        class="form-delete" data-project="{{$project->title}}">
                        @csrf
                        @method('DELETE')
                        <button  class="btn btn-danger">
                            <i class="fa-solid fa-trash-can"></i>
                        </button>
                    </form>
                    </div>
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
      <a href="{{route('admin.projects.index')}}" class="btn btn-secondary">Progetti attivi</a>
      {{-- @if($projects->hasPages())
        {{$projects->links()}}
      @endif --}}
</section>
@endsection