<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Accueil</title>
    <link rel="stylesheet" href="{{ asset('css/nav.css') }}">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
    <link rel="icon" href="{{ asset('ressources/icon.svg') }}" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <style>
      @import url('https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap');
    </style>
  </head>
  <body>

    @include('partiels.nav')
    <main>
        <section >
          <div>
            <h2>Bienvenue sur connect.ma, la plateforme innovante pour la gestion de rendez-vous en ligne</h2>
            <p>Simplifiez et optimisez la gestion de vos rendez-vous professionnels et offrez à vos clients une expérience fluide et intuitive</p>
            <div>
              <a href = "{{ route('login') }}" class = "lien1">Connecter</a>
              <a href = "{{ route('register') }}" class = "lien2">Inscrire</a>
            </div>
          </div>
          <div>
            <img src="{{asset('ressources/homePic.svg')}}" alt="home_image"/>
          </div>
        </section>


        <section>
            <h2>Gérez vos rendez-vous en toute simplicité</h2>
            <p>connect.ma est une plateforme en ligne innovante et intuitive qui simplifie la gestion de vos rendez-vous. Avec notre interface conviviale et nos fonctionnalités avancées, vous pouvez facilement rechercher des services, choisir votre professionnel préféré et réserver un rendez-vous en quelques clics.</p>
            <div>
                <div>
                    <h4 class="h4">INTERFACE UTILISATEUR FACILE À UTILISER</h4>
                    <p class ="p">Recherchez des services, choisissez votre professionnel préféré et réservez un rendezvous en quelques clics. </p>
                </div>

                <div>
                    <h4 class="h4">GESTION DES RENDEZVOUS INTUITIVE</h4>
                    <p class ="p">Gérez vos disponibilités, acceptez ou modifiez les rendez-vous et communiquez avec vos clients.</p>
                </div>

                
                <div>
                    <h4 class="h4">PERSONNALISATION DES SERVICES</h4>
                    <p class ="p">Définissez les services que vous proposez. les durées de rendezvous et paramétrez votre disponibilité.</p>
                </div>
            </div>
        </section>




        <section>
          <div class = "p1">
            <div class = "p11">
                <h3>Connectez-vous avec connect.ma pour simplifier et optimiser la gestion de vos rendez-vous</h3>
            </div>
            <div class="p12">
              <p>Découvrez les avantages de l'utilisation de connect.ma pour faciliter la prise de rendez-vous en ligne et optimiser la gestion de vos rendezvous.</p>
              <div>
                <div>
                  <span>50%</span>
                  <p>Gain de temps, réduction des rendezvous manqués, meilleure organisation.<p>
                </div>
                <div>
                  <span>50%</span>
                  <p>Expérience utilisateur fluide, interface intuitive<p>
                </div>
              </div>
            </div>
          </div>

          <div class = "p2">
            <h2>Simplifiez la gestion de rendez-vous</h2>
            <p>Connectez-vous dès maintenant et découvrez notre solution complète et intuitive </p>
            <div>
              <a href = "{{ route('login') }}" >Connecter</a>
              <a href = "{{ route('register') }}" >Inscrire</a>
            </div>
          </div>
        </section>



    </main>

    @include('partiels.footer')
  </body>
</html>



