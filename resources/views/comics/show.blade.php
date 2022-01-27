@extends('layout.main')

@section('content')

   <h1>{{$comic->title}}</h1>
   <h4>{{$comic->description}}</h4>
   <p>{{$comic->price}}</p>
   <p>{{$comic->sale_date}}</p>
   <p>{{$comic->type}}</p>
   <img src="{{$comic->thumb}}" alt="">
   
   <a href="{{route('comics.index')}}">back</a>
   
@endsection