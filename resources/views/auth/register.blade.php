<x-layout>
  <x-slot name="title">{{__('ui.27')}}</x-slot>
  <section class="bg-image">


    @if ($errors->any())
    <div class="row justify-content-center align-items-center"  id="alert">
      <div class=" alert  alert-fixed bg-alert">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
  </div>
@endif


<div class="container mx-auto w-50 " style="margin-top: 15vh; min-height:75vh">
  <h2>{{__('ui.27')}}</h2>
  <form action="{{route('register')}}" method="POST">
    @csrf
    <div class="form-floating mb-3">
      <input type="email" class="form-control" value="{{old('email')}}" name="email" id="email" placeholder="Email">
      <label for="floatingInput">Email address</label>
    </div>
    <div class="form-floating mb-3">
      <input type="text" class="form-control" value="{{old('name')}}" name="name" id="name" placeholder="Inserisci nome">
      <label for="floatingInput">{{__('ui.23')}}</label>
    </div>
    <div class="form-floating mb-3">
      <input type="password" class="form-control" value="{{old('password')}}" id="floatingPassword" placeholder="Password">
      <label for="floatingPassword">Password</label>
    </div>
    <div class="form-floating mb-3">
      <input type="password" class="form-control" value="{{old('password_confirmation')}}" name="password_confirmation" id="floatingPassword" placeholder="Conferma password">
      <label for="floatingPassword">{{__('ui.29')}}</label>
    </div>
    <button class="btn btn-presto" type="submit">{{__('ui.27')}}</button>
  </div>

</form>
</section>
</x-layout>