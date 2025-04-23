<?php

namespace App\Http\Controllers;
use App\Models\Movie;
use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{ 
    public function create() {
        $movies=Movie::all();
        return view('tickets.create',['movies'=>$movies]);
    }
    public function insert(Request $request) {
        $request->validate([
            'customer_name'=>'required|string|max:100',
            'seat_number'=>'required|string|max:5',
            'movie_id'=>'required'
        ],[
            'customer_name.required'=>'Course Wajib diisi'
        ]);
        $ticket =new Ticket;
        $ticket->customer_name=$request->customer_name;
        $ticket->seat_number=$request->seat_number;
        $ticket->movie_id=$request->movie_id;
        $ticket->save();
        return redirect('/')->with('success','Ticket berhasil di input');
    }
    public function edit(Request $request, Ticket $ticket) {
        $ticket->is_checked_in = true;
        $ticket->check_in_time = now();
        $ticket->save();

        return redirect()->back()->with('success', 'Ticket berhasil diaktifkan!');
    }
    public function hapus(Ticket $ticket) {
        $ticket->delete();

        return redirect()->back()->with('success', 'Ticket berhasil dihapus!');
    }
}
