<?php
namespace App\Entities\Admin;

use CodeIgniter\Entity;

class T30Activity extends \CodeIgniter\Entity\Entity
{
    protected $attributes = [
        "id" => null,
        "jenis" => null,
        "deskripsi" => null,
        "modul" => null,
        "project" => null,
        "user" => null,
    ];
    protected $casts = [
        "jenis" => "int",
        "project" => "int",
        "user" => "int",
    ];
}
