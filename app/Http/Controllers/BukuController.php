<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Exports\BukuExport;

use Illuminate\Http\Request;
use Dompdf\Dompdf;
use Maatwebsite\Excel\Facades\Excel;

class BukuController extends Controller
{
    public function index()
    {
        $books = Buku::all();
        return view('buku', compact('books'));
    }

    public function create()
    {
        return view('tambah_buku');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'judul' => 'required',
            'pengarang' => 'required',
            'penerbit' => 'required',
            'tahun_terbit' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $gambar = $request->file('gambar');
        $gambarName = time() . '.' . $gambar->getClientOriginalExtension();
        $gambarPath = $gambar->storeAs('public', $gambarName);
    
        $validatedData['gambar'] = $gambarName;

        $buku = Buku::create($validatedData);
        return redirect()->route('home')->with('success', 'Buku created successfully.');
    }

    public function show($id)
    {
        $book = Buku::findOrFail($id);
        return view('buku_detail', compact('book'));
    }

    public function edit($id)
    {
        $buku = Buku::findOrFail($id);
        return view('buku_edit', compact('buku'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'judul' => 'required',
            'pengarang' => 'required',
            'penerbit' => 'required',
            'tahun_terbit' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $buku = Buku::findOrFail($id);
        $buku->judul = $validatedData['judul'];
        $buku->pengarang = $validatedData['pengarang'];
        $buku->penerbit = $validatedData['penerbit'];
        $buku->tahun_terbit = $validatedData['tahun_terbit'];
        $buku->deskripsi = $validatedData['deskripsi'];

        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $gambarName = time() . '.' . $gambar->getClientOriginalExtension();
            $gambarPath = $gambar->storeAs('public', $gambarName);
            $buku->gambar = $gambarName;
        }

        $buku->save();
        return redirect()->route('home')->with('success', 'Buku updated successfully.');
    }


    public function destroy($id)
    {
        // Cek apakah user memiliki role admin
        if (auth()->user()->role == 'admin') {
            $buku = Buku::findOrFail($id);
            $buku->delete();

            return redirect()->route('home')->with('success', 'Buku deleted successfully.');
        } else {
        // Jika user tidak memiliki role admin, kirimkan pesan error dan kembali ke halaman sebelumnya
            return redirect()->route('home')->with('error', 'Anda tidak memiliki akses ke fitur ini.');
        }
        
    }
    public function export_excel()
	{
		return Excel::download(new BukuExport, 'buku.xlsx');
	}
    public function pdf()
    {
        $data = [
            'books' => Buku::all()
        ];

        $pdf = new Dompdf();
        $pdf->loadHtml(view('export', $data));
        $pdf->setPaper('A4', 'landscape');
        $pdf->render();
        return $pdf->stream('daftar_buku.pdf');
    }
}
