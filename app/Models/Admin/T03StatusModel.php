<?php
namespace App\Models\Admin;

class T03StatusModel extends \App\Models\GoBaseModel
{
    protected $table = "t03_status";

    /**
     * Whether primary key uses auto increment.
     *
     * @var bool
     */
    protected $useAutoIncrement = true;

    protected $allowedFields = ["nama"];
    protected $returnType = "App\Entities\Admin\T03Status";

    public static $labelField = "nama";

    protected $validationRules = [
        "nama" => [
            "label" => "T03Status.nama",
            "rules" => "trim|required|max_length[16313]",
        ],
    ];

    protected $validationMessages = [
        "nama" => [
            "max_length" => "T03Status.validation.nama.max_length",
            "required" => "T03Status.validation.nama.required",
        ],
    ];
}
