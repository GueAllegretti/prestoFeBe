<x-layout>
    <x-slot name="title">{{__('ui.28')}}</x-slot>

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

<div class="container-fluid" style="margin-top:10vh">
    <div class="row" style="min-height: 75vh;">
        <div class="col-6 my-auto">

            <h1 class="tx-style text-center mb-5 display-3">{{__('ui.28')}}</h1>
            <form action="{{route('auth.contactUs')}}" method="post" >
                @csrf

                <div class="form-floating mb-3">
                    <input type="email" name="email" class="form-control" id="floatingInput" placeholder="Email"value="{{old('email')}}">
                    <label for="floatingInput">Email</label>
                </div>

                  <div class="form-floating">
                    <textarea class="form-control mb-3" name="message" placeholder="Motiva la tua scelta" style="height: 20vh" id="floatingTextarea">{{old('message')}}</textarea>
                    <label for="floatingTextarea">{{__('ui.33')}}</label>
                  </div>
                  <button class="btn btn-presto" type="submit">{{__('ui.34')}}</button>
            </form>
        </div>
        <div class="col-6" style=" padding-right:0px !important;">
            <div class="bg-join">
            </div>
        </div>
    </div>
</div>

</x-layout>