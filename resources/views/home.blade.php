@extends('layout.main')

@section('content')

   <div class="courosel-home">
      <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
         <div class="carousel-inner">
           <div class="carousel-item active" data-bs-interval="10000">
             <img src="{{asset('img/pr_06azz_1.jpg')}}" class="d-block w-100" alt="...">
           </div>
           <div class="carousel-item" data-bs-interval="2000">
             <img src="{{asset('img/pr_0cw43_1.jpg')}}" class="d-block w-100" alt="...">
           </div>
           <div class="carousel-item" data-bs-interval="3000">
             <img src="{{asset('img/pr_2x49a_1.jpg')}}" class="d-block w-100" alt="...">
           </div>
           <div class="carousel-item" data-bs-interval="4000">
             <img src="{{asset('img/pr_69xh8_1.jpg')}}" class="d-block w-100" alt="...">
           </div>
           <div class="carousel-item" data-bs-interval="5000">
             <img src="{{asset('img/pr_rxv9o_1.jpg')}}" class="d-block w-100" alt="...">
           </div>
           <div class="carousel-item" data-bs-interval="6000">
             <img src="{{asset('img/pr_v9xwa_1.jpg')}}" class="d-block w-100" alt="...">
           </div>
           <div class="carousel-item" data-bs-interval="7000">
             <img src="{{asset('img/pr_zir2e_1.jpg')}}"
             class="d-block w-100" alt="...">
           </div>
           <div class="carousel-item">
             <img src="{{asset('img/pr_z4tbn_1.jpg')}}" class="d-block w-100" alt="...">
           </div>
         </div>
         <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
           <span class="carousel-control-prev-icon" aria-hidden="true"></span>
           <span class="visually-hidden">Previous</span>
         </button>
         <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
           <span class="carousel-control-next-icon" aria-hidden="true"></span>
           <span class="visually-hidden">Next</span>
         </button>
       </div>
   </div>
   
@endsection