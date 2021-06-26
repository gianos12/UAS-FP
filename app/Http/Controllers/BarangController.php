<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Barang;
use Codedge\Fpdf\Fpdf\Fpdf;

class BarangController extends Controller
{
public function home(){
    $hasil = Barang::all();
    return view('home', ['data' => $hasil]);
}
public function tambah(Request $req)
    {
        $image = $req->file('file');

        $imageName = time().'.'.$image->extension();
        $image->move(public_path('images'), $imageName);

        $data = new Barang();

        $data->kategori = $req->kategori;
        $data->nama = $req->nama;
        $data->jumlah = $req->jumlah;
        $data->profileimage = $imageName;
        $data->save();

        return $this->home();
    }

    public function hapus($req)
    {
        $data = Barang::find($req);
        $data->delete();

        return $this->home();
    }

    public function formUbah($req)
    {
        $hasil = Barang::find($req);
        return view('form-ubah-brg', ['data' => $hasil]);
    }
    public function ubah(Request $req)
    {
        $image = $req->file('file');
        $imageName = time().'.'. $image->extension();
        $image->move(public_path('images'), $imageName);

        $data = Barang::find($req->id);
        $data->kategori = $req->kategori;
        $data->nama = $req->nama;
        $data->jumlah = $req->jumlah;
        $data->profileimage = $imageName;
        $data->save();
        return $this->home();

    }
    public function downloadPDF(Fpdf $pdf)
    {

        $pdf->AddPage();
        $pdf->SetFont('Arial', 'B', 18);
        $pdf->MultiCell(0, 10, 'Report Data Barang', 0, 'C');
        $pdf->Ln();
        // header
        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell(20, 10, 'No', 1, 0, 'C');
        $pdf->Cell(50, 10, 'Kategori', 1, 0, 'C');
        $pdf->Cell(50, 10, 'Nama Barang', 1, 0, 'C');
        $pdf->Cell(50, 10, 'Kategori Barang', 1, 0, 'C');
        $pdf->Ln();
        // data
        $data = Barang::all();

        $i = 1;
        foreach ($data as $d) {

            $pdf->Cell(20, 10, $i++, 1, 0, 'C');
            $pdf->Cell(50, 10, $d['kategori'], 1, 0, 'C');
            $pdf->Cell(50, 10, $d['nama'], 1, 0, 'C');
            $pdf->Cell(50, 10, $d['jumlah'], 1, 0, 'C');
            $pdf->Ln();
        }
        $pdf->Output();
        exit;
    }
}
