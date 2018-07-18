<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('layouts.partials._head')
</head>
<body>
<div id="app">

    <section class="hero is-primary is-large">
        <div class="head">
            @include('layouts.partials._navigation')
        </div>


        <main class="py-4">
            @yield('content')
        </main>
    </section>
</div>
</body>
</html>
