<x-layout>
    <x-slot name="title">{{__('ui.40')}}</x-slot>
    <section class="bg-image">
    @if ($errors->any())
    <div class="row justify-content-center align-items-center">
      <div class=" alert alert-danger alert-fixed">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
    </div>
    @endif


    <div class="row" style="--bs-gutter-x:0px;  margin-top: 10vh; border-bottom: 4px solid #1c1c1c;">
      <div class="col-6 mx-auto tx-style fs-2 text-center">
        <h2>{{__('ui.40')}}</h2>
      </div>
    </div>

<div class="container mx-auto w-50 " style="min-height: 75vh; margin-top: 15vh;">
  <form action="{{route('announcement.update', compact('announcement'))}}" method="post" enctype="multipart/form-data">
      @csrf
      @method('put')

      <div class="form-floating mb-3">
          <input type="text" name="title" class="form-control" id="floatingInput" placeholder="Inserisci il nome dell'articolo" value="{{($announcement->title)}}">
          <label for="floatingInput">{{__('ui.41')}}</label>
        </div>

        <div class="input-group mb-3">
          <span class="input-group-text">€</span>
          <input type="text" name="price" class="form-control" aria-label="Euro amount (with dot and two decimal places)" value="{{($announcement->price)}}">
        </div>

        <div class="form-floating mb-3">
          <select class="form-select" name="category_id" id="floatingSelect" aria-label="Floating label select example">
            @foreach ($categories as $category)
            <option value="{{$category->id}}">{{$category->title}}</option>

            @endforeach
          </select>
          <label for="floatingSelect">{{__('ui.42')}}</label>
        </div>

        <div class="form-floating">
          <textarea class="form-control mb-3" name="body" placeholder="Inserisci una descrizione" style="height: 20vh" id="floatingTextarea">{{($announcement->body)}}</textarea>
          <label for="floatingTextarea">{{__('ui.43')}}</label>
        </div>
        <button class="btn btn-presto" type="submit">{{__('ui.44')}}</button>
  </form>
  </div>
</section>
</x-layout>