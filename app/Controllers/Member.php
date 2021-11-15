<?php

namespace App\Controllers;
use App\Models\MemberModel;


class Member extends BaseController
{
    protected $memberModel;

    public function __construct()
    {
        $this->memberModel = new MemberModel();
    }


    public function index()
    {
        // $member = $this->memberModel->findAll();
        $data = [
            'title'         => 'Daftar Buku',
            'member'          => $this->memberModel->paginate(5, 'memberdata'),
            'pager'         => $this->memberModel->pager
        ];
        return view('member/index', $data);
    }    
}