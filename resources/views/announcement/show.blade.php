<x-layout>
  <x-slot name="title">{{__('ui.35')}}</x-slot>
<section class="bg-image">


  <div class="row" style="--bs-gutter-x:0px;  margin-top: 10vh; border-bottom: 4px solid #1c1c1c;">
    <div class="col-6 mx-auto tx-style fs-2 text-center">{{__('ui.35')}}: <span class="fst-italic">{{$announcement->title}}</span></div>
  </div>

  <div class="container" style="min-height: 75vh; margin-top: 15vh">
    <div class="row" style="--bs-gutter-x:0px;">

      <div class="col-12">
        <div class="card mb-3">
          <div class="row g-0" style="border-bottom: 1px solid rgba(0, 0, 0, 0.125);">
            <div class="col-md-4">
              <div id="carouselExampleIndicators" class="carousel slide " data-bs-ride="carousel" >

                <div class="carousel-indicators">
                    @for ($i = 0; $i < count($announcement->images); ++$i)
                      @if(count($announcement->images) > 1)
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{$i}}" class="@if($i == 0) active @endif" aria-current="true" aria-label="Slide {{$i + 1}}"></button>
                        @endif
                    @endfor
                </div>

                <div class="carousel-inner m-3">
                    @if(count($announcement->images) == 0)
                        <div class="carousel-item text-center active">
                            <img src="https://wtwp.com/wp-content/uploads/2015/06/placeholder-image.png" alt="">
                        </div>
                    @else
                        @foreach ($announcement->images as $key=> $image)
                            <div class="carousel-item text-center {{$key==0 ? 'active': ''}}">
                                <img  class="img-fluid"src="{{$image->getUrl(500, 350)}}">
                            </div>
                        @endforeach
                    @endif
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
                </button>
              </div>
            </div>
            <div class="col-md-8">
              <h5 class="card-title text-center fs-2 m-4">{{$announcement->title}}</h5>
              <p class="card-subtitle m-2 icon-color fw-bold text-center fs-3">€ {{$announcement->price}}</p>
              <div class="ps-3">

                <p class="card-text fw-bold ms-4">{{__('ui.19')}}:
                  <p class="ms-4 me-3">{{$announcement->body}}</p>
              </div>

              </p>
            </div>
          </div>

          <div class="row g-0">
            <div class="col-12 d-flex justify-content-between">
            <p class="m-3" style="padding-right: 1rem">{{__('ui.13')}}:
            <a class="fw-bold link-card" href="{{route('announcement.filtered', ['category'=>$announcement->category_id])}}">{{$announcement->category->title}}</a></p>
            <p class="card-text fst-italic text-end m-3">{{__('ui.12')}} {{$announcement->created_at->format('d/m/Y')}} {{__('ui.37')}} {{$announcement->user->name}}</p>
          </div>
          </div>
        </div>
        {{-- <div class="card">
          <div class="card-body d-flex flex-wrap justify-content-center">
            <div class="col-3">

              <div id="carouselExampleIndicators" class="carousel slide " data-bs-ride="carousel" >

                <div class="carousel-indicators">
                    @for ($i = 0; $i < count($announcement->images); ++$i)
                      @if(count($announcement->images) > 1)
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{$i}}" class="@if($i == 0) active @endif" aria-current="true" aria-label="Slide {{$i + 1}}"></button>
                        @endif
                    @endfor
                </div>

                <div class="carousel-inner">
                    @if(count($announcement->images) == 0)
                        <div class="carousel-item text-center active">
                            <img src="https://wtwp.com/wp-content/uploads/2015/06/placeholder-image.png" alt="">
                        </div>
                    @else
                        @foreach ($announcement->images as $key=> $image)
                            <div class="carousel-item text-center {{$key==0 ? 'active': ''}}">
                                <img  class="img-fluid"src="{{$image->getUrl(400, 300)}}">
                            </div>
                        @endforeach
                    @endif
                </div>

              </div>
            </div>
            <div class="col-8">

              <h5 class="card-title text-center fs-2 m-4">{{$announcement->title}}</h5>
              <p class="card-subtitle m-2 icon-color fw-bold text-center fs-3">€ {{$announcement->price}}</p>
              <p class="card-text">{{__('ui.19')}}: <span class="fs-5">{{$announcement->body}}</span></p>
              <p class="card-text fst-italic text-end mt-3">{{__('ui.12')}} {{$announcement->created_at->format('d/m/Y')}} {{__('ui.37')}} {{$announcement->user->name}}</p>
            </div>
          </div>
        </div> --}}
        <div class="col-12 d-flex justify-content-between">
          <a href="{{route('announcement.index')}}" class="btn-presto ms-5">
            <i class="fas fa-chevron-left fa-2x px-2"></i>
          </a>
          <a href="{{route('announcement.edit', compact('announcement'))}}" class="btn btn-presto me-5">
            <i class="fas fa-pen fa-2x"></i>
          </a>
      </div>
    </div>
  </div>

              {{-- button --}}
              {{-- <div class="row m-2">
                <div class="col-12 d-flex justify-content-between">
                  <a href="{{route('announcement.index')}}" class="btn-presto ms-5">
                    <i class="fas fa-chevron-left fa-2x px-2"></i>
                  </a>
                  <a href="{{route('announcement.edit', compact('announcement'))}}" class="btn btn-presto me-5">
                    <i class="fas fa-pen fa-2x"></i>
                  </a> --}}
                  {{-- <form action="{{route('announcement.destroy', compact('announcement'))}}" method="post">
                    @csrf
                    @method('delete')
                    <button class="btn btn-presto delete-color" style="">
                      <i class="fas fa-times fa-2x px-2"></i>
                    </button>
                  </form> --}}
              </div>
            </div>

          </section>


          </x-layout>
