@extends('layout.main')

@section('content')

   <div class="comics-show row">
      <div class="col uno">
         <h1>{{$comic->title}}</h1>
         <h5>{{$comic->description}}</h5>
         <h6>Prezzo: <span>{{$comic->price}}</span> &euro;</h6>
         <p>Data di uscita: {{$comic->sale_date}}</p>
         <p><span>{{$comic->type}}</span></p>
      </div>
      <div class="col d-flex align-items center justify-content-center">
         <img src="{{$comic->thumb}}" alt="">
      </div>
   </div>
   <div class="back-button">
      <a href="{{route('comics.index')}}" type="button" class="btn btn-primary">back</a>
   </div>


   
@endsection