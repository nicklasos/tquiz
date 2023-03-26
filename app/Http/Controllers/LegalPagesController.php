<?php

declare(strict_types=1);

namespace App\Http\Controllers;

class LegalPagesController extends Controller
{
    public function tos()
    {
        return view('legal.tos');
    }

    public function privacy()
    {
        return view('legal.privacy');
    }
}
