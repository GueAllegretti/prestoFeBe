<x-layout>
<x-slot name="title">Home</x-slot>

@if(session('message'))
    <div class="row justify-content-center align-items-center"  id="alert">
        <div class="col-6 alert alert-fixed bg-green fw-bold" style="color: white">{{session('message')}}</div>
    </div>
@endif

    <section style="overflow-x: hidden; height: 200vh;">
        <div class="container-fluid header">
            <div class="row" style="height: 80vh">
                <div class="col-12 masthead">
                    <h1 class="display-4 fw-normal tx-style">{{__('ui.1')}}
                        <span class="display-3 fw-bold fade-in">Presto.it</span>
                    </h1>
                    <p class="fs-3">{{__('ui.2')}}</p>
                    <a class="btn btn-presto fw-bold" href="{{route('announcement.create')}}">{{__('ui.3')}}</a>
                </div>
                <div class="bg-wrapper d-flex">
                    <div class="col m-2 bg-1">
                        <img class="img-home" src="/media/bgsm-1.webp" alt="">
                    </div>
                    <div class="col m-2 bg-2">
                        <img class="img-home" src="/media/bgsm-2.webp" alt="">
                    </div>
                    <div class="col m-2 bg-3">
                        <img class="img-home" src="/media/bgsm-3.webp" alt="">
                    </div>
                    <div class="col m-2 bg-4">
                        <img class="img-home" src="/media/bgsm-4.webp" alt="">
                    </div>
                    <div class=" col m-2 bg-5">
                        <img class="img-home" src="/media/bgsm-5.webp" alt="">
                    </div>
                    <div class="col m-2 bg-6">
                        <img class="img-home" src="/media/bgsm-6.webp" alt="">
                    </div>
                    <div class="col m-2 bg-7">
                        <img class="img-home" src="/media/bgsm-7.webp" alt="">
                    </div>
                    <div class=" col m-2 bg-8">
                        <img class="img-home" src="/media/bgsm-8.webp" alt="">
                    </div>
                </div>
            </div>
            <div class="container mt-5">
                <div class="glide">
                    <div class="glide__track" data-glide-el="track">
                      <ul class="glide__slides">

                    @foreach ($announcements as $announcement)
                        <li class="glide__slide">
                            <div class="card presto-card">
                                    <div class="card-body text-center">
                                        <img src="{{Storage::url($announcement->images[0]->file)}}" alt="" class="img-fluid" style="width: 300px; height:300px;">
                                        <h5 class="card-title fw-bold mt-2">{{$announcement->title}}</h5>
                                    <p class="card-subtitle m-2 icon-color fw-bold">€ {{$announcement->price}}</p>
                                    <div class="col-12 d-flex justify-content-between">
                                        <p class="card-text text-muted fst-italic">{{__('ui.4')}} {{$announcement->created_at->format('d/m/Y')}}</p>
                                        <a href="{{route('announcement.show',["announcement"=>$announcement,"title"=>$announcement->path()])}}" class="card-link"><i class="far fa-eye detail-icon"></i></a>
                                    </div>
                                    <div class="col-12 d-flex justify-content-start">
                                        <p style="padding-right: 1rem">{{__('ui.5')}}</p>
                                        <a class="fw-bold link-card" href="{{route('announcement.filtered', ['category'=>$announcement->category_id])}}">{{$announcement->category->title}}</a>
                                    </div>
                                </div>
                            </div>
                        </li>
                    @endforeach

                      </ul>
                    </div>
                    <div class="glide__bullets" data-glide-el="controls[nav]">
                        <button class="glide__bullet" data-glide-dir="=0"></button>
                        <button class="glide__bullet" data-glide-dir="=1"></button>
                        <button class="glide__bullet" data-glide-dir="=2"></button>
                        <button class="glide__bullet" data-glide-dir="=3"></button>
                        <button class="glide__bullet" data-glide-dir="=4"></button>
                      </div>
                  </div>
            </div>


        </div>
    </section>



</x-layout>
