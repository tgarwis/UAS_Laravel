<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Halaman Create Data Mahasiswa') }}
        </h2>
    </x-slot>

    <div class="py-12">

        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="container mx-auto mt-5">
                        <h2 class="text-center mb-5 text-2xl font-bold">Create New Data Mahasiswa</h2>
                        <x-auth-session-status class="mb-4" :status="session('success')" />
                            <form action="{{ route('mahasiswa-store')}}" method="POST" enctype="multipart/form-data" class="space-y-4">
                            @csrf <!-- Laravel CSRF protection -->

                            <br>

                            <div class="form-group">
                                <label for="npm" class="block text-sm font-medium text-gray-700">NPM</label>
                                <input type="text" id="npm" name="npm" placeholder="Masukkan NPM" class="block w-full p-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                            </div>

                            <div class="form-group">
                                <label for="name" class="block text-sm font-medium text-gray-700">Nama</label>
                                <input type="text" id="name" name="name" placeholder="Masukkan nama" class="block w-full p-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                            </div>

                            <div class="form-group">
                                <label for="prodi" class="block text-sm font-medium text-gray-700">Prodi</label>
                                <input type="text" id="prodi" name="prodi" placeholder="Masukkan prodi" class="block w-full p-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                            </div>

                            <br>

                            <button type="submit" class="inline-flex justify-center px-4 py-2 text-sm font-medium text-black bg-indigo-600 border border-black rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Submit</button>
                        </form>
                    </div>

                    @vite('resources/js/app.js') <!-- Include Vite's JS assets -->
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
