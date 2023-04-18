<nav class="navbar fixed-top navbar-expand-lg navbar-dark" style="transition: .4s">
  <div class="container-fluid">
    <a class="navbar-brand tx-style logo-nav" href="{{route('home')}}">
      {{-- <img src="/media/Presto_reverse.png" alt="" style="width:3vw;"> --}}
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link tx-style {{Route::currentRouteName() == 'home' ? 'active':''}}" aria-current="page" href="{{route('home')}}">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link tx-style {{Route::currentRouteName() == 'announcement.index' ? 'active':''}}" href="{{route('announcement.index')}}">{{__('ui.24')}}</a>
        </li>


        {{-- personalizzazione vista se si è loggati o meno --}}
        @auth
        <li class="nav-item tx-style  dropdown animate slideIn">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Ciao, {{Auth::user()->name}}
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li class="nav-item nav">
              <a class="nav-link tx-style w-100" href="{{route('userList', [Auth::user()])}}">{{__('ui.25')}}</a>
            </li>
            <li class="nav-item nav">
              <a class="nav-link tx-style w-100" href="{{route('announcement.create')}}">{{__('ui.26')}}</a>
            </li>
            <li class="nav-item nav">
              <a class="nav-link tx-style w-100" href="{{route('logout')}}" onclick="event.preventDefault();document.getElementById('form-logout').submit();">Logout</a>

              {{-- form-logout --}}
              <form action="{{route('logout')}}" method="POST" style="display: none;" id="form-logout">@csrf</form>
              @else
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle tx-style " href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  {{__('ui.17')}}
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                  <li class="nav-item nav">
                    <a class="nav-link tx-style w-100" href="{{route('register')}}">{{__('ui.27')}}</a>
                  </li>
                  <li class="nav-item nav">
                    <a class="nav-link tx-style w-100" href="{{route('login')}}">Login</a>
                  </li>
                </ul>
              </li>
              @endauth
            </ul>
          </li>
        </ul>
        {{-- aggiunta barra ricerca --}}

        <div class="container">
          <div class="row height d-flex justify-content-center align-items-center">
            <div class="col-md-8">
              <form action="{{route('search')}}" method="get">
                <div class="search">
                  <input type="text" name="q" class="form-control" placeholder="Cosa cerchi?">
                  <button type="submit" class=" btn-search d-flex"><i class="fa fa-search"></i></button>
                </div>
              </form>
            </div>
          </div>
        </div>
        {{-- fine barra ricerca --}}


        {{-- NUMERAZIONE ARTICOLI DA REVISIONARE --}}
        @auth
        @if (Auth::user()->is_revisor)
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item d-flex nav-item-revisor" style="">
            <a class="nav-link tx-style" id="{{$announceCount > 0 ? 'alertrash':''}}"  href="{{route('revisor.home')}}">
            <i class="fas fa-user-secret my-auto {{$announceCount > 0 ? 'icon-color':''}}" class="icon-revisor" style="font-size:1.5rem;"></i></a>

            <a class="counter navbar-brand counter-revisor rounded-circle mx-2 fw-bold d-flex justify-content-center align-items-center" style="color: black; width: 40px">
            <span>
              {{$announceCount}}
            </span>
            </a>
          </li>
            <li class="nav-item d-flex">
              <a class="nav-link tx-style " id="{{$refusedCount > 0 ? 'alertrash':''}}"  href="{{route('revisor.refused')}}">
              <i class="fas fa-trash my-auto {{$refusedCount > 0 ? 'icon-color':''}}" class="icon-revisor" style="font-size:1.5rem;"></i></a>

            <a class="counter navbar-brand counter-revisor rounded-circle mx-2 fw-bold d-flex"
            id=""
            style="color: black; width: 40px">
          <span>
            {{$refusedCount}}
          </span></a>
          </li>
        </ul>

        {{-- LAVORA CON NOI  --}}
        @else
        <ul class="navbar-nav mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link w-100 {{Route::currentRouteName() == 'auth.join' ? 'active':''}}" href="{{route('auth.join')}}"><i class="fas fa-briefcase fa-2x icon-revisor"></i></a>
          </li>
        </ul>
      @endif
    @endauth


          {{-- <form class="d-flex">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
          </form> --}}
        </div>
      </div>
    </nav>
