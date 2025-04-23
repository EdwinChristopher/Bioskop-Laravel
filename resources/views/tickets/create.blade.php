@extends('base.base')

@section('content')
<div class="container my-4 mx-auto self-center">
    <form action="{{ route('ticket.insert') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="border-b border-gray-200 pb-3">
            <h2 class="text-base font-semibold text-gray-700">Input New Tickets</h2>
            
            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                <div class="sm:col-span-3">
                    <label for="customer_name" class="block text-sm font-medium leading-6 text-gray-900">Nama</label>
                    <div class="mt-2">
                        <input type="text" name="customer_name" id="customer_name" maxlength="100" value="{{ old('customer_name') }}" class="@error('customer_name') is-invalid @enderror block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" required>
                        @error('customer_name')
                            <div class="border border-red-500 text-red-500 text-xs italic ">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="sm:col-span-3">
                    <label for="seat_number" class="block text-sm font-medium leading-6 text-gray-900">Seat Number</label>
                    <div class="mt-2">
                        <input type="text" name="seat_number" id="seat_number" maxlength="6" value="A1" class="@error('seat_number') is-invalid @enderror block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" required>
                        @error('seat_number')
                            <div class="border border-red-500 text-red-500 text-xs italic ">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="sm:col-span-3">
                    <label for="movie_id" class="block text-sm font-medium leading-6 text-gray-900">Movie</label>
                    <div class="mt-2">
                        <select id="movie_id" name="movie_id" class="@error('movie_id') is-invalid @enderror block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                            <option value="" selected disabled>Select a Movie</option>
                            @foreach ($movies as $movie)
                                <option value="{{ $movie->id }}">{{ $movie->movie_title }}</option>
                            @endforeach
                        </select>
                        @error('movie_id')
                            <div class="border border-red-500 text-red-500 text-xs italic mt-1">{{ $message }}</div>
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
