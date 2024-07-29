
<!DOCTYPE html>
<html lang="en">
<head>

    <!-- Meta Titles include -->
    @include('frontend.include.meta-titles')

</head>
<body>

    <!-- Headers include -->
    @include('frontend.include.header')
   

        @yield('body-content')


    <!-- Footer include -->
    @include('frontend.include.footer')


    <!-- Script include -->
    @include('frontend.include.script')

</body>
</html>