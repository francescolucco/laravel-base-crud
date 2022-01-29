@extends('layout.main')

@section('content')

<div class="container mb-5">
   <div class="row">
      <div class="col-2 bg-dark">
         <img class="img-fluid my-3" src="{{asset('img/Sdf113_pg34.png')}}" alt="">
         <img class="img-fluid my-3" src="{{asset('img/Sdf113_pg34.png')}}" alt="">
         <img class="img-fluid my-3" src="{{asset('img/Sdf113_pg34.png')}}" alt="">
      </div>
      
      <div class="col-8">
         <h1>NUOVO FUMETTO</h1>
         
         <form action="{{ route('comics.store') }}" method="POST">
            @csrf
            
            <div class="mb-3">
               <label for="title" class="form-label">Titolo Fumetto</label>
               <input type="text" class="form-control" name="title" id="title" placeholder="Titolo Fumetto">
            </div>
            
            <div class="mb-3">
               <label for="title" class="form-label">Titolo Fumetto</label>
               <input type="text" class="form-control" name="title" id="title" placeholder="Titolo Fumetto">
            </div>
            
            
            <div class="mb-3">
               <label for="thumb" class="form-label">URL image</label>
               <input type="url" class="form-control" name="thumb" id="thumb" placeholder="URL">
            </div>
            
            <div class="mb-3">
               <label for="price" class="form-label">Prezzo</label>
               <input type="number" class="form-control" name="price" id="price" placeholder="Prezzo">
            </div>
            
            <div class="mb-3">
               <label for="series" class="form-label">Serie</label>
               <input type="text" class="form-control" name="series" id="series" placeholder="Serie">
            </div>
            
            <div class="mb-3">
               <label for="sale_date" class="form-label">Data di uscita</label>
               <input type="date" class="form-control" name="sale_date" id="sale_date" placeholder="Data di uscita">
            </div>
            <div class="mb-3">
               <label for="type" class="form-label">Tipo Fumetto</label>
               <input type="text" class="form-control" name="type" id="type" placeholder="Tipo Fumetto">
            </div>
            
            <div class="mb-3">
               <label for="description" class="form-label">Descrizione</label>
               <textarea type="number" class="form-control" name="description" id="description" rows="3"></textarea>
            </div>
            
            <button type="submit" class="btn btn-primary">INVIA</button>
            <button type="reset" class="btn btn-secondary">RESET</button>

         </form>
         
      </div>

      <div class="col-2  bg-dark">
         <img class="img-fluid my-3" src="{{asset('img/Sdf113_pg34.png')}}" alt="">
         <img class="img-fluid my-3" src="{{asset('img/Sdf113_pg34.png')}}" alt="">
         <img class="img-fluid my-3" src="{{asset('img/Sdf113_pg34.png')}}" alt="">
      </div>

   </div>
   
</div>

@endsection