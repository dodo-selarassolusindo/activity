<?php
namespace App\Models\Admin;

class T02UserModel extends \App\Models\GoBaseModel
{
    protected $table = "t02_user";

    /**
     * Whether primary key uses auto increment.
     *
     * @var bool
     */
    protected $useAutoIncrement = true;

    protected $allowedFields = ["nama"];
    protected $returnType = "App\Entities\Admin\T02User";

    public static $labelField = "nama";

    protected $validationRules = [
        "nama" => [
            "label" => "T02Users.nama",
            "rules" => "trim|required|max_length[16313]",
        ],
    ];

    protected $validationMessages = [
        "nama" => [
            "max_length" => "T02Users.validation.nama.max_length",
            "required" => "T02Users.validation.nama.required",
        ],
    ];
}
