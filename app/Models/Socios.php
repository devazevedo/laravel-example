<?php

namespace App\models;

use Illuminate\Support\Facades\DB;

class Socios
{
    public function getPartners() {
        return DB::select("SELECT * FROM socios");
    }

    public function insertPartners($nome, $phone) {
        DB::insert("INSERT INTO socios VALUES(0, ?, ?, NOW(), NOW())", [$nome, $phone]);
    }
}