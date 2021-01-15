<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
    
    <title>Controle de Séries</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-2 d-flex justify-content-between">
        <a class="navbar navbar-expand-lg my-text-color" href="{{ route('listar_series') }}">Home</a>
        @auth
            <a href="/sair" class="text-out">Sair</a>
        @endauth
        
        @guest
        <a href="/entrar" class="text-in">Entrar</a>
        @endguest
   </nav>
    <div class="container">
        <div class="jumbotron">
            <h1 id="contrast">@yield('cabecalho')</h1>
        </div>
        @yield('conteudo')
    </div>
</body>
</html>