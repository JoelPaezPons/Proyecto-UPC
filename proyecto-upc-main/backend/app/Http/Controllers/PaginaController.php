<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaginaController extends Controller
{
    public function home()
    {
        return view('home');
    }
    public function satelite()
    {
        return view('satelite');
    }
    public function sobreNosotros()
    {
        return view('sobreNosotros');
    }
    public function iniciarSesion()
    {
        return view('iniciarSesion');
    }

    public function eduardo()
    {
        return view('components.eduardo');
    }
    public function izan()
    {
        return view('components.izan');
    }

    public function junior()
    {
        return view("components.junior");
    }

    public function joel()
    {
        return view('components.joel');
    }
    public function elena(){
        return view('components.elena');
    }
    public function pageNotFound()
    {
        return response()->view('pageNotFound', [], 404);
    }
}
