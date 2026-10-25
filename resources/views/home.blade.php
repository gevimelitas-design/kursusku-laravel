<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $siteName }}</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

<header class="topbar">
    <div class="container">
        <div class="brand">
            <div class="brand-mark">K</div>
            <div>
                <strong>{{ $siteName }}</strong>
                <small>Laravel MVC</small>
            </div>
        </div>
        <span class="pill">Milestone 7</span>
    </div>
</header>

<div class="subnav">
    <div class="container">
        <nav>
            <a href="{{ route('home') }}">Beranda</a>
            <a href="#alur">Alur MVC</a>
            <a href="#kursus">Kursus Pilihan</a>
        </nav>
        <a href="#kursus" class="btn-light">Lihat Program</a>
    </div>
</div>

<main class="container">
    <section class="hero">
        <div>
            <p class="eyebrow">Pertemuan 7 · Framework Laravel</p>
            <h1>Belajar terstruktur dengan Route, Controller, dan Blade.</h1>
            <p class="lead">
                Landing page {{ $siteName }} dipindahkan dari PHP biasa ke pola framework
                Laravel. Request masuk melalui route, data disiapkan controller, lalu Blade
                merender HTML.
            </p>
            <div class="actions">
                <a href="#kursus" class="btn btn-primary">Program Belajar Unggulan</a>
                <a href="#alur" class="btn btn-outline">Lihat Alur MVC</a>
            </div>
        </div>
        <div class="hero-img">
            <img src="{{ asset('images/hero-kursus.png') }}" alt="Ilustrasi kelas KursusKu">
        </div>
    </section>

    <section class="block" id="alur">
        <h2>Alur MVC</h2>
        <div class="flow">
            <div>Browser<small>GET /</small></div>
            <div>Route<small>web.php</small></div>
            <div>Controller<small>HomeController@index</small></div>
            <div>Blade View<small>home.blade.php</small></div>
            <div>Response<small>HTML ke browser</small></div>
        </div>
    </section>

    <section class="block" id="kursus">
        <h2>Kursus Pilihan</h2>
        <div class="course-grid">
            @foreach ($featured as $course)
                <article class="card">
                    <small>{{ $course['code'] }}</small>
                    <h3>{{ $course['name'] }}</h3>
                    <p>{{ $course['description'] }}</p>
                </article>
            @endforeach
        </div>
    </section>
</main>

<footer>{{ $siteName }} · Praktikum Pemrograman Web III</footer>

</body>
</html>