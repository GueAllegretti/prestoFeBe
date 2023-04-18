<x-layout>
  <x-slot name="title">{{__('ui.6')}}</x-slot>

<section class="bg-image">



  <div class="row" style=" border-bottom: 4px solid #1c1c1c;">
    <div class="col-6 mx-auto tx-style fs-2 text-center" style="margin-top: 12vh">{{__('ui.7')}} <span class="fst-italic">{{$q}}</span></div>

  </div>

  <div class="container-fluid"  style="min-height: 75vh">
    <div class="row">
      <div class="col-2 wrapper-category">
        <ul>
          @foreach ($categories as $category)
          {{-- se usiamo i radiobutton --}}
          {{-- <div class="form-check">
            <input class="form-check-input" type="radio" name="flexRadioDefault" id="{{$category->id}}">
            <label class="form-check-label fw-bold" for="{{$category->id}}">
              {{$category->title}}
            </label>
          </div> --}}

          {{-- se usiamo gli anchor --}}
          <li class="my-3">
            <a class="tx-style fw-bold categories" href="{{route('announcement.filtered',['category'=>$category])}}">{{$category->title}}</a>
          </li>

          @endforeach
        </ul>
      </div>
      @if ($announcements->count(0))
      <div class="col-10 wrapper-announce d-flex flex-wrap justify-content-center" style=" min-height: 75vh">

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
                  <p class="card-text text-muted fst-italic">{{__('ui.8')}} {{$announcement->created_at->format('d/m/Y')}}</p>
                  <a href="{{route('announcement.show',["announcement"=>$announcement,"title"=>$announcement->path()])}}" class="card-link"><i class="far fa-eye detail-icon"></i></a>
              </div>
              <div class="col-12 d-flex justify-content-start">
                  <p style="padding-right: 1rem">{{__('ui.9')}}</p>
                  <a class="fw-bold link-card" href="{{route('announcement.filtered', ['category'=>$announcement->category_id])}}">{{$announcement->category->title}}</a>
              </div>
          </div>
        </div>
        @endforeach
      </div>
      @else
        <div class="row">
            <div class="col-6 mx-auto text-center mt-5" style=" min-height: 75vh">
                <h3>{{__('ui.10')}}</h3>
            </div>
        </div>
      @endif


    </div>
  </div>
</section>
</x-layout>