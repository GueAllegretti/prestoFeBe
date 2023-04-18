<form action="{{route('locale', $lang)}}" method="post">
    @csrf
        <button type="submit" class="footer-link" style="background-color: transparent; border:none;">
            <span class="flag-icon flag-icon-{{$nation}}"></span>
        </button>
    </form>