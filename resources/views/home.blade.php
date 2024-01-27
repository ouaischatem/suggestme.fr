@extends('layouts.app')

@section('content')
    <section class="pt-16">
        @if($suggestions->isEmpty())
            <div class="pt-16 text-center">
                <h1 class="mb-4 text-xl font-extrabold leading-none tracking-tight md:text-2xl lg:text-3xl text-white">
                    Aucune suggestion <span class="underline underline-offset-3 decoration-8  decoration-red-400">publiée</span>
                    :(</h1>
                <a
                    class="bg-yellow-300 w-full text-gray-700 hover:bg-yellow-400 font-medium focus:ring-4 focus:outline-none focus:ring-primary-300 rounded-lg text-sm px-5 py-2.5 text-center"
                    href="{{route("suggestions.create")}}">
                    Faire une suggestion
                </a>
            </div>
        @else
            <div
                class="w-fit mx-auto grid grid-cols-1 lg:grid-cols-3 md:grid-cols-2 justify-items-center justify-center gap-y-10 gap-x-14 mb-5">
                @foreach($suggestions as $index => $suggestion)
                    <div class="relative flex flex-col mt-6 text-gray-700 bg-gradient-to-r from-yellow-200 to-yellow-500 shadow-md bg-clip-border rounded-xl w-96">
                        @if($index === 0 && $suggestions->currentPage() == 1)
                            <div class="absolute top-0 -left-6 bg-green-400 text-white rounded font-bold uppercase text-sm px-4 py-1 -rotate-45">
                                NOUVEAU
                            </div>
                        @endif
                        <div class="p-6">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                 class="w-12 h-12 mb-4 text-gray-900">
                                <path fill-rule="evenodd"
                                      d="M9.315 7.584C12.195 3.883 16.695 1.5 21.75 1.5a.75.75 0 01.75.75c0 5.056-2.383 9.555-6.084 12.436A6.75 6.75 0 019.75 22.5a.75.75 0 01-.75-.75v-4.131A15.838 15.838 0 016.382 15H2.25a.75.75 0 01-.75-.75 6.75 6.75 0 017.815-6.666zM15 6.75a2.25 2.25 0 100 4.5 2.25 2.25 0 000-4.5z"
                                      clip-rule="evenodd"></path>
                                <path
                                    d="M5.26 17.242a.75.75 0 10-.897-1.203 5.243 5.243 0 00-2.05 5.022.75.75 0 00.625.627 5.243 5.243 0 005.022-2.051.75.75 0 10-1.202-.897 3.744 3.744 0 01-3.008 1.51c0-1.23.592-2.323 1.51-3.008z">
                                </path>
                            </svg>
                            <h5 class="block mb-2 font-sans text-xl antialiased font-semibold leading-snug tracking-normal text-blue-gray-900">
                                Suggestion de {{$suggestion->user->name}}
                            </h5>
                            <p class="block font-sans text-base antialiased font-light leading-relaxed text-inherit break-words">
                                {{$suggestion->description}}
                            </p>
                        </div>
                        <div class="p-6">
                            <form action="{{ route('vote', $suggestion->id) }}" method="POST">
                                @csrf
                                <button type="submit"
                                        class="font-sans text-xm font-bold text-center text-gray-900 uppercase align-middle"
                                        name="vote_type" value="1"><span
                                        class="text-sm font-medium me-2 px-2.5 py-0.5 rounded bg-green-900 text-yellow-300">{{$suggestion->getUpVotesAttribute()}} 👍</span>
                                </button>
                                <button type="submit"
                                        class="font-sans text-xm font-bold text-center text-gray-900 uppercase align-middle"
                                        name="vote_type" value="0"><span
                                        class="text-sm font-medium me-2 px-2.5 py-0.5 rounded bg-red-900 text-red-300">{{$suggestion->getDownVotesAttribute()}} 👎</span>
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
            {{$suggestions->links()}}
        @endif
    </section>
@endsection
