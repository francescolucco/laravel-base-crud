@extends('layout.main')

@section('content')

<div class="container text-center d-flex flex-column justify-content-center align-items-center">
   <h1>ERRORE 404</h1>
   <h4>pagina non trovata</h4>
   <p>{{$exception->getMessage()}}</p>
</div>
   
@endsection