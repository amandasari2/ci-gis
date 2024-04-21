<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelHome extends Model
{
    public function JumlahLokasi()
    {
        return $this->db->table('tbl_lokasi')
            ->countAll();
    }

}
