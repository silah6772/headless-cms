<!DOCTYPE html>
<html>
@include('headlessCms.includes.head')
<body>

    @include('headlessCms.includes.navbar')

    @yield('content')

    @include('headlessCms.includes.footer')

    @include('headlessCms.includes.script')
</body>

</html>
