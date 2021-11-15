<?php

namespace App\Models;

use CodeIgniter\Model;

class MemberModel extends Model
{
    protected $table = 'member';
    protected $useTimeStamps = true;

    public function search($keyword){
        return $this->table('member')->like('nama', $keyword)->orlike('alamat', $keyword);
    } 
}