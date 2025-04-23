@extends('base.base')

@section('content')
<body class="bg-gray-50 dark:border-gray-500 dark:bg-gray-700">
    <div class="container my-4 mx-auto px-4">
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
        <article>
            <h1 class="text-2xl font-bold mb-4 dark:text-white">
                {{$movie->movie_title}}
            </h1>
            <a href="/"class="rounded-md mx-3 bg-indigo-300 dark:bg-indigo-600 px-3 py-3 text-sm font-semibold hover:bg-indigo-700 text-white">Back</a>
            <br>
            <br>
        </article>

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-lg">
                <thead class="bg-gray-100 text-gray-600">
                    <tr>
                        <th class="px-4 py-2 border-r text-left font-medium">No</th>
                        <th class="px-4 py-2 border-r text-left font-medium">Nama Customer</th>
                        <th class="px-4 py-2 border-r text-left font-medium">Nomer Seat</th>
                        <th class="px-4 py-2 border-r text-left font-medium">Aktif</th>
                        <th class="px-4 py-2 border-r text-left font-medium">Tanggal Aktif</th>
                        <th class="px-4 py-2 border-r text-left font-medium">Action</th>
                        <th class="px-4 py-2 border-r text-left font-medium">Hapus</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @foreach($ticket as $ticket)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="px-4 py-2 border-r">{{$no++}}</td>
                        <td class="px-4 py-2 border-r">{{$ticket->customer_name}}</td>
                        <td class="px-4 py-2 border-r">{{$ticket->seat_number}}</td>
                        <td class="px-4 py-2 border-r">
                            <span class="px-3 py-1 text-xs font-semibold rounded-full
                                {{ $ticket->is_checked_in ? 'bg-green-200 text-green-800' : 'bg-red-200 text-red-800' }}">
                                {{ $ticket->is_checked_in ? 'Aktif' : 'Tidak Aktif' }}
                            </span>
                        </td>
                        <td class="px-4 py-2 border-r">{{$ticket->check_in_time}}</td>
                        <td class="px-4 py-2 border-r">
                            @if(!$ticket->is_checked_in)
                            <form action="{{ route('ticket.edit', $ticket->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-full hover:bg-blue-600">
                                    Aktifkan
                                </button>
                            </form>
                            @else
                                <span class="text-green-600">Sudah Aktif</span>
                            @endif
                        </td>
                        <td class="px-4 py-2 border-r">
                            @if(!$ticket->is_checked_in)
                            <form action="{{ route('ticket.delete', $ticket->id) }}" method="POST" onsubmit="return confirm('Yakin Mau Dihapus>');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-full hover:bg-red-600">
                                    Hapus
                                </button>
                            </form>
                            @else
                                <span class="text-green-600">Sudah Aktif</span>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
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