@include('master.includes.head')
@include('master.includes.nav_area')
@include('master.includes.side_area')
@include('master.includes.breadcrum_area')
{{-- -------------------------start dynamic content area--------------------------- --}}
@yield('content')
{{-- --------------------------end dynamic content area---------------------------- --}}
@include('master.includes.footer')