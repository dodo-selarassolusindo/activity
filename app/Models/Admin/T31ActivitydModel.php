<?php
namespace App\Models\Admin;

class T31ActivitydModel extends \App\Models\GoBaseModel
{
    protected $table = "t31_activityd";

    /**
     * Whether primary key uses auto increment.
     *
     * @var bool
     */
    protected $useAutoIncrement = true;

    protected $allowedFields = ["activity", "mulai", "selesai", "status"];
    protected $returnType = "App\Entities\Admin\T31Activityd";

    public static $labelField = "status";

    protected $validationRules = [
        "mulai" => [
            "label" => "T31Activityds.mulai",
            "rules" => "valid_date|permit_empty",
        ],
        "selesai" => [
            "label" => "T31Activityds.selesai",
            "rules" => "valid_date|permit_empty",
        ],
    ];

    protected $validationMessages = [
        "mulai" => [
            "valid_date" => "T31Activityds.validation.mulai.valid_date",
        ],
        "selesai" => [
            "valid_date" => "T31Activityds.validation.selesai.valid_date",
        ],
    ];
    public function findAllWithAllRelations(
        string $selcols = "activity, t1.mulai, t1.selesai, t1.status",
        int $limit = null,
        int $offset = 0
    ) {
        $sql =
            "SELECT t1." .
            $selcols .
            ",  t2.deskripsi AS activity,  t3.nama AS status FROM " .
            $this->table .
            " t1  LEFT JOIN t30_activity t2 ON t1.activity = t2.id LEFT JOIN t03_status t3 ON t1.status = t3.id";
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
