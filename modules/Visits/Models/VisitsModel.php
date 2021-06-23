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

      $str = "SELECT v.*, u.firstname, u.middlename, u.lastname, e.extension, gen.gender, t.guest_type 
              FROM visits v 
              LEFT JOIN users u ON v.user_id = u.id 
              LEFT JOIN extensions e ON u.ext_name_id = e.id
              LEFT JOIN genders gen ON u.gender_id = gen.id 
              LEFT JOIN types t ON u.user_type_id = t.id 
              WHERE v.date = $date AND v.status = 'a' 
              ORDER BY v.created_date desc";

      $query = $db->query($str);

      return $query->getResultArray();
    }

    public function getVisitActive(){

      $db = \Config\Database::connect();

      $str = "SELECT v.*, u.firstname, u.middlename, u.lastname, e.extension, gen.gender, t.guest_type 
              FROM visits v 
              LEFT JOIN users u ON v.user_id = u.id 
              LEFT JOIN extensions e ON u.ext_name_id = e.id
              LEFT JOIN genders gen ON u.gender_id = gen.id 
              LEFT JOIN types t ON u.user_type_id = t.id 
              WHERE v.date = CURDATE() AND v.status = 'a' 
              ORDER BY v.created_date desc";

      $query = $db->query($str);

      return $query->getResultArray();
    }

    public function getVisitDatePrint(){

      $db = \Config\Database::connect();

      $str = "SELECT t.*, t.date FROM visits t GROUP BY t.date DESC";

      $query = $db->query($str);

      return $query->getResultArray();
    }

    public function getVisitPrint($date){

      $db = \Config\Database::connect();

      $str = "SELECT v.*, u.firstname, u.middlename, u.lastname, u.cellphone_no, gen.gender, t.guest_type 
              FROM visits v 
              LEFT JOIN users u ON v.user_id = u.id 
              LEFT JOIN genders gen ON u.gender_id = gen.id 
              LEFT JOIN types t ON u.user_type_id = t.id 
              WHERE v.status = 'a' AND v.date = '$date'
              ORDER BY v.created_date desc";

      $query = $db->query($str);

      return $query->getResultArray();
    }

    public function getVisitHistory(){

      $db = \Config\Database::connect();

      $str = "SELECT v.*, u.firstname, u.middlename, u.lastname, u.cellphone_no, e.extension, gen.gender, t.guest_type
              FROM visits v 
              LEFT JOIN users u ON v.user_id = u.id 
              LEFT JOIN extensions e ON u.ext_name_id = e.id
              LEFT JOIN genders gen ON u.gender_id = gen.id 
              LEFT JOIN types t ON u.user_type_id = t.id 
              WHERE v.status = 'a' 
              ORDER BY v.created_date desc";

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
