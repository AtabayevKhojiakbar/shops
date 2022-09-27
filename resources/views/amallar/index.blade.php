@extends('.dashboard')
@section('content')
<div>
    <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top bg-gradient-primary">
        <a class="m-3 nav-link {{  request()->routeIs('amallar.sotish') ? 'active' : '' }}" href="{{route('amallar.sotish')}}"><span> Sotish</span></a>
        <a class="m-3 nav-link {{  request()->routeIs('amallar.sotib_olish') ? 'active' : '' }}" href="{{route('amallar.sotib_olish')}}"><span> Sotib olish</span></a>
        <a class="m-3 nav-link {{  request()->routeIs('amallar.kochirish') ? 'active' : '' }}" href="{{route('amallar.kochirish')}}"><span> Ko'chirish</span></a>
    </nav>
    <div class="container-fluid">
        @yield('amal')
    </div>
</div>


@endsection
