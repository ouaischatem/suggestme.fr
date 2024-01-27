@extends('layouts.app')

@section('content')

    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm ">
            <h2 class="text-center text-2xl font-bold leading-9 tracking-tight text-white">Créer un nouveau compte</h2>
        </div>

        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">

            <div
                class="relative flex flex-col mt-6 text-gray-700 bg-gradient-to-r from-yellow-200 to-yellow-500 shadow-md bg-clip-border rounded-xl w-96">
                <div class="p-6">

                    <form action="{{ route('register') }}" method="POST" class="space-y-4 md:space-y-6">
                        @csrf
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-900" for="name">Nom</label>
                            <input id="name"
                                   class="form-control @error('name') is-invalid @enderror bg-yellow-100 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                   name="name"
                                   placeholder="Mike Tobias"
                                   type="text"
                                   value="{{ old('name') }}"
                                   required autocomplete="name" autofocus>

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                        <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span
                                                class="font-medium">ERREUR !</span> {{ $message }}</p>
                                    </span>
                            @enderror
                        </div>
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-900" for="email">Adresse mail</label>
                            <input id="email"
                                   class="form-control @error('email') is-invalid @enderror bg-yellow-100 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                   name="email"
                                   placeholder="admin@suggestme.fr"
                                   value="{{ old('email') }}"
                                   required autocomplete="email"
                                   type="email">

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                        <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span
                                                class="font-medium">ERREUR !</span> {{ $message }}</p>
                                    </span>
                            @enderror
                        </div>
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-900 " for="password">Mot de
                                passe</label>
                            <input id="password"
                                   class="form-control @error('password') is-invalid @enderror bg-yellow-100 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                   name="password" placeholder="•••••••••••••"
                                   required autocomplete="new-password"
                                   type="password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span
                                                class="font-medium">ERREUR !</span> {{ $message }}</p>
                                    </span>
                            @enderror
                        </div>
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-900 " for="password-confirm">Confirmation
                                du mot de
                                passe</label>
                            <input id="password-confirm"
                                   class="bg-yellow-100 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                   placeholder="•••••••••••••"
                                   name="password_confirmation"
                                   required autocomplete="new-password"
                                   type="password">
                        </div>
                        <button
                            class="bg-black w-full text-white hover:bg-gray-950 font-medium focus:ring-4 focus:outline-none focus:ring-primary-300 rounded-lg text-sm px-5 py-2.5 text-center"
                            type="submit">
                            CRÉER UN COMPTE
                        </button>
                        <p class="text-sm font-light text-gray-500">
                            Vous avez déjà un compte ? <a
                                class="text-gray-700 font-semibold hover:underline hover:cursor-pointer"
                                href="{{ route('register') }}">Se connecter</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

