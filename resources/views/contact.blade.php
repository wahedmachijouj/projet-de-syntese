<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>contact</title>
    <link rel="stylesheet" href="{{ asset('css/nav.css') }}">
    <link rel="stylesheet" href="{{ asset('css/contact.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
    <link rel="icon" href="{{ asset('ressources/icon.svg') }}" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  </head>
  <body>


    @include('partiels.nav')

    <main>
          <div id="contact1">
            <h3>Contactez-nous</h3>
            <p>Vous avez des questions ou besoin d'informations supplémentaires?</p>
            <div>
              <p><span><img src="{{asset('ressources/tele.svg')}}" alt="connecter_image"/></span>  +212 123 456789</p>
              <p><span><img src="{{asset('ressources/email.svg')}}" alt="connecter_image"/></span>  connect@connect.ma</p>
              <p><span><img src="{{asset('ressources/adresse.svg')}}" alt="connecter_image"/></span>  123 Rue de l'Exemple, Casablanca, Maroc</p>
            </div>
          </div>

          <form action="/addMessage" method="POST" id="contact2">
            @csrf
            <div class="mb-3">
              <label for="email" class="form-label">email</label>
              <input type="email" name="email" id="email" class="form-control"/>
            </div>
            <div class="mb-3">
              <label for="message" class="form-label">message</label>
              <textarea id="message" name="message" class="form-control"></textarea>
            </div>
            <button type="submit" class ="BTN">envoyer</button>
          </form>
    </main>


    @include('partiels.footer')

  </body>
</html>