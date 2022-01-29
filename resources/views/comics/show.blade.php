@extends('layout.main')

@section('content')

   <div class="comics-show row">
      <div class="col uno">
         <h1>{{$comic->title}} <a href="#" type="button" class="btn btn-success">Edit</a></h1>
         <span class="badge rounded-pill bg-secondary text-white">{{$comic->type}}</span>
         <h5><br>{{$comic->description}}</h5>
         <h6>Prezzo: <span>{{$comic->price}}</span> &euro;</h6>
         <p>Data di uscita: {{$comic->sale_date}}</p>
      </div>
      <div class="col d-flex align-items center justify-content-center">
         <img src="{{$comic->thumb}}" alt="{{$comic->title}}">
      </div>
   </div>
   <div class="back-button">
      <a href="{{route('comics.index')}}" type="button" class="btn btn-primary">back</a>
   </div>


   
@endsection