<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>À-propos</title>
    <link rel="stylesheet" href="{{ asset('css/nav.css') }}">
    <link rel="stylesheet" href="{{ asset('css/apropos.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
    <link rel="icon" href="{{ asset('ressources/icon.svg') }}" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  </head>

  <body>
    @include('partiels.nav')

    <main>
      <section>
          <div>
            <h3>À Propos de Notre Site de Gestion de Rendez-vous</h3>
          </div>

          <div>
            <p> Bienvenue sur notre site dédié à la gestion de rendez-vous en ligne ! Nous sommes ravis de
                vous présenter une plateforme innovante conçue pour simplifier et améliorer le processus de
                prise de rendez-vous pour les clients et les professionnels. Voici quelquesuns des objectifs 
                clés de notre site web:
            </p>
            <div>
              <p>
                <img src="{{ asset('ressources/iconapropos.svg')}}" alt="icon_a_propos"/>
                Faciliter la prise de rendez-vous en ligne pour les clients</p>
              <p>
                <img src="{{ asset('ressources/iconapropos.svg')}}" alt="icon_a_propos"/>
                Optimiser la gestion des rendez-vous pour les professionnels</p>
              <p>
                <img src="{{ asset('ressources/iconapropos.svg')}}" alt="icon_a_propos"/>
                Offrir une expérience utilisateur fluide et intuitive</p>
            </div>
          </div>
      </section>


      <section>
            <h2>Comment ça Marche sur connect.ma</h2>
            <p>Découvrez comment connect.ma simplifie la prise de rendez-vous pour les utilisateurs et les
              professionnels. Notre plateforme intuitive et flexible offre une expérience fluide et efficace.</p>
            <div>
                <div>
                    <h4 class="h4">Pour les Utilisateurs</h4>
                    <p class ="p">Trouvez facilement les services disponibles et réservez votre rendez-vous en quelques clics.</p>
                </div>

                <div>
                    <h4 class="h4">Pour les Professionnels</h4>
                    <p class ="p">Gérez votre emploi du temps, acceptez ou modifiez les rendezvous et communiquez avec vos clients.</p>
                </div>

                
                <div>
                    <h4 class="h4">Meilleure organisation</h4>
                    <p class ="p">Vous aurez une vue d'ensemble de vos rendez-vous, ce qui vous permettra de mieux organiser votre journée et d'augmenter votre productivité.</p>
                </div>
            </div>
        </section>
  
    </main>


    @include('partiels.footer')
  </body>
</html>