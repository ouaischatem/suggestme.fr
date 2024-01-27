<nav id="header" class="text-white w-full z-20 top-0 bh-g">
    <div class="w-full md:max-w-4xl mx-auto flex flex-wrap items-center justify-between mt-0 py-3">
        <div class="block lg:hidden pl-8 p-2">
            <a class="text-yellow-300 font-bold text-base no-underline hover:no-underline" href="{{route("home")}}">
                SuggestMe
            </a>
        </div>
        <div class="block lg:hidden pr-4">
            <button id="nav-toggle"
                    class="flex items-center px-3 py-2 text-yellow-300 border-gray-600 focus:outline-none">
                <svg fill="text-yellow-300" viewBox="0 0 20 20" class="w-6 h-6 fill-current">
                    <title>Menu</title>
                    <path fill-rule="evenodd"
                          d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z"
                          clip-rule="evenodd"></path>
                </svg>
            </button>
        </div>
        <div class="w-full flex-grow p-4 lg:items-center lg:w-auto hidden lg:block mt-2 lg:mt-0 md:bg-transparent z-20"
             id="nav-content">
            <ul class="list-reset lg:flex justify-center flex-1 items-center">

                @php
                    $underlineClass = 'border-b-0 md:border-b-4 border-yellow-300 inline-block py-2 px-4 text-yellow-300 font-bold';
                    $normalClass = 'inline-block hover:text-yellow-300 hover:text-underline py-2 px-4';
                @endphp

                <li class="mr-3">
                    <a class="{{ request()->routeIs('home') ? $underlineClass : $normalClass }}"
                       href="{{ route('home') }}">Accueil</a>
                </li>
                <li class="mr-3">
                    <a class="{{ request()->routeIs('suggestions.create') ? $underlineClass : $normalClass }}"
                       href="{{ route('suggestions.create') }}">Faire une suggestion</a>
                </li>
                <li class="mr-3">
                    @if(Auth::user())
                        <a class="inline-block hover:text-yellow-300 hover:text-underline py-2 px-4"
                           href="{{route("logout")}}"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Se
                            déconnecter</a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    @else
                        <a class="{{ request()->routeIs('login') ? $underlineClass : $normalClass }}"
                           href="{{ route('login') }}">Se connecter</a>
                    @endif

                </li>
            </ul>
        </div>
    </div>

    <div class="pt-16 text-center">
        <h1 class="mb-4 text-4xl font-extrabold leading-none tracking-tight md:text-5xl lg:text-6xl text-white">Donnez
            une chance à vos <span class="underline underline-offset-3 decoration-8  decoration-yellow-300">idées</span>
        </h1>
        <p class="text-lg font-normal lg:text-xl text-gray-400">Chaque voix compte. Participez à façonner
            demain en partageant vos suggestions et en votant pour ce qui compte pour vous.</p>
    </div>
</nav>
<script>
    document.getElementById('nav-toggle').onclick = function () {
        document.getElementById("nav-content").classList.toggle("hidden");
    }
</script>
