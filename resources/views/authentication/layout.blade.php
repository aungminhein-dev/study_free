<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <!-- Primary Meta Tags -->
    <title>MSA - @yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="title" content="Volt - Free Bootstrap 5 Dashboard">
    <meta name="author" content="Themesberg">

   @include('auth.layout.style')
    <!-- NOTICE: You can use the _analytics.html partial to include production code specific code & trackers -->

</head>
<body>
    <main>
        @yield('content')
    </main>
    @include('auth.layout.script')
    <script>
        function generateUsername() {
            const nameInput = document.getElementById('name').value;
            const username = nameInput.toLowerCase().replace(/\s+/g, '_');
            document.getElementById('username').value = username;
        }
    </script>
</body>
</html>
