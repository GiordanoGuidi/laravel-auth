@extends('layouts.app')

@section('title','Home')



@section('content')
<section id="project-list" class="my-5">
    <h1>Projects</h1>
    @forelse ($projects as $project)
    <div class="card mb-3">
        <div class="row g-0">
          <div class="col-md-4">
            <img src="..." class="img-fluid rounded-start" alt="...">
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
              <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
            </div>
          </div>
        </div>
      </div>
    @empty
    <h3 class="text-center">Non ci sono progetti</h3>
    @endforelse
</section>


@endsection