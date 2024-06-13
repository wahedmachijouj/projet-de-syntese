<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Recherche</title>
    <link rel="stylesheet" href="{{ asset('css/nav.css') }}">
    <link rel="stylesheet" href="{{ asset('css/recherche.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
    <link rel="icon" href="{{ asset('ressources/icon.svg') }}" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <style>
      @import url('https://fonts.googleapis.com/css2?family=Chewy&display=swap');
    </style>
  </head>
  <body >

    @include('partiels.nav')


    <main>
      @auth

        <!-- <form   action="/recherche"  method='post' id='rechercheForm'>
          @csrf
          <div id="rechercheFormInputGroup">
            <button type="submit">
              <img src="{{ asset('ressources/search.svg') }}" alt="search">
            </button>
            <input type="text" name="name" placeholder="nom"/>
          </div>
        </form>  -->

        <form action="/recherche"  method='post' id='rechercheForm'>
          @csrf
          <div id='first'>
            <button id = 'fromb' type="submit">
              <img src="{{ asset('ressources/search.svg') }}" alt="search">
            </button>
            
            <input  type="text" name="name" placeholder="nom" id='formi'/>
          </div>

          <div id='second'>
                <select class="form-select" name="category" id="category">
                  <option selected  value="aucun">aucun</option>
                  <option value="medcin">medcin</option>
                  <option value="coiffeur">coiffeur</option>
                  <option value="dentist">dentist</option>
                </select>
          </div>

        </form>

        <div id = "content">
          @isset($users)
            @if ($users->count() > 0)
              
                @foreach($users as $user)

                  <div class='content-card'>
                      <div class="header-card">
                        <h3>{{$user->name}}</h3>
                        <h4> <i>{{$user->category}}</i></h4>
                      </div>
                      <div class="body-card">
                        <p style=" height:100px;" class = 'desc'>{{$user->desc}}</p>
                      </div>
                      <div class="footer-card">
                        <p><small class = 'adresse'>{{$user->adresse}}</small></p>
                        <a href='profil/{{ $user->id }}'>voir</a>
                      </div>
                  </div>

                @endforeach
              
            @endif
          @endisset

          @empty($users)
            <p><strong>aucun utilisateur avec ce nom : {{$name}}</strong></p>
          @endempty
        </div>

    @endauth

      <script>

          const descriptionElements = document.querySelectorAll('.desc');
          const adresseElements = document.querySelectorAll('.adresse');

          descriptionElements.forEach(function(element) {
            if(element.innerText.length > 145){
              var fullDescription = element.innerText;
              var truncatedDescription = fullDescription.substring(0, 142);
              element.innerText = truncatedDescription + '...';
            }
          });

          adresseElements.forEach(function(element) {
            if(element.innerText.length > 46){
              var fullAdresse = element.innerText;
              var truncatedAdresse = fullAdresse.substring(0, 45);
              element.innerText = truncatedAdresse + '...';
            }
          });

      </script>
    </main>
    @include('partiels.footer')
  </body>
</html>