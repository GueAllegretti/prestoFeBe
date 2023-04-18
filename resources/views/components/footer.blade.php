<section class="footer" style="">
    <div class="container">
        <footer class="d-flex justify-content-between align-items-center py-3 my-4 mb-0">
        <div class="col-md-3 d-none d-lg-block text-center">
            <a href="{{route('home')}}" class="footer-link">Presto.it</a>
        </div>
        <div class="col-3 text-center">

            @auth
            <a href="{{route('auth.join')}}" class="footer-link">{{__('ui.28')}}</a>
            @else
            <a href="{{route('announcement.index')}}" class="footer-link">{{__('ui.24')}}</a>
            @endauth

        </div>
    <div class="col-md-3 text-center">
        <ul class="flag-style">
            <li class="footer-link">
                @include('components.locale', ['lang' => 'it', 'nation' => 'it'])
            </li>
            <li class="footer-link">
                @include('components.locale', ['lang' => 'en', 'nation' => 'gb'])
            </li>
            <li class="footer-link">
                @include('components.locale', ['lang' => 'fr', 'nation' => 'fr'])
            </li>
        </ul>
    </div>
        </footer>
    </div>
</section>