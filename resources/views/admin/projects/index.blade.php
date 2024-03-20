@extends('layouts.app')

@section('title', 'Projects')

@section('cdns')
{{--Fontawesome--}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" 
integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" 
crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection


@section('content')
<section id="projects-index" class="my-5">
    <h1 class="mb-5">Projects</h1>
    <table class="table table-dark">
        <thead>
            <tr>
              <th scope="col">Id</th>
              <th scope="col">Titolo</th>
              <th scope="col">Slug</th>
              <th scope="col">Creato il</th>
              <th scope="col">Ultima modifica</th>
              <th scope="col"></th>
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
    
                    <form action="{{route('admin.projects.destroy',$project->id)}}" method="POST">
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
</section>

@endsection