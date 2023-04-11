<?php
namespace App\Entities\Admin;

use CodeIgniter\Entity;

class T01Project extends \CodeIgniter\Entity\Entity
{
    protected $attributes = [
        "id" => null,
        "nama" => null,
    ];
    protected $casts = [];
}
