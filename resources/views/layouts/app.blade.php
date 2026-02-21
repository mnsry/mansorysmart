<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <!-- CSRF Token -->
    <meta charset="UTF-8">
    <meta name="robots" content="index, follow">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'BMS | هوشمندسازی ساختمان و برق صنعتی')</title>
    <meta name="description" content="@yield('description', 'شرکت BMS ارائه‌دهنده خدمات هوشمندسازی ساختمان، برق صنعتی و سیستم‌های مدیریت انرژی.')">
    <meta name="keywords" content="@yield('keywords', 'BMS, هوشمندسازی ساختمان, برق صنعتی, خانه هوشمند, سیستم هوشمند')">
    <meta name="generator" content="مسعود منصوری">
    <link rel="canonical" href="{{ url()->current() }}">
    <!-- Open Graph -->
    <meta property="og:title" content="@yield('og_title', 'BMS | هوشمندسازی ساختمان و برق صنعتی')">
    <meta property="og:description" content="@yield('og_description', 'راهکارهای نوین در هوشمندسازی ساختمان و سیستم‌های برق صنعتی')">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:image" content="@yield('og_image', asset('images/app/mansory.jpg'))">
    <!-- Favicons -->
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/favicon/favicon-32x32.png.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/favicon/favicon-16x16.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('images/favicon/apple-touch-icon.png') }}">
    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <!-- Schema عمومی سازمان -->
    <script type="application/ld+json">
    {
    "@context": "https://schema.org",
      "@type": "LocalBusiness",
      "name": "BMS",
      "image": "{{ asset('images/app/mansory.jpg') }}",
      "url": "{{ url('/') }}",
      "logo": "{{ asset('images/icons/icon-512x512.png') }}",
      "description": "شرکت BMS ارائه‌دهنده خدمات هوشمندسازی ساختمان، برق صنعتی و سیستم‌های مدیریت انرژی",
      "priceRange": "$$",
      "areaServed": "IR",
      "sameAs": [],
      "serviceOffered": [
        {
          "@type": "Service",
          "name": "هوشمندسازی ساختمان",
          "description": "طراحی و اجرای سیستم‌های هوشمند ساختمان"
        },
        {
          "@type": "Service",
          "name": "برق صنعتی",
          "description": "اجرای پروژه‌های برق صنعتی و اتوماسیون"
        }
      ]
    }
    </script>
    @vite('resources/js/app.js')
    @laravelPWA
</head>
    <body>
        @yield('content')
    </body>
</html>
