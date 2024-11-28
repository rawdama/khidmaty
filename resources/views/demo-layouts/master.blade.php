<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="اكتشف عالم السيارات بمتجر خدمتى - حيث الجودة تلتقي بالتنوع. احصل على أفضل قطع الغيار والإكسسوارات الرائعة لسيارتك اليوم!">
    <title>خدمتى</title>
    <link rel="shortcut icon" href="assetsdemo/images/logo.svg" type="image/x-icon">
    <!-- Required CSS -->
    <link rel="stylesheet" href="{{ asset('assetsdemo/css/bootstrap.rtl.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assetsdemo/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('assetsdemo/css/style.css') }}">
</head>
<body>
    <header>
    @include('demo-layouts.offersBar')
    <!-- nav bar -->
    @include('demo-layouts.navBar')
    </header>
    <main>
        <div class="container">
            <div class="card-body">
                @yield('content') <!-- Main content goes here -->
            </div>
        </div>
    <main>


    @include('demo-layouts.footer')
    <script src="assetsdemo/js/main.js"></script>
    <script src="assetsdemo/js/app.js"></script>
</body>
@yield('js')
<script>
    function changeLocale(locale) {
        let path = window.location.pathname;
        let newPath = path.replace(/\/(en|ar)/, `/${locale}`);
        window.location.href = newPath;
    }
</script>

</html>