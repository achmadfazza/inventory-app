<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>{{ $title }}</title>
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <meta name="msapplication-TileColor" content="#206bc4" />
    <meta name="theme-color" content="#206bc4" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="mobile-web-app-capable" content="yes" />
    <meta name="HandheldFriendly" content="True" />
    <meta name="MobileOptimized" content="320" />
    <meta name="robots" content="noindex,nofollow,noarchive" />
    <link rel="icon" href="{{ asset('icon.png') }}" type="image/x-icon" />
    <link rel="shortcut icon" href="{{ asset('icon.png') }}" type="image/x-icon" />
    <!-- Tabler Core -->
    <link href="{{ asset('dist/css/tabler.min.css') }}" rel="stylesheet" />
</head>

<style>
    [data-parent] {
        display: none;
    }
</style>

<body class="antialiased border-top-wide border-primary d-flex flex-column whitespace-nowrap ">
    <div class="flex-fill d-flex flex-column justify-content-center">
        <div class="container-tight py-6">
            @yield('content')
        </div>
    </div>
</body>

<script src="https://code.jquery.com/jquery-3.6.2.js" integrity="sha256-pkn2CUZmheSeyssYw3vMp1+xyub4m+e+QK4sQskvuo4="
    crossorigin="anonymous"></script>
<script>
    $(function() {
        $("select").on("change", function() {
            if ($(this).val() === "") {
                $("[data-parent]").hide();
            } else if ($(this).val() === "Person") {
                $("[data-parent]").hide();
            } else {
                $("div[data-parent='" + $(this).val() + "']").show();
            }
        });
    });
</script>

</html>
