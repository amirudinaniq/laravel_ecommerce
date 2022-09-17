<!doctype html>
<html lang="en">

<head>
    @include('common.meta')
    @include('common.window')
    @include('common.databaseRoutes')
</head>

<body>
   
    <div id="app" class="pt-130">
        <!--====== PRELOADER PART START ======-->
        
        <div class="preloader">
            <div class="spin">
                <div class="cube1"></div>
                <div class="cube2"></div>
            </div>
        </div>
        
        <!--====== PRELOADER PART START ======-->
        
        <!--====== HEADER PART START ======-->
        {{-- @include('common.header') --}}
        <headercomp></headercomp/>
        <!--====== HEADER PART ENDS ======-->

        @yield('content')

        <footercomp></footercomp>
    </div>
    

    <!-- scripts -->
    @vite([ 'resources/js/app.js'])
    
    <!-- common scripts -->
    @include('common.scripts')

    @yield('scripts')
</body>

</html>
