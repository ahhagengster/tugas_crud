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
        $currentPage = $this->request->getVar('page_member') ? $this->request->getVar('page_member') : 1;
        
        $cari = $this->request->getVar('keyword');
        if($cari){
            $member = $this->memberModel->search($cari);
            $isSearch =true;
        }else {
            $member = $this->memberModel;
            $isSearch =false;
        }


        $data = [
            'title'         => 'Daftar Buku',
            'member'        => $member->paginate(5, 'memberdata'),
            'pager'         => $member->pager,
            'currentPage'   => $currentPage,
            'isSearch'      => $isSearch
        ];
        return view('member/index', $data);
    }    
}