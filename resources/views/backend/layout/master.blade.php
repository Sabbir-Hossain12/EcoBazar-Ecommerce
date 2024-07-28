 @include("backend.include.meta-titles")

<body class="pace-done sidebar-enable" data-sidebar-size="lg">

<!-- <body data-layout="horizontal"> -->

<!-- Begin page -->
<div id="layout-wrapper">

  

    @include('backend.include.topbar')


    @include('backend.include.sidebar')
 



    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                @yield('contents')

            </div> 
        </div>
        


        @include('backend.include.footer')
    </div>
 

</div>





    <!-- JAVASCRIPT -->
    @include("backend.include.scripts")


</body>

</html>
