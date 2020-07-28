<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Stok;

use Mike42\Escpos\PrintConnectors\FilePrintConnector;
use Mike42\Escpos\Printer;


class WelcomeController extends Controller
{
    public function index()
    {
        $connector = new FilePrintConnector("php://stdout");
        $printer = new Printer($connector);
        $printer -> text("Hello World!\n");
        $printer -> cut();
        $printer -> close();
        // $data['stoks'] = Stok::orderBy('nama_barang')->get();
        
        // return view('welcome', $data);
        return view('welcome');
    }
}
