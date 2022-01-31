@extends('layout.main')

@section('content')

<div class="container mb-5">
   <div class="row">
      <div class="col-2 bg-dark">
         <img class="img-fluid my-3" src="{{$comic->thumb}}" alt="">
         <img class="img-fluid my-3" src="{{$comic->thumb}}" alt="">
         <img class="img-fluid my-3" src="{{$comic->thumb}}" alt="">
      </div>
      
      <div class="col-8">
         <h1>MODIFICA FUMETTO <br> {{$comic->title}}</h1>

         @if ($errors->any())
         <div class="alert alert-danger" role="alert">
            <ul>
               @foreach ($errors->all() as $error)
                  <li>{{$error}}</li>
               @endforeach
            </ul>
         </div>
         @endif
         
         <form action="{{ route('comics.update', $comic) }}" method="POST">
            @csrf
            @method('PUT');
            

            <div class="mb-3">
               <label for="title" class="form-label">Titolo Fumetto</label>
               <input type="text" class="form-control @error('title') is-invalid                
               @enderror" value="{{old('title', $comic->title)}}" name="title" id="title" placeholder="Titolo Fumetto">
               @error('title')
                  <div id="validationServer03Feedback" class="invalid-feedback">
                     {{$message}}
                  </div>
               @enderror
            </div>
            
            <div class="mb-3">
               <label for="thumb" class="form-label">URL image</label>
               <input type="url" class="form-control @error('thumb') is-invalid                
               @enderror" value="{{old('thumb', $comic->thumb)}}" name="thumb" id="thumb" placeholder="URL">
               @error('thumb')
                  <div id="validationServer03Feedback" class="invalid-feedback">
                     {{$message}}
                  </div>
               @enderror
            </div>
            
            <div class="mb-3">
               <label for="price" class="form-label">Prezzo</label>
               <input type="number" class="form-control @error('price') is-invalid                
               @enderror" value="{{old('price', $comic->price)}}" name="price" id="price" placeholder="Prezzo">
               @error('price')
                  <div id="validationServer03Feedback" class="invalid-feedback">
                     {{$message}}
                  </div>
               @enderror
            </div>
            
            <div class="mb-3">
               <label for="series" class="form-label">Serie</label>
               <input type="text" class="form-control @error('series') is-invalid                
               @enderror" value="{{old('series', $comic->series)}}" name="series" id="series" placeholder="Serie">
               @error('series')
                  <div id="validationServer03Feedback" class="invalid-feedback">
                     {{$message}}
                  </div>
               @enderror
            </div>
            
            <div class="mb-3">
               <label for="sale_date" class="form-label">Data di uscita</label>
               <input type="date" class="form-control @error('sale_date') is-invalid                
               @enderror" value="{{old('sale_date', $comic->sale_date)}}" name="sale_date" id="sale_date" placeholder="Data di uscita">
               @error('sale_date')
                  <div id="validationServer03Feedback" class="invalid-feedback">
                     {{$message}}
                  </div>
               @enderror
            </div>
            <div class="mb-3">
               <label for="type" class="form-label">Tipo Fumetto</label>
               <input type="text" class="form-control @error('type') is-invalid                
               @enderror" value="{{old('type', $comic->type)}}" name="type" id="type" placeholder="Tipo Fumetto">
               @error('type')
                  <div id="validationServer03Feedback" class="invalid-feedback">
                     {{$message}}
                  </div>
               @enderror
            </div>
            
            <div class="mb-3">
               <label for="description" class="form-label">Descrizione</label>
               <textarea type="number" class="form-control @error('description') is-invalid                
               @enderror" name="description" id="description" rows="3">{{old('description', $comic->description)}}</textarea>
               @error('description')
                  <div id="validationServer03Feedback" class="invalid-feedback">
                     {{$message}}
                  </div>
               @enderror
            </div>
            
            <button type="submit" class="btn btn-primary">INVIA</button>
            <button type="reset" class="btn btn-secondary">RESET</button>

         </form>
         
      </div>

      <div class="col-2  bg-dark">
         <img class="img-fluid my-3" src="{{$comic->thumb}}" alt="">
         <img class="img-fluid my-3" src="{{$comic->thumb}}" alt="">
         <img class="img-fluid my-3" src="{{$comic->thumb}}" alt="">
      </div>

   </div>
   
</div>

@endsection