@extends('layout.main')

@section('content')

   <h1>COMICS</h1>
   
   <table class="table">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Titolo</th>
          <th scope="col">Serie</th>
          <th colspan="3" scope="col">Azioni</th>
        </tr>
      </thead>
      <tbody>
         @foreach ($comics as $comic)
         <tr>
           <th scope="row">{{$comic->id}}</th>
           <td>{{$comic->title}}</td>
           <td>{{$comic->series}}</td>
           <td><a href="#" type="button" class="btn btn-primary">Show</a></td>
           <td><a href="#" type="button" class="btn btn-success">Edit</a></td>
           <td><a href="#" type="button" class="btn btn-danger">Delete</a></td>
         </tr>
         @endforeach
      </tbody>
    </table>

@endsection