<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Montebello Cali - Clasificados</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <script src="https://cdn.tailwindcss.com"></script>
        <script src="https://use.fontawesome.com/fc92c6a6ce.js"></script>
        {{-- icons --}}
        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
        <script src="https://cdn.ckeditor.com/ckeditor5/18.0.0/classic/ckeditor.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script crossorigin src="https://unpkg.com/react@18/umd/react.development.js"></script>
        <script crossorigin src="https://unpkg.com/react-dom@18/umd/react-dom.development.js"></script>
        <!-- Babel CDN for JSX -->
        <script src="https://unpkg.com/@babel/standalone/babel.min.js"></script>
         <!-- PropTypes CDN -->
        <script src="https://unpkg.com/prop-types/prop-types.min.js"></script>
        {{-- recapctha --}}
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>

        <!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-4Y714FEC5P"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-4Y714FEC5P');
</script>

        <style>
            .bg-background {
                background-color: #091f4d;
            }
            .bg--header {
                background-color: #1F2937;
            }
            .ck-content{
                height: 400px;
            }
        </style>
       
 
</head>
<body class="flex flex-col min-h-screen bg-gray-300">
    <x-header />          
    <main class="flex-grow container mx-auto px-2 py-6">
       @yield('content')
    </main>
    <x-footer />   
   
</body>
</html>