<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class MemberSeeder extends Seeder
{
    public function run()
    {
        for($a = 0; $a < 100; $a++){
            $data = [
                'nama'          => static::faker()->name,
                'alamat'        => static::faker()->address,
                'created_at'    => Time::now('Asia/Makassar', 'id_ID'),
                'updated_at'    => Time::now('Asia/Makassar', 'id_ID')
            ];
            $this->db->table('member')->insert($data);
        }
    }
}