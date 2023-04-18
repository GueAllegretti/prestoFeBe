<x-layout>
  <x-slot name="title">{{$title}}</x-slot>

  <section class="bg-image">

  <div class="row" style="--bs-gutter-x:0px;  margin-top: 10vh; border-bottom: 4px solid #1c1c1c;">
    <div class="col-6 mx-auto tx-style fs-2 text-center">{{__('ui.13')}}: <span class="fst-italic">{{$title}}</span></div>
  </div>


  <div class="container-fluid p-0" style="min-height: 75vh">
    <div class="row">
      <div class="col-12 col-md-2 wrapper-category">
        <ul class="category-list">
          @foreach ($categories as $category)
          {{-- se usiamo i radiobutton --}}
          {{-- <div class="form-check">
            <input class="form-check-input" type="radio" name="flexRadioDefault" id="{{$category->id}}">
            <label class="form-check-label fw-bold" for="{{$category->id}}">
              {{$category->title}}
            </label>
          </div> --}}

          {{-- se usiamo gli anchor --}}
          <li class="my-3 li-category">
            <a class="fw-bold categories" href="{{route('announcement.filtered',['category'=>$category])}}">{{$category->title}}</a>
          </li>
          @endforeach
        </ul>
      </div>

      @if (count($announcements) == 0)
      <div class="col-12 text-center mt-5" style="min-height: 75vh">
        <h3>{{__('ui.39')}}</h3>
      </div>
      @else

      <div class="col-12 col-md-10 wrapper-announce d-flex flex-wrap justify-content-center">

        @foreach ($announcements as $announcement)
        <div class="card presto-card" style="width: 22rem;">
          <div class="card-body text-center">
            <img src="{{Storage::url($announcement->images[0]->file)}}" alt="" class="img-fluid" style="width: 300px; height:300px;">
            <h5 class="card-title mt-2">{{$announcement->title}}</h5>
            <p class="card-subtitle m-2 icon-color fw-bold">€ {{$announcement->price}}</p>
            {{-- <div class="col-12">
              <p>{{\Str::limit($announcement->body, 50)}}</p>
            </div> --}}
            <div class="col-12 d-flex justify-content-between">
              <p class="card-text text-muted fst-italic">{{__('ui.12')}} {{$announcement->created_at->format('d/m/Y')}}</p>
              <a href="{{route('announcement.show',["announcement"=>$announcement,"title"=>$announcement->path()])}}" class="card-link"><i class="far fa-eye detail-icon"></i></a>
            </div>
            <div class="col-12 d-flex justify-content-start">
              <p style="padding-right: 1rem">{{__('ui.13')}}:</p>
              <a class="fw-bold link-card" href="{{route('announcement.filtered', ['category'=>$announcement->category_id])}}">{{$announcement->category->title}}</a>
            </div>
          </div>
        </div>
        @endforeach

      </div>
      @endif
    </div>
    <div class="row justify-content-end align-items-end mt-5">
      <div class="col-4 text-center ms-auto">
        {{$announcements->links('vendor/pagination.semantic-ui')}}
      </div>
    </div>

  </section>
</x-layout>




