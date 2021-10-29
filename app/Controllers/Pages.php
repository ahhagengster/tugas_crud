<?php

namespace App\Controllers;

class Pages extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Home | Programing Skarla'
        ];
        return view('pages/home', $data);
    }

    public function about()
    {
        $data = [
            'title' => 'About | Programing Skarla'
        ];
        return view('pages/about', $data);
    }

    public function contact()
    {
        $data = [
            'title' => 'Contact Us | Programing Skarla',
            'alamat'  => [
                [
                'type'   => 'SMK Airlangga Balikpapan',
                'alamat' => 'Jl. S Parman No.14 Gn.Guntur',
                'kota'   => 'Kota Balikpapan',
                ]
            ]
        ];
        return view('pages/contact', $data);
    }
}

