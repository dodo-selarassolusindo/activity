<?php
namespace App\Models\Admin;

class T01ProjectModel extends \App\Models\GoBaseModel
{
    protected $table = "t01_project";

    /**
     * Whether primary key uses auto increment.
     *
     * @var bool
     */
    protected $useAutoIncrement = true;

    protected $allowedFields = ["nama"];
    protected $returnType = "App\Entities\Admin\T01Project";

    public static $labelField = "nama";

    protected $validationRules = [
        "nama" => [
            "label" => "T01Projects.nama",
            "rules" => "trim|required|max_length[16313]",
        ],
    ];

    protected $validationMessages = [
        "nama" => [
            "max_length" => "T01Projects.validation.nama.max_length",
            "required" => "T01Projects.validation.nama.required",
        ],
    ];
}
