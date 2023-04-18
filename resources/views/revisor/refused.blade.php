<x-layout>
    <x-slot name="title">{{__('ui.11')}}</x-slot>

    <section class="bg-image">
    
    <div class="container " style="min-height: 75vh; margin-top: 15vh">
        @if ($announcements->count(0))
        <div class="row" style="--bs-gutter-x:0px;">
            <div class="col-12 d-flex flex-wrap justify-content-center">
                @foreach ($announcements as $announcement)
                    <div class="card presto-card" style="width: 25rem;">
                        <div class="card-body text-center">
                            <div class="container mt-5">
                                <div class="row">
                                    <div class="col-md-10 d-flex flex-wrap justify-content-center mx-auto">
                                        <img src="{{Storage::url($announcement->images[0]->file)}}" alt="" class="img-fluid" style="width: 300px; height:300px;">   
                                    </div>
                                </div>
                            </div>
                            {{-- <img src="{{Storage::url($image->file)}}" alt="" class="img-fluid" style="width: 300px; height:300px;"> --}}
                            <h5 class="card-title my-4">{{$announcement->title}}</h5>
                            <p class="card-subtitle m-2 icon-color fw-bold">€ {{$announcement->price}}</p>
                            {{-- <p class="card-text">{{$announcement->body}}</p> --}}
                            <div class="col-12 d-flex justify-content-between my-3">
                                <p class="card-text text-muted">{{__('ui.12')}} {{$announcement->created_at->format('d/m/Y')}}</p>
                            </div>
                            <div class="col-12 d-flex justify-content-between">
                                <p class="text-start">{{\Str::limit($announcement->body, 50)}}</p>
                                <a href="{{route('announcement.show',["announcement"=>$announcement,"title"=>$announcement->path()])}}" class="card-link"><i class="far fa-eye detail-icon"></i></a>
                              </div>

                              <div class="col-12 d-flex justify-content-start">
                                <p style="padding-right: 1rem">{{__('ui.13')}}</p>
                                <a class="fw-bold link-card" href="{{route('announcement.filtered', ['category'=>$announcement->category_id])}}">{{$announcement->category->title}}</a>
                            </div>
                            <div class="row m-3">
                                <div class="col-12">
                                    <form action="{{route('revisor.accept',$announcement->id)}}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-presto">
                                            {{__('ui.14')}}
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        @else
            <div class="row" style="--bs-gutter-x:0px;">
                    <div class="col-12 mx-auto text-center mt-5" style="min-height: 75vh;       margin-top: 15vh">

                        <h3>{{__('ui.36')}}</h3>
                        <div class="col-12">
                            {{__('ui.15')}}<a href="{{route('revisor.home')}}"> Home</a>
                        </div>
                    </div>
            </div>
        @endif
    </div>

</section>
</x-layout>