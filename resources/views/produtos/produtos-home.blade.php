<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos Home</title>
    @vite('resources/css/produtos-home-style.css')
</head>
<body>
    <main>
        <section class="container">
            <div class="container__secundario">
                <div class="mais__vendidos">
                    <h1>Mais Vendidos</h1>
                    <div class="imagens">
                        <img src="{{ asset('img/1.jpg') }}" width="150" height="150" alt="Placeholder">
                        <img src="{{ asset('img/2.gif') }}" width="150" height="150" alt="Placeholder">
                        <img src="{{ asset('img/3.jpg') }}" width="150" height="150" alt="Placeholder">
                        <img src="{{ asset('img/4.jpg') }}" width="150" height="150" alt="Placeholder">
                    </div>
                </div>
            </div>
            <div class="container__secundario">
                <div class="novidades">
                    <h1>Novidades</h1>
                    <div class="imagens">
                        <img src="{{ asset('img/4.jpg') }}" width="150" height="150" alt="Placeholder">
                        <img src="{{ asset('img/3.jpg') }}" width="150" height="150" alt="Placeholder">
                        <img src="{{ asset('img/2.gif') }}" width="150" height="150" alt="Placeholder">
                        <img src="{{ asset('img/1.jpg') }}" width="150" height="150" alt="Placeholder">
                    </div>
                </div>
            </div>
        </section>
    
    </main>  
</body>
</html>