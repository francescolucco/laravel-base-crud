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
         
         <form action="{{ route('comics.update', $comic) }}" method="POST">
            @csrf
            @method('PUT');
            
            <div class="mb-3">
               <label for="title" class="form-label">Titolo Fumetto</label>
               <input type="text" value="{{$comic->title}}" class="form-control" name="title" id="title" placeholder="Titolo Fumetto">
            </div>  

            <div class="mb-3">
               <label for="thumb" class="form-label">URL image</label>
               <input type="text" value="{{$comic->thumb}}" class="form-control" name="thumb" id="thumb" placeholder="URL image">
            </div>         
            
            <div class="mb-3">
               <label for="price" class="form-label">Prezzo</label>
               <input type="number"value="{{$comic->price}}" class="form-control" name="price" id="price" placeholder="Prezzo">
            </div>
            
            <div class="mb-3">
               <label for="series" class="form-label">Serie</label>
               <input type="text"value="{{$comic->series}}" class="form-control" name="series" id="series" placeholder="Serie">
            </div>
            
            <div class="mb-3">
               <label for="sale_date" class="form-label">Data di uscita</label>
               <input type="date"value="{{$comic->sale_date}}" class="form-control" name="sale_date" id="sale_date" placeholder="Data di uscita">
            </div>
            <div class="mb-3">
               <label for="type" class="form-label">Tipo Fumetto</label>
               <input type="text"value="{{$comic->type}}" class="form-control" name="type" id="type" placeholder="Tipo Fumetto">
            </div>
            
            <div class="mb-3">
               <label for="description" class="form-label">Descrizione</label>
               <textarea type="number" class="form-control" name="description" id="description" rows="3">{{$comic->description}}</textarea>
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