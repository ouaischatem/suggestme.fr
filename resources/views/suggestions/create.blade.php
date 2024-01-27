@extends('layouts.app')

@section('content')
    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm ">
            <h2 class="text-center text-2xl font-bold leading-9 tracking-tight text-white">Publier une nouvelle
                suggestion</h2>
        </div>

        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
            @if ($errors->any())
                <div class="flex p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50" role="alert">
                    <svg class="flex-shrink-0 inline w-4 h-4 me-3 mt-[2px]" aria-hidden="true"
                         xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                    </svg>
                    <div>
                        <span class="font-medium">Assurez-vous que ces exigences sont remplies :</span>
                        <ul class="mt-1.5 list-disc list-inside">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif
            <div
                class="relative flex flex-col mt-6 text-gray-700 bg-gradient-to-r from-yellow-200 to-yellow-500 shadow-md bg-clip-border rounded-xl w-96">
                <div class="p-6">

                    <form action="{{ route('suggestions.store') }}" method="POST" class="space-y-4 md:space-y-6">
                        @csrf
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-700"
                                   for="description">Suggestion</label>
                            <input id="description"
                                   class="bg-yellow-100 text-gray-700 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 pb-24"
                                   name="description"
                                   placeholder="Je pense qu'il faudrait mieux d'ajouter..."
                                   type="text">
                        </div>

                        <button
                            class="bg-black w-full text-white hover:bg-gray-950 font-medium focus:ring-4 focus:outline-none focus:ring-primary-300 rounded-lg text-sm px-5 py-2.5 text-center"
                            type="submit">
                            PUBLIER
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
