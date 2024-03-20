@extends('layouts.app')

@section('title','Create')

@section('content')
    <section id="create-project" class="my-5">
        <h1 class="mb-5">Nuovo progetto</h1>
        <form class="row" method="POST" action="{{route('admin.projects.store')}}">
            @csrf
            <div class="col-12">
                <div class="mb-3">
                  <label for="title" class="form-label">Title</label>
                  <input type="text" class="form-control" id="title" >
                </div>
            </div>
            <div class="col-11">
                <div class="mb-3">
                    <label for="image" class="form-label">Image</label>
                    <input type="url" class="form-control" id="image" >
                </div>
            </div>
            <div class="col-1">
                <div class="mb-3">
                   <img src="{{old('image', 'https://media.istockphoto.com/id/1147544807/vector/thumbnail-image-vector-graphic.jpg?s=612x612&w=0&k=20&c=rnCKVbdxqkjlcs3xH87-9gocETqpspHFXu5dIGB4wuM=')}}" 
                   alt="#" class="img-fluid" id="preview">
                </div>
            </div>
            <div class="col-12">
                <div class="form-floating mb-3">
                    <label for="content" class="form-label">Text</label>
                    <textarea class="form-control" id="content" rows="30"></textarea>
                </div>
            </div>
            <div class="col-12">
                <div class="d-flex justify-content-center gap-3 my-5">
                    <button type="reset" class="btn btn-secondary">
                        <i class="fa-solid fa-arrow-rotate-left me-1"></i>Svuota i campi
                    </button>
                    <button type="submit" class="btn btn-success">
                        <i class="fa-regular fa-floppy-disk me-1"></i>Salva
                    </button>
                </div>
            </div>
          </form>
    </section>
@endsection
{{--Scripts--}}
@section('scripts')
    <script>
        const placeholder ='https://media.istockphoto.com/id/1147544807/vector/thumbnail-image-vector-graphic.jpg?s=612x612&w=0&k=20&c=rnCKVbdxqkjlcs3xH87-9gocETqpspHFXu5dIGB4wuM=';
        const input = document.getElementById('image');
        const preview= document.getElementById('preview');
        input.addEventListener('input', ()=>{
            preview.src= input.value ? input.value : placeholder;
        })
    </script>

@endsection