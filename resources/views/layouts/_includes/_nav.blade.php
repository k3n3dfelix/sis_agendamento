<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                @guest
                    @if (Route::has('login'))
                                
                    @endif
                    @else
                    <!-- Left Side Of Navbar -->
                    
                    <ul class="navbar-nav mr-auto">

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('paineladm') }}">{{ __('Painel Administrativo') }}</a>
                        </li>

                        @can('vermenuAdmin',App\Models\Aulas::class)
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('agendageral') }}">{{ __('Agendas Geral') }}</a>
                        </li>
                        @endcan
                        
                        @can('vermenuAdmin',App\Models\Aulas::class)
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('aula') }}">{{ __('Aulas Geral') }}</a>
                        </li>
                        @endcan

                        @can('viewMenuAlun',App\Models\Agenda::class)
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('agendaaluno') }}">{{ __('Meus Agendamentos') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('aula') }}">{{ __('Aulas') }}</a>
                        </li>
                        @endcan
                       
                        @can('viewMenuPro',App\Models\Agenda::class)
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('agenda') }}">{{ __('Aulas Aprova????o') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('professor') }}">{{ __('Gerenciar Aulas') }}</a>
                        </li>
                        @endcan
                        
                        @can('vermenuAdmin',App\Models\Usuarios::class)
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('usuario') }}">{{ __('Usu??rios') }}</a>
                        </li>
                        @endcan

                        @can('vermenuAdmin',App\Models\Tipos::class)
                        <li class="nav-item">
                                        <a class="nav-link" href="{{ route('tipo') }}">{{ __('Tipos Usu??rios') }}</a>
                        </li>
                        @endcan

                    </ul>
                    @endguest
                    

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                          
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            

                            @if (Auth::check())
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->nome }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>