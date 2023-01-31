<!DOCTYPE html>
<html>
@include('sharaCms.includes.head')
<body>

    @include('sharaCms.includes.navbar')

    @yield('content')

    @include('sharaCms.includes.footer')

    @include('sharaCms.includes.script')
</body>

</html>
