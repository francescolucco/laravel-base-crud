<header>
 <nav class="py-4">
   <ul class="nav nav-pills">
      <li class="nav-item">
        <a class="nav-link {{(Route::currentRouteName() === 'home') ? 'active' : ''}} " aria-current="page" href="{{route('home')}}">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{(Route::currentRouteName() === 'comics.index') ? 'active' : ''}}" href="{{route('comics.index')}}">Comics</a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{(Route::currentRouteName() === 'readers') ? 'active' : ''}}" href="{{route('readers')}}">Readers</a>
      </li>
    </ul>
 </nav>
</header>