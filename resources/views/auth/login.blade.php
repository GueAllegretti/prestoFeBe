<x-layout>
    <x-slot name="title">Login</x-slot>
    <section class="bg-image">


        @if ($errors->any())
        <div class="row justify-content-center align-items-center" id="alert">
            <div class=" alert alert-fixed bg-alert">
              <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
          </div>
    @endif

    <div class="container w-50 mx-auto" style="min-height: 75vh; margin-top: 15vh">
        <h2>{{__('ui.30')}}</h2>
        <form action="{{route('login')}}" method="POST">
            @csrf
            <div class="form-floating mb-3">
                <input type="email" class="form-control" value="{{old('email')}}" name="email" id="email" placeholder="Inserisci email">
                <label for="floatingInput">Email address</label>
            </div>
            <div class="form-floating mb-3">
                <input type="password" class="form-control" value="{{old('password')}}" name="password" id="floatingPassword" placeholder="Password">
                <label for="floatingPassword">Password</label>
            </div>
            <div class="d-grid gap-2 d-md-flex align-items-baseline">
                <button class="btn btn-presto" type="submit">{{__('ui.31')}}</button>
                <p>{{__('ui.32')}} <a href="{{route('register')}}">{{__('ui.27')}}!</a></p>
            </div>

        </div>
    </form>
</section>
</x-layout>
