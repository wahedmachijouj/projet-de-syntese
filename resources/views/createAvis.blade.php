<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Avis</title>
        <link rel="stylesheet" href="{{ asset('css/nav.css') }}">
        <link rel="stylesheet" href="{{ asset('css/createavis.css') }}">
        <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
        <link rel="icon" href="{{ asset('ressources/icon.svg') }}" type="image/x-icon">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    </head>
    <body>

        @include('partiels.nav')

<div class= "avis">
        <div class="row justify-content-center mt-5 BORDER">
            <div class="col-lg-9">

                <form action="/addavis/{{ $id }}" method="post" class="mt-5">
                    @csrf
                    <div class="form-group">
                        <textarea class="form-control" name="avis" id="avis" rows="3" placeholder="Entrer votre avis"></textarea>
                    </div>
                    <button type="submit" class="BTN mt-4">Ajouter</button>
                </form>

            </div>
        </div>
</div>
                    
        @include('partiels.footer')

    </body>
</html>