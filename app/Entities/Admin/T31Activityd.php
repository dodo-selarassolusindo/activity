<?php
namespace App\Entities\Admin;

use CodeIgniter\Entity;

class T31Activityd extends \CodeIgniter\Entity\Entity
{
    protected $attributes = [
        "id" => null,
        "activity" => null,
        "mulai" => null,
        "selesai" => null,
        "status" => null,
    ];
    protected $casts = [
        "activity" => "int",
        "status" => "?int",
    ];
}
