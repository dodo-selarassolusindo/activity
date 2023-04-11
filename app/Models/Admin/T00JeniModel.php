<?php
namespace App\Models\Admin;

class T00JeniModel extends \App\Models\GoBaseModel
{
    protected $table = "t00_jenis";

    /**
     * Whether primary key uses auto increment.
     *
     * @var bool
     */
    protected $useAutoIncrement = true;

    protected $allowedFields = ["nama"];
    protected $returnType = "App\Entities\Admin\T00Jeni";

    public static $labelField = "nama";

    protected $validationRules = [
        "nama" => [
            "label" => "T00Jenis.nama",
            "rules" => "trim|required|max_length[16313]",
        ],
    ];

    protected $validationMessages = [
        "nama" => [
            "max_length" => "T00Jenis.validation.nama.max_length",
            "required" => "T00Jenis.validation.nama.required",
        ],
    ];
}
