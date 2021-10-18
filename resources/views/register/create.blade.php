<x-layout>
    <x-slot name="mainContent">
        <section class="px-6 py-8">
            <main class="max-w-lg mx-auto mt-10 bg-gray-100 p-6 rounded-xl border-gray-200">
                <form action="/register" method="POST" class="mt-10">
                    @csrf

                    <h1 class="text-center font-bold text-xl">
                        Register
                    </h1>

                    <div class="mb-6">
                        <label for="name" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                            Name
                        </label>
                        <input class="border border-gray-400 p-2 w-full" type="text" id="name" name="name" required>
                    </div>

                    <div class="mb-6">
                        <label for="username" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                            Username
                        </label>
                        <input class="border border-gray-400 p-2 w-full" type="text" id="username" name="username"
                               required>
                    </div>

                    <div class="mb-6">
                        <label for="email" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                            Email
                        </label>
                        <input class="border border-gray-400 p-2 w-full" type="email" id="email" name="email"
                               required>
                        @error('email')
                        <p class="text-red-500 test-xs mt-2">Mot de passe non valide</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="password" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                            Password
                        </label>
                        <input class="border border-gray-400 p-2 w-full" type="password" id="password" name="password"
                               required>
                    </div>

                    <div class="mb-6">
                        <button type="submit" class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500">
                            Submit
                        </button>
                    </div>
                </form>
            </main>
        </section>
    </x-slot>
</x-layout>