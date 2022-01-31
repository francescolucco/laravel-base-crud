@extends('layout.main')

@section('content')

{{-- @dump(session()->all()) --}}

   <h1>COMICS</h1>

   @if (session('deleted'))
    <div class="alert alert-info" role="alert">
      {{session('deleted')}}
    </div>
   @endif
   
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
           <td><a href="{{route('comics.show', $comic)}}" type="button" class="btn btn-primary">Show</a></td>
           {{-- <td><a href="{{route('comics.show', $comic->slug)}}" type="button" class="btn btn-primary">Show</a></td> --}}
           <td><a href="{{ route('comics.edit', $comic)}}" type="button" class="btn btn-success">Edit</a></td>

           <td>
            {{-- per fare il delete mi verrebbe spontaneo fare così: --}}
            {{-- <td><a href="{{ route('comics.destroy', $comic)}}" type="button" class="btn btn-dark">Delete</a></td>
            <td> --}}
            {{-- mai in questo modo invierei i dati in GET --}}
            {{-- Per questo ho bisogno di creare un piccolo form con @method('DELETE') che invii i dati al destroy --}}
            <form onsubmit="return confirm('Sei sicuro di voler eliminare {{$comic->title}}?')" action="{{ route('comics.destroy', $comic)}}" method="POST">
              @csrf
              @method('DELETE')

              <button type="submit" value="cancella" class="btn btn-danger">EDIT</button>
            
            </form> 
          </td>
         </tr>
         @endforeach
      </tbody>
    </table>
    <div class="nav-pages">
       {{$comics->links()}}
    </div>

@endsection