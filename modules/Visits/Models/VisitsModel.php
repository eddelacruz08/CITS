<?php
namespace Modules\Visits\Models;

use App\Models\BaseModel;

class VisitsModel extends BaseModel
{
    protected $table = 'visits';

    protected $allowedFields = ['id','user_id','status','date','log_in','log_out', 'created_date','updated_date', 'deleted_date'];

    public function getVisitWithCondition($conditions = [])
    {
      foreach($conditions as $field => $value)
      {
        $this->where($field, $value);
      }
        return $this->findAll();
    }

    public function getVisitDate($date){

      $db = \Config\Database::connect();

      $str = "SELECT v.*, g.*, e.extension, gen.gender, t.guest_type FROM visits v LEFT JOIN users g ON v.user_id = g.id LEFT JOIN extensions e ON g.ext_name_id = e.id
              LEFT JOIN genders gen ON g.gender_id = gen.id LEFT JOIN types t ON g.user_type_id = t.id WHERE v.date = '$date' AND v.status = 'a' ORDER BY v.created_date desc";

      $query = $db->query($str);

      return $query->getResultArray();
    }

    public function getVisitId($id){
      $visit_list = $this->get(['user_id' => $id, 'status' => 'a', 'updated_date' => null]);
      if(!empty($visit_list))
        return $visit_list[0]['id'];

      return 0;
    }
    public function getVisitsId($id){
      $visit_list = $this->get(['user_id' => $id, 'status' => 'a', 'updated_date' => null]);
      if(!empty($visit_list))
        return $visit_list[0]['id'];

      return 0;
    }

}
