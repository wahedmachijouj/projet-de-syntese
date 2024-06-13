<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gestion rendez-vous</title>
    <link rel="stylesheet" href="{{ asset('css/nav.css') }}">
    <link rel="stylesheet" href="{{ asset('css/rdv.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
    <link rel="icon" href="{{ asset('ressources/icon.svg') }}" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  </head>
  <body>



    @include('partiels.nav')


<div>

  @isset($rdvs)
        <form method='get' action="/chercherRdv">
          @csrf
          <div class="trouverFormInputGroup">
            <button type="submit">
              <img src="{{ asset('ressources/search.svg') }}" alt="search">
            </button>
            <input type="date" name="date"  id='date'/>
          </div>
        </form>


    @foreach($rdvs as $rdv)
          <div class = "rdv">
            <div class="rdv-part1">
              <div class="rdv-header">{{$rdv->date}}</div>
              <div class="rdv-body">
                <p>user_p : {{$rdv->userp->name}}</p>
                <p>user_n : {{$rdv->usern->name}}</p>
                <p>email : {{$rdv->email}}</p>
                <p>tele : {{$rdv->tele}}</p>
                <p>info : {{$rdv->info}}</p>
              </div>
            </div>
            <div class="rdv-part2">
              <a href="/supp/{{$rdv->id}}" class="btn btn-primary">supprimer</a>
              <a href="/modif/{{$rdv->id}}" class="btn btn-primary">modifier</a>
            </div>
          </div>
    @endforeach
  @endisset
</div>
@include('partiels.footer')
</body>
</html>