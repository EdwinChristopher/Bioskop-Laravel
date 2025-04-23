@extends('base.base')

@section('content')

<body class="bg-gray-50 dark:border-gray-500 dark:bg-gray-700">
    @if(session('success'))
    <body class="h-screen flex items-center justify-center">
        <div id="success-alert" class="fixed top-1/4 left-1/2 transform -translate-x-1/2 w-1/3 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded shadow-md" role="alert">
            <div class="flex justify-between items-center">
                <span>{{ session('success') }}</span>
                <button onclick="document.getElementById('success-alert').style.display='none'" class="text-green-700 hover:text-green-900 font-bold ml-4">
                    &times;
                </button>
            </div>
        </div>
    </body>
    @endif
    <div class="container my-4 mx-auto grid grid-cols-6">
        <a href="/tickets/create/{movie:id}" class="rounded-md bg-indigo-600 gap-4 px-3 py-3 text-sm font-semibold hover:bg-indigo-700 text-white">Tambah Tiket</a>
    </div>
    <div class="container my-4 mx-auto grid grid-cols-6">
        <a href="/movies/create" class="rounded-md bg-indigo-600 gap-4 px-3 py-3 text-sm font-semibold hover:bg-indigo-700 text-white">Tambah Film</a>
    </div>

    <div class="container my-4 mx-auto grid grid-cols-1 md:grid-cols-3 gap-4">

        @foreach ($movies as $movie)
            <div class="bg-white dark:bg-slate-800 rounded-lg px-6 py-8 ring-1 ring-slate-900/5 shadow-xl">
                @if (!is_null($movie['photo']))
                <!-- Menampilkan gambar jika ada -->
                <img src="{{ asset($movie['photo']) }}" alt="Poster of {{$movie['movie_title']}}" 
                    class="w-full h-auto object-cover rounded-md" style="max-height: 300px;">
                @else
                <!-- Jika tidak ada foto, menampilkan teks atau gambar default -->
                <!-- <p class="text-slate-500 dark:text-slate-400 mt-2 text-sm">Gambar tidak tersedia</p> -->
                <!-- Atau bisa menampilkan gambar default -->
                <img src="{{ asset('uploads/meal1.png') }}" alt="Default Image" 
                    class="w-full h-auto object-cover rounded-md" style="max-height: 300px;">
                @endif
                <h3 class="text-slate-900 dark:text-white text-base font-medium tracking-tight">{{$movie['movie_title']}}</h3>
                <p class="text-slate-500 dark:text-slate-400 mt-2 text-sm">
                    {{$movie['deskripsi']}}
                </p>
                <div class="mt-10 flex items-center justify-center">
                    <form action="{{ route('movie.delete', $movie->id) }}" method="POST" onsubmit="return confirm('Yakin Mau Dihapus>');" class="my-2" >
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="rounded-md mx-3 bg-indigo-300 dark:bg-indigo-600 px-3 py-3 text-sm font-semibold hover:bg-indigo-700 text-white">
                            Hapus
                        </button>
                    </form>
                    <a href="/movies/edit/{{$movie['id']}}" class="rounded-md mx-3 bg-indigo-300 dark:bg-indigo-600 px-3 py-3 text-sm font-semibold hover:bg-indigo-700 text-white">Edit Film</a>

                    <a href="/movie/{{$movie['id']}}" class="rounded-md mx-3 bg-indigo-300 dark:bg-indigo-600 px-3 py-3 text-sm font-semibold hover:bg-indigo-700 text-white">Lihat Tiket</a>

                    
                </div>
            </div>
        @endforeach
    </div>
</body>
@endsection
<script>
    // Auto close the alert after 5 seconds (5000 milliseconds)
    setTimeout(function() {
        let alert = document.getElementById('success-alert');
        if (alert) {
            alert.style.display = 'none';
        }
    }, 5000);
</script>