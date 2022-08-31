<script>
    window.test = '123';
    window.routeHasLogin = "{{Route::has('login')}}";
    window.routeHasRegister = "{{Route::has('register')}}";

    @auth
        window.isUserLogin = "true";
    @else
        window.isUserLogin = "false";
    @endauth

    // window.user = JSON.parse("{{auth()->user()}}");
    window.user = @json(auth()->user());

    window.addEventListener('load', (event) => {
        console.log('page is fully loaded',window.user);
    });
</script>