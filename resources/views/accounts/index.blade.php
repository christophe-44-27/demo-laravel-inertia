@extends('layouts.default')
@section('content')
    <div class="mx-auto max-w-2xl mt-5 shadow p-5 bg-white rounded-2xl">
        @if(Session::has('message'))
            <p class="text-green-500 font-bold">{{ Session::get('message') }}</p>
        @endif
        <form action="{{ route('accounts.update') }}" enctype="multipart/form-data" method="POST">
            @csrf
            @method('PUT')
            <div class="space-y-12">
                <div class="border-b border-gray-900/10 pb-12">
                    <h2 class="text-base font-semibold leading-7 text-gray-900">Section du profil</h2>
                    <p class="mt-1 text-sm leading-6 text-gray-600">
                        Cette section nous permet de modifier des éléments de notre profil
                    </p>

                    <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">

                        <div class="col-span-full">
                            <label for="photo" class="block text-sm font-medium leading-6 text-gray-900">
                                Pseudonyme
                            </label>
                            <div class="mt-2 flex items-center gap-x-3">
                                <input
                                    type="text"
                                    name="name"
                                    value="{{ (auth()->user()->name !== null) ? auth()->user()->name : '' }}"
                                    class="rounded-md bg-white px-2.5 py-1.5 text-sm font-semibold text-gray-900
                                    shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 w-full"
                                />
                            </div>
                        </div>

                        <div class="col-span-full">
                            <label for="photo" class="block text-sm font-medium leading-6 text-gray-900">Avatar</label>
                            <div class="mt-2 flex items-center gap-x-3">
                                @if(auth()->user() !== null && auth()->user()->thumbnail)
                                    <img src="{{ asset(auth()->user()->thumbnail) }}" class="w-10" alt="User Profile Avatar"/>
                                @else
                                    <svg v-else class="h-12 w-12 text-gray-300" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M18.685 19.097A9.723 9.723 0 0021.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 003.065 7.097A9.716 9.716 0 0012 21.75a9.716 9.716 0 006.685-2.653zm-12.54-1.285A7.486 7.486 0 0112 15a7.486 7.486 0 015.855 2.812A8.224 8.224 0 0112 20.25a8.224 8.224 0 01-5.855-2.438zM15.75 9a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z" clip-rule="evenodd" />
                                    </svg>
                                @endif
                                <input
                                    type="file"
                                    name="image"
                                    class="rounded-md bg-white px-2.5 py-1.5 text-sm font-semibold text-gray-900
                                    shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50"
                                />
                                <span>
                                    Modifier l'image du profil
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-6 flex items-center justify-end gap-x-6">
                <button type="button" class="text-sm font-semibold leading-6 text-gray-900">Annuler</button>
                <button
                    type="submit"
                    class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm
                    hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2
                    focus-visible:outline-indigo-600"
                >
                    Sauvegarder
                </button>
            </div>
        </form>
    </div>
@endsection
