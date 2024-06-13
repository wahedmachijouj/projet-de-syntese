<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inscrire</title>
    <link rel="stylesheet" href="{{ asset('css/nav.css') }}">
    <link rel="stylesheet" href="{{ asset('css/inscrit.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
    <link rel="icon" href="{{ asset('ressources/icon.svg') }}" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  </head>
  <body>



  @include('partiels.nav')
    <main>
            <div id="mainImage">
                <img src="{{asset('ressources/inscritPic.svg')}}" alt="connecter_image"/>
            </div>

            <div id="mainFrom">
                <div>
                    <h1>Inscrire</h1>
                </div>
                <div >
                    <!-- @if(Session::has('success'))
                        <div class="alert alert-success" role="alert">
                            {{ Session::get('success') }}
                        </div>
                    @endif -->
                    @if($errors->any())
                        <ul class="alert alert-danger list-unstyled" role="alert">
                            @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    @endif
                    <form action="{{ route('register') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Nom</label>
                            <input type="text" name="name" class="form-control" id="name" placeholder="John laka" required>
                        </div>
                        <div class="mb-3 d-none" id="selectbox">
                            <label  class="form-label" for="category">Choisissez une catégorie</label>
                            <select class="form-select" name="category" id="category">
                                <!-- <option selected  value="aucun">aucun</option> -->
                                <option selected value="medcin">medcin</option>
                                <option value="coiffeur">coiffeur</option>
                                <option value="dentist">dentist</option>
                            </select>
                        </div>

                        <div class="mb-3 d-none" id="adres">
                            <label for="adresse" class="form-label">adresse</label>
                            <input type="text" name="adresse" class="form-control" id="adresse" placeholder="Adresse"/>
                        </div>


                        <div class="mb-3">
                            <label for="email" class="form-label">Adresse e-mail</label>
                            <input type="email" name="email" class="form-control" id="email" placeholder="Nom@exemple.com" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Mot de passe</label>
                            <input type="password" name="password" class="form-control" id="password" required>
                        </div>
                        <div class="mb-3">
                            <div class="form-check form-check-inline">
                                <input type="radio" id="professionnel" name="type" value="professionnel"/>
                                <label for="professionnel">professionnel</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input type="radio" id="normal" name="type" value="normal"/>
                                <label for="normal">normal</label>
                            </div>

                            
                        </div>
                        <div class="mb-3">
                            <div class="d-grid">
                                <button class="BTN">Inscrire</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>      
    </main>
    @include('partiels.footer')
    <script>
        const optionP = document.getElementById('professionnel');
        const optionN = document.getElementById('normal');
        const selectbox = document.getElementById('selectbox');
        const adresse = document.getElementById('adres');


 
        optionP.addEventListener('change', function() {
            if (optionP.checked) {
                selectbox.classList.remove('d-none');
                selectbox.classList.add('d-block');
                adresse.classList.remove('d-none');
                adresse.classList.add('d-block');
            }
        });

        optionN.addEventListener('change', function() {
            if (optionN.checked) {
                selectbox.classList.remove('d-block');
                selectbox.classList.add('d-none');
                adresse.classList.remove('d-block');
                adresse.classList.add('d-none');
            } 
        });
    </script>


  </body>
</html>


