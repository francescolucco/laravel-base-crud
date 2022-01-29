@extends('layout.main')

@section('content')

   <div class="comics-show row">
      <div class="col-6">
         <div class="d-flex justify-content-between align-items-center">
            <h1 class="">{{$comic->title}}</h1>
            <a href="{{ route('comics.edit', $comic)}}" type="button" class="btn btn-success">Edit</a>
         </div>
         <span class="badge rounded-pill bg-secondary text-white">{{$comic->type}}</span>
         <h5><br>{{$comic->description}}</h5>
         <h6>Prezzo: <span class="bold">{{$comic->price}}</span> &euro;</h6>
         <p>Data di uscita: {{$comic->sale_date}}</p>
      </div>
      <div class="col-6 d-flex align-items center justify-content-center">
         <img class=" img-fluid" src="{{$comic->thumb}}" alt="{{$comic->title}}">
      </div>
   </div>
   <div class="back-button">
      <a href="{{route('comics.index')}}" type="button" class="btn btn-primary">back</a>
   </div>


   
@endsection