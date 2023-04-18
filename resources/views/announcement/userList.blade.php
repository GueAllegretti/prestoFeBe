<x-layout>
  <x-slot name="title">{{__('ui.25')}}</x-slot>

<section class="bg-image">


  <div class="row" style="--bs-gutter-x:0px;  margin-top: 10vh; border-bottom: 4px solid #1c1c1c;">
    <div class="col-6 mx-auto tx-style fs-2 text-center">
      <h2>
        Ciao
        <span class="fst-italic">{{$user->name}}</span>
      </h2>
    </div>
  </div>

    <div class="row mb-5" style="--bs-gutter-x:0px;">
      <div class="col-10 mx-auto d-flex flex-wrap justify-content-center">
        @foreach ($announcements as $announcement)
        <div class="container card presto-card">
          <div class="row">

            <div class="col-md-4">
              <div id="carouselExampleIndicators{{$announcement->id}}" class="carousel slide " data-bs-ride="carousel" >

                <div class="carousel-indicators">
                    @for ($i = 0; $i < count($announcement->images); ++$i)
                      @if(count($announcement->images) > 1)
                            <button type="button" data-bs-target="#carouselExampleIndicators{{$announcement->id}}" data-bs-slide-to="{{$i}}" class="@if($i == 0) active @endif" aria-current="true" aria-label="Slide {{$i + 1}}"></button>
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
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators{{$announcement->id}}" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators{{$announcement->id}}" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
                </button>
              </div>
            </div>

            {{-- <div class="col-12 col-md-4 d-flex justify-content-center">
              <img src="{{Storage::url($announcement->images[0]->file)}}" alt="" class="img-fluid m-3" style="width: 300px; height:00px;">
            </div> --}}
            <div class="col-12 col-md-8 p-5">
              <div class="row">
                <div class="col-6">
                  <h5 class="card-title">{{$announcement->title}}</h5>

                </div>
                <div class="col-6">

                  @if ($announcement->is_accepted == 1)
                     <div class="card-title" style="text-align: end; color: #7ed321">Approvato
                       </div>

                  @else
                       @if ($announcement->is_accepted == 0)
                       <div class="card-title" style="text-align: end; color: #fa3d04">
                        Non ancora approvato
                      </div>

                       @else
                       <div class="card-title" style="text-align: end; color: #fab804">
                        In attesa di revisione
                      </div>

                       @endif

                  @endif

                </div>
              </div>
              <p class="card-subtitle my-3 icon-color fw-bold">€ {{$announcement->price}}</p>
              <div class="col-12 d-flex justify-content-start">
                <p>{{\Str::limit($announcement->body, 70)}}</p>
              </div>
              <div class="col-12 d-flex justify-content-between">
                <p class="card-text text-muted fst-italic my-3">{{__('ui.12')}} {{$announcement->created_at->format('d/m/Y')}}</p>
                <a href="{{route('announcement.show',["announcement"=>$announcement,"title"=>$announcement->path()])}}" class="card-link"><i class="far fa-eye detail-icon"></i></a>
              </div>
              <div class="col-12 d-flex justify-content-start">
                <p style="padding-right: 1rem">{{__('ui.13')}}</p>
                <a class="fw-bold link-card" href="{{route('announcement.filtered', ['category'=>$announcement->category_id])}}">{{$announcement->category->title}}</a>
              </div>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </div>
</div>

</section>




</x-layout>