@extends('layouts.app')

@section('title','Home')



@section('content')
{{--Lista dei Progetti--}}
<section id="project-list" class="my-5">
    <h1>Projects</h1>
    @if($projects->hasPages())
        {{$projects->links()}}
    @endif
    @forelse ($projects as $project)
    {{--Card del progetto--}}
    <div class="card mb-3 my-5">
        <div class="row g-0">
          <div class="col-md-4 d-flex align-items-center">
            <img src="{{asset('storage/' . $project->image)}}" class="img-fluid rounded-start ms-3" alt="{{$project->title}}">
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <h5 class="card-title">{{$project->title}}</h5>
              <p class="card-text">{{$project->content}}</p>
              <p class="card-text"><small class="text-muted">{{$project->created_at}}</small></p>
              <p class="card-text"><small class="text-muted">{{$project->updated_at}}</small></p>
            </div>
          </div>
        </div>
      </div>
    @empty
    <h3 class="text-center">Non ci sono progetti</h3>
    @endforelse
    @if($projects->hasPages())
        {{$projects->links()}}
    @endif
</section>


@endsection