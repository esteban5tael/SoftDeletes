<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class _SiteController extends Controller
{
    public function index()
    {
        // Este método maneja las solicitudes para la ruta raíz ('/')
        // Devuelve la vista 'index', que se mostrará cuando se acceda a esta ruta
        return view('index');
    }
}
