<x-layout>
    <x-slot name="title">{{__('ui.22')}}</x-slot>

<section class="bg-image">

@if ($announcement)

    <div class="container " style="min-height: 75vh; margin-top: 15vh">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-center fw-bold fs-2">
                        <p class="d-flex justify-content-between">
                            {{__('ui.16')}} # {{$announcement->id}}
                            <span class="fs-5">{{__('ui.4')}}
                                <span class="fst-italic fs-5">{{$announcement->created_at->format('d/m/Y H:00')}}</span>
                            </span>
                        </p>
                    </div>
                    <div class="container">
                        <div class="row d-flex justify-content-around">
                            <div class="col-md-12 d-flex flex-wrap ">
                                @foreach ($announcement->images as $image)
                                <div class="row">
                                    <div class="col-6">
                                        <img src="{{$image->getUrl(500, 350)}}" alt="" class="img-fluid m-2">

                                    </div>
                                    <div class="col-6">
                                            <ul>
                                                <li>{{__('ui.50')}}:
                                                    @if ($image->adult == "VERY_UNLIKELY" || $image->adult == "UNLIKELY")
                                                    <span>
                                                        <i class="fas fa-check fa-2x" style="color:#7ed321;"></i>
                                                        {{-- {{$image->adult}} <img class="img-home" src="/media/check.png" alt=""> --}}
                                                    </span>
                                                    @elseif ($image->adult == "POSSIBLE")
                                                    <span>
                                                        <i class="fas fa-exclamation fa-2x" style="color:rgb(255, 174, 0)"></i>
                                                    </span>
                                                    @else
                                                    <span>
                                                        <i class="fas fa-times fa-2x px-2" style="color:red;"></i>
                                                    </span>
                                                    @endif
                                                </li>
                                                <li>{{__('ui.51')}}:
                                                    @if ($image->medical == "VERY_UNLIKELY" || $image->medical == "UNLIKELY" )
                                                    <span>
                                                        <i class="fas fa-check fa-2x" style="color:#7ed321;"></i>
                                                    </span>
                                                    @elseif ($image->medical == "POSSIBLE")
                                                    <span>
                                                        <i class="fas fa-exclamation fa-2x" style="color:rgb(255, 174, 0)"></i>
                                                    </span>
                                                    @else
                                                    <span>
                                                        <i class="fas fa-times fa-2x px-2" style="color:red;"></i>
                                                    </span>
                                                    @endif
                                                </li>
                                                <li>{{__('ui.52')}}:
                                                    @if ($image->spoof == "VERY_UNLIKELY" || $image->spoof == "UNLIKELY")
                                                    <span>
                                                        <i class="fas fa-check fa-2x" style="color:#7ed321;"></i>
                                                    </span>
                                                    @elseif ($image->spoof == "POSSIBLE")
                                                    <span>
                                                        <i class="fas fa-exclamation fa-2x" style="color:rgb(255, 174, 0)"></i>
                                                    </span>
                                                    @else
                                                    <span>
                                                        <i class="fas fa-times fa-2x px-2" style="color:red;"></i>
                                                    </span>
                                                    @endif
                                                </li>
                                                <li>{{__('ui.53')}}:
                                                    @if ($image->violence == "VERY_UNLIKELY" || $image->violence == "UNLIKELY")
                                                    <span>
                                                        <i class="fas fa-check fa-2x" style="color:#7ed321;"></i>
                                                    </span>
                                                    @elseif ($image->violence == "POSSIBLE")
                                                    <span>
                                                        <i class="fas fa-exclamation fa-2x" style="color:rgb(255, 174, 0)"></i>
                                                    </span>
                                                    @else
                                                    <span>
                                                        <i class="fas fa-times fa-2x px-2" style="color:red;"></i>
                                                    </span>
                                                    @endif
                                                </li>
                                                <li>{{__('ui.54')}}:
                                                    @if ($image->racy == "VERY_UNLIKELY" || $image->racy == "UNLIKELY")
                                                    <span>
                                                        <i class="fas fa-check fa-2x" style="color:#7ed321;"></i>
                                                    </span>
                                                    @elseif ($image->racy == "POSSIBLE")
                                                    <span>
                                                        <i class="fas fa-exclamation fa-2x" style="color:rgb(255, 174, 0)"></i>
                                                    </span>
                                                    @else
                                                    <span>
                                                        <i class="fas fa-times fa-2x px-2" style="color:red;"></i>
                                                    </span>
                                                    @endif
                                                </li>
                                            </ul>
                                            <ul class="fw-bold"> Etichette:
                                                @if ($image->labels)
                                                <div>(
                                                    @foreach ($image->labels as $label)

                                                    <span class="fw-normal">"{{$label}}" </span>
                                                    @endforeach
                                                )
                                                </div>
                                                @endif
                                            </ul>
                                    </div>

                                </div>

                                @endforeach

                            </div>

                        </div>


                    </div>
                    <hr>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-2 mt-3">
                                <h3>{{__('ui.17')}}</h3>
                            </div>
                            <div class="col-md-10 mt-3">
                                <p>Id: <span class="fst-italic">#{{$announcement->user->id}}</span></p>
                                <p>{{__('ui.23')}}: <span class="fst-italic">{{$announcement->user->name}}</span></p>
                                <p>e-mail: <span class="fst-italic">{{$announcement->user->email}}</span></p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-2">
                                <h3>{{__('ui.18')}}</h3>
                            </div>
                            <div class="col-md-10 mt-1">
                                <p class="fst-italic">{{$announcement->title}}</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-2">
                                <h3>{{__('ui.19')}}</h3>
                            </div>
                            <div class="col-md-10 mt-1">
                                <p class="fst-italic">{{$announcement->body}}</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 d-flex justify-content-between">
                <form action="{{route('revisor.accept',$announcement->id)}}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-presto m-3">
                        <i class="fas fa-check fa-2x"></i>
                    </button>
                </form>
                <form action="{{route('revisor.reject',$announcement->id)}}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-presto delete-color mt-3">
                        <i class="fas fa-times fa-2x px-2"></i>
                    </button>
                </form>
            </div>
        </div>
    </div>
    @else
    <div class="row" style="--bs-gutter-x:0px;">
        <div class="col-6 mx-auto text-center" style="min-height: 75vh; margin-top: 15vh">
            <h2 class="fw-bold">{{__('ui.20')}}</h2>
            <div class=" mx-auto mt-5">
                <h3>{{__('ui.21')}}
                    {{-- <a href="{{route('revisor.refused')}}"><i class="fas fa-trash fa-2x icon-color"></i></a> --}}
                </h3>
            </div>
            <img src="/media/arrow.png" class="arrow d-none d-md-block" alt="">
        </div>
    </div>
@endif
</section>
</x-layout>