<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class SearchController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('query');
        $books = Buku::where('judul', 'LIKE', "%$query%")
            ->orWhere('pengarang', 'LIKE', "%$query%")
            ->orWhere('penerbit', 'LIKE', "%$query%")
            ->get();
        
        if (auth()->user()->role == "admin") {
            return view('search_admin', compact('books'));
        } else {
            return view('search', compact('books'));
        }
        
    }

}
