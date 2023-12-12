<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta name="csrf-token" charset="utf-8" content="{{ csrf_token() }}" />
  

    <title>My Amazing Blog</title>
    <link rel="stylesheet" href="/main.css"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
        
</head>

<body>
    <div class="container">

        <div class="container">

            @include('partials/nav')
            
            

            <main class="mt-4">
                
                @yield('content')
            </main>
        </div>
</body>

</html>
