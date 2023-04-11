<?php
namespace App\Models\Admin;

class T30ActivityModel extends \App\Models\GoBaseModel
{
    protected $table = "t30_activity";

    /**
     * Whether primary key uses auto increment.
     *
     * @var bool
     */
    protected $useAutoIncrement = true;

    protected $allowedFields = ["jenis", "deskripsi", "modul", "project", "user"];
    protected $returnType = "App\Entities\Admin\T30Activity";

    public static $labelField = "deskripsi";

    protected $validationRules = [
        "deskripsi" => [
            "label" => "T30Activities.deskripsi",
            "rules" => "trim|required|max_length[16313]",
        ],
        "modul" => [
            "label" => "T30Activities.modul",
            "rules" => "trim|required|max_length[16313]",
        ],
    ];

    protected $validationMessages = [
        "deskripsi" => [
            "max_length" => "T30Activities.validation.deskripsi.max_length",
            "required" => "T30Activities.validation.deskripsi.required",
        ],
        "modul" => [
            "max_length" => "T30Activities.validation.modul.max_length",
            "required" => "T30Activities.validation.modul.required",
        ],
    ];
    public function findAllWithAllRelations(
        string $selcols = "jenis, t1.deskripsi, t1.modul, t1.project, t1.user",
        int $limit = null,
        int $offset = 0
    ) {
        $sql =
            "SELECT t1." .
            $selcols .
            ",  t2.nama AS jenis,  t3.nama AS project,  t4.nama AS user FROM " .
            $this->table .
            " t1  LEFT JOIN t00_jenis t2 ON t1.jenis = t2.id LEFT JOIN t01_project t3 ON t1.project = t3.id LEFT JOIN t02_user t4 ON t1.user = t4.id";
        if (!is_null($limit) && intval($limit) > 0) {
            $sql .= " LIMIT " . intval($limit);
        }

        if (!is_null($offset) && intval($offset) > 0) {
            $sql .= " OFFSET " . intval($offset);
        }

        $query = $this->db->query($sql);
        $result = $query->getResultObject();
        return $result;
    }
}
