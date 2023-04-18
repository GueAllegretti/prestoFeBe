<x-layout>
  <x-slot name="title">{{__('ui.45')}}</x-slot>

  <section class="bg-image">
    <div class="container  mx-auto w-50" style="margin-top: 15vh; min-height: 75vh">
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
      <h2 class="text-center mb-3">{{__('ui.46')}}
        <span class="d-none d-md-inline">{{__('ui.47')}}</span>
      </h2>
      {{-- <h3>{{$uniqueSecret}}</h3> --}}
      <form action="{{route('announcement.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="uniqueSecret" value="{{$uniqueSecret}}">
        <div class="form-floating mb-3">
          <input type="text" name="title" class="form-control" id="floatingInput" placeholder="Inserisci il nome dell'articolo" value="{{old('title')}}">
          <label for="floatingInput">{{__('ui.48')}}</label>
        </div>

        <div class="input-group mb-3">
          <span class="input-group-text">€</span>
          <input type="text" name="price" class="form-control" aria-label="Euro amount (with dot and two decimal places)" value="{{old('price')}}">
        </div>

        <div class="form-floating mb-3">
          <select class="form-select" name="category_id" id="floatingSelect" aria-label="Floating label select example">

            @foreach ($categories as $category)
            <option value="{{$category->id}}">{{$category->title}}</option>
            @endforeach

          </select>
          <label for="floatingSelect">{{__('ui.42')}}</label>
        </div>

        <!-- Example of a form that Dropzone can take over -->
        <div class="form-floating mb-3">
          <div for="images">{{__('ui.49')}}</div>
          <div class="dropzone" id="drophere">

          </div>
        </div>

        <div class="form-floating">
          <textarea class="form-control mb-3" name="body" placeholder="Inserisci una descrizione" style="height: 20vh" id="floatingTextarea">{{old('body')}}</textarea>
          <label for="floatingTextarea">{{__('ui.43')}}</label>
        </div>
        <button class="btn btn-presto" type="submit">{{__('ui.26')}}</button>
      </form>
    </div>
  </section>
</x-layout>