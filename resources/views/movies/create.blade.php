@extends('base.base')

@section('content')
<div class="container my-4 mx-auto">
    <form action="{{ route('movie.insert') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="border-b border-gray-200 pb-3">
            <h2 class="text-base font-semibold text-gray-700">Input New Tickets</h2>
            
            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                <div class="sm:col-span-6">
                    <label for="photo" class="block text-sm font-medium leading-6 text-gray-900">Upload Foto</label>
                    <div class="mt-2">
                        <input type="file" name="photo" id="photo" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none">
                        @error('photo')
                            <div class="border border-red-500 text-red-500 text-xs italic mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="sm:col-span-3">
                    <label for="movie_title" class="block text-sm font-medium leading-6 text-gray-900">Judul Film</label>
                    <div class="mt-2">
                        <input type="text" name="movie_title" id="movie_title" maxlength="100" value="{{ old('movie_title') }}" class="@error('movie_title') is-invalid @enderror block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" required>
                        @error('movie_title')
                            <div class="border border-red-500 text-red-500 text-xs italic ">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="sm:col-span-3">
                    <label for="deskripsi" class="block text-sm font-medium leading-6 text-gray-900">Deskripsi Film</label>
                    <div class="mt-2">
                        <input type="text" name="deskripsi" id="deskripsi" maxlength="1000" value="{{ old('deskripsi') }}" class="@error('deskripsi') is-invalid @enderror block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" required>
                        @error('deskripsi')
                            <div class="border border-red-500 text-red-500 text-xs italic ">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="sm:col-span-3">
                    <label for="duration" class="block text-sm font-medium leading-6 text-gray-900">Durasi Film(angka)</label>
                    <div class="mt-2">
                        <input type="text" name="duration" id="duration" value="120" class="@error('duration') is-invalid @enderror block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" required>
                        @error('duration')
                            <div class="border border-red-500 text-red-500 text-xs italic ">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="mt-6 flex items-center justify-end gap-x-6">
                <button class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                    <a href="/">Cancel</a>
                </button>

                <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
            </div>
        </div>
    </form>
</div>  
@endsection
