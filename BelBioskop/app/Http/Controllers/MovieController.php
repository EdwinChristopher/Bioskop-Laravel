<?php

namespace App\Http\Controllers;
use App\Models\Movie;
use App\Models\Ticket;
use Illuminate\Http\Request;

class MovieController extends Controller
{

    public function create() {
        return view('movies.create');
    }

    public function show(Movie $movie) {
        //eager loading
        $movie->load('tickets');
        // return view('course2', ['courses'=>$courses]);
        return view('movie',
        ['movie'=>$movie,
        'ticket'=>$movie->tickets,
        ])->with('success','Tiket berhasil dipesan!');
    }
    public function insert(Request $request) {
        $validatedData=$request->validate([
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'movie_title'=>'required|string|max:100',
            'duration'=>'required|integer|max:500',
            'deskripsi'=>'required|string|max:1000',
        ],[
            'movie_title.required'=>'Course Wajib diisi'
        ]);
        $validatedData['release_date'] = now();
        if ($request->hasFile('photo')) {
            // Upload file gambar dan simpan path-nya
            $fileName = time() . '.' . $request->photo->extension(); // Buat nama file unik
            $request->photo->move(public_path('uploads'), $fileName); // Simpan di folder 'uploads'
    
            // Simpan path gambar ke database
            $validatedData['photo'] = 'uploads/' . $fileName;
        }
        Movie::create($validatedData);
        // $movie =new Ticket;
        // $movie->photo=$request->customer_name;
        // $ticket->seat_number=$request->seat_number;
        // $ticket->movie_id=$request->movie_id;
        // $ticket->save();
        return redirect('/')->with('success','Film berhasil dibuat');
    }
    public function hapus(Movie $movie) {
        $movie->delete();

        return redirect('/')->with('success', 'Film berhasil dihapus!');
    }
    public function update(Request $request, Movie $movie) {
        $validatedData=$request->validate([
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'movie_title'=>'required|string|max:100',
            'duration'=>'required|integer|max:500',
            'deskripsi'=>'required|string|max:1000',
        ],[
            'movie_title.required'=>'Course Wajib diisi'
        ]);
        $validatedData['release_date'] = now();
        if ($request->hasFile('photo')) {
            // Upload file gambar dan simpan path-nya
            $fileName = time() . '.' . $request->photo->extension(); // Buat nama file unik
            $request->photo->move(public_path('uploads'), $fileName); // Simpan di folder 'uploads'
    
            // Simpan path gambar ke database
            $validatedData['photo'] = 'uploads/' . $fileName;
        }
        $movie->update($validatedData);
        return redirect('/')->with('success', 'Film berhasil diedit!');
    }
    public function edit(Movie $movie)
    {
        // Secara otomatis Movie dengan ID sesuai dengan parameter {movie} akan di-load
        return view('movies.edit', ['movie' => $movie]);
    }
}
