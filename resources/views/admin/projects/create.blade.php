@extends('layouts.app')

@section('title','Create')

@section('content')
    <section id="create-project" class="my-5">
        <h1 class="mb-5">Nuovo progetto</h1>
        <form class="row" method="POST" action="{{route('admin.projects.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="col-12">
                <div class="mb-3">
                  <label for="title" class="form-label">Title</label>
                  <input type="text" class="form-control @error('title') is-invalid @elseif(old('title','')) is-valid @enderror"
                   id="title" name="title" value="{{old('title','')}}">
                   @error('title')
                   <div class="ivalid-feedback">
                        {{$message}}
                   </div>
                   @else
                   <div class="form text text-muted">
                    Inserisci il titolo del progetto
                   </div>
                   @enderror
                </div>
            </div>
            <div class="col-11">
                <div class="mb-3">
                    <label for="image" class="form-label">Image</label>
                    <input type="file" class="form-control @error('image') is-invalid @elseif(old('image','')) is-valid @enderror" 
                    id="image" name="image" value="{{old('image','')}}">
                    @error('image')
                   <div class="ivalid-feedback">
                        {{$message}}
                   </div>
                   @else
                   <div class="form text text-muted">
                    Inserisci un immagine di formato PNG, JPG o JPEG.
                   </div>
                @enderror
                </div>
            </div>
            <div class="col-1">
                <div class="mb-3">
                   <img src="{{asset( 'storage/' . old('image', 'https://media.istockphoto.com/id/1147544807/vector/thumbnail-image-vector-graphic.jpg?s=612x612&w=0&k=20&c=rnCKVbdxqkjlcs3xH87-9gocETqpspHFXu5dIGB4wuM='))}}" 
                   alt="#" class="img-fluid" id="preview">
                </div>
            </div>
            <div class="col-12">
                <div class="form-floating mb-3">
                    <label for="content" class="form-label"></label>
                    <textarea class="form-control @error('content') is-invalid @elseif(old('content','')) is-valid @enderror" 
                    id="content" rows="30" name="content">{{old('content','')}}</textarea>

                    @error('content')
                    <div class="ivalid-feedback">
                         {{$message}}
                    </div>
                    @else
                    <div class="form text text-muted">
                     Il contenuto deve essere di tipo testo.
                    </div>
                 @enderror
                </div>
            </div>
            <div class="col-12 d-flex justify-content-between">
                <div class="my-5">
                    <a href="{{route('admin.projects.index')}}" class="btn btn-primary">
                        Torna indietro
                    </a>
                </div>
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
            preview.src = input.value ? input.value : placeholder;
        })
    </script>

@endsection