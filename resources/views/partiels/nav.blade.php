<nav>

    <div>
        <img  src="{{ asset('ressources/icon.svg') }}" alt="Icon">
    </div>

    <div>
        <ul>
            <li><a href ="{{ url('/home') }}">Accueil</a></li>
            <li><a href = "{{ url('/about') }}">À-propos</a></li>
            <li><a href = "{{ url('/contact') }}">Contact</a></li>
            @auth
                <li><a href = "{{ url('/recherche') }}">Recherche</a></li>
                <li><a href = "/profil/{{ Auth::user()->id }}">Profil</a></li>
                <li>
                    <a href = "{{ url('/choose') }}">
                        @if(Auth::user()->type === 'normal')
                            Rendez-vous
                        @else
                            Gestion rendez-vous
                        @endif
                    </a>
                </li>


                
            @endauth
        </ul> 
    </div>

    <div>
        <ul>
            @auth
                <li>
                    <form action="{{ route('logout') }}" method="POST"> 
                        @csrf
                        @method('DELETE')
                        <button class ="btn1">Deconnecter</button>
                    </form>
                </li>
            @else
                <li ><a href = "{{ route('login') }}" class ="btn1">Connecter</a></li>
                <li ><a href = "{{ route('register') }}" class ="btn2">Inscrire</a></li>
            @endauth
        </ul>
    </div>

</nav>