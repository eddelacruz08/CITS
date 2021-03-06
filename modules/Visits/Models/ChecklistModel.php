<?php
namespace Modules\Visits\Models;

use App\Models\BaseModel;

class ChecklistModel extends BaseModel
{
    protected $table = 'checklists';

    protected $allowedFields = ['id','user_id', 'q_one', 'q_two', 'q_three', 'q_four', 'q_five', 'reason_id','status_defined', 'token','status', 'created_date', 'updated_date', 'deleted_date'];

    public function getLatestChecklistUser($id){

      $db = \Config\Database::connect();

      $str = "SELECT c.*
              FROM checklists c 
              WHERE c.status = 'a' AND c.created_date = CURDATE() AND c.user_id = '$id'";

      $query = $db->query($str);

      return $query->getResultArray();
    }

    public function verifyTokenChecklist($token){
      $builder = $this->db->table('checklists');
      $builder->select("id, user_id, token, created_date, updated_date");
      $builder->where("token", $token);
      $result = $builder->get();
      if (count($result->getResultArray())==1) {
        return $result->getRowArray();
      }else{
        return false;
      }
    }

    public function getChecklistWithCondition($conditions = [])
    {
      foreach($conditions as $field => $value)
      {
        $this->where($field, $value);
      }
        return $this->findAll();
    }

    public function getChecklistData($id){

      $db = \Config\Database::connect();

      $str = "SELECT c.*, v.user_id FROM checklists c LEFT JOIN visits v ON c.visit_id = v.id WHERE c.status = 'a' AND v.patient_id = '$id' ORDER BY c.created_date desc";

      $query = $db->query($str);

      return $query->getResultArray();
    }

    public function getDepartmentActivePrint($date){

      $db = \Config\Database::connect();
      // $str = 'SELECT c.*, g.* FROM checklists c LEFT JOIN guests g ON c.patient_id = g.id  WHERE c.status = "a" ORDER BY c.created_at desc';
      $str = 'SELECT g.*, c.* FROM guests g LEFT JOIN checklists c ON g.id = c.patient_id  WHERE c.status = "a" ORDER BY c.created_date = '.$date.' desc';

      $query = $db->query($str);

      return $query->getResultArray();
    }
    public function getDepartmentActive(){

      $db = \Config\Database::connect();
      // $str = 'SELECT c.*, g.* FROM checklists c LEFT JOIN guests g ON c.patient_id = g.id  WHERE c.status = "a" ORDER BY c.created_at desc';
      $str = 'SELECT g.*, c.* FROM guests g LEFT JOIN checklists c ON g.id = c.patient_id  WHERE c.status = "a" ORDER BY c.created_date desc';

      $query = $db->query($str);

      return $query->getResultArray();
    }

    public function getAssessCount($id){

      $db = \Config\Database::connect();

      $str = "SELECT COUNT(c.id) AS count_assess FROM checklists c WHERE c.status = 'a' AND c.status_defined = 'a' AND c.user_id = $id ";

      $query = $db->query($str);

      return $query->getResultArray();
    }
    public function getVisitsCount($id){

      $db = \Config\Database::connect();

      $str = "SELECT COUNT(v.user_id) AS count_visit FROM visits v WHERE v.status = 'a' AND v.user_id = $id";

      $query = $db->query($str);

  	  return $query->getResultArray();
    }

    public function getChecklistCount($id){

      $db = \Config\Database::connect();

      $str = "SELECT COUNT(c.user_id) AS count_checklist FROM checklists c WHERE c.status = 'a' AND c.user_id = $id ";
      $query = $db->query($str);

  	  return $query->getResultArray();
    }

    public function getDefinedPatientChecklist($id){

      $db = \Config\Database::connect();

      $str = 'SELECT a.*, e.* FROM checklists a LEFT JOIN guests e ON a.user_id = e.user_id  WHERE a.status = "a" AND c.patient_id = '.$id.' AND status_defined = "d" ORDER BY c.created_date desc';

      $query = $db->query($str);

  	  return $query->getResultArray();
    }

    public function getLatestChecklist($id){

      $db = \Config\Database::connect();

      $str = "SELECT c.*, u.firstname, u.middlename, u.lastname FROM checklists c LEFT JOIN users u ON c.user_id = u.id
      WHERE c.status = 'a' AND c.user_id = $id ORDER BY c.created_date desc LIMIT 1";

      $query = $db->query($str);

  	  return $query->getResultArray();
    }

    public function getLatestChecklistDate($id){

      $db = \Config\Database::connect();

      $str = "SELECT c.*, u.firstname, u.middlename, u.lastname FROM checklists c 
              LEFT JOIN users u ON c.user_id = u.id
              WHERE c.status = 'a' AND c.user_id = $id ORDER BY c.created_date desc LIMIT 1";

      $query = $db->query($str);

  	  return $query->getResultArray();
    }

    public function getUpdatedChecklistDate($id){

      $db = \Config\Database::connect();

      $str = "SELECT c.*, u.firstname, u.middlename, u.lastname FROM checklists c 
              LEFT JOIN users u ON c.user_id = u.id
              WHERE c.status = 'a' AND c.user_id = $id AND c.date = CURDATE() ORDER BY c.created_date desc LIMIT 1";

      $query = $db->query($str);

  	  return $query->getResultArray();
    }
    
    public function getLatestChecklistDateForRequestForm($id){

      $db = \Config\Database::connect();

      $str = "SELECT c.*, u.firstname, u.middlename, u.lastname FROM checklists c 
              LEFT JOIN users u ON c.user_id = u.id
              WHERE c.status = 'a' AND c.date = CURDATE() AND c.user_id = '$id' ORDER BY c.created_date desc LIMIT 1";

      $query = $db->query($str);

  	  return $query->getResultArray();
    }

    public function getLatestChecklistDateOnScan($id){

      $db = \Config\Database::connect();

      $str = "SELECT c.* FROM checklists c 
              WHERE c.status = 'a' AND c.user_id = $id
              ORDER BY c.created_date desc LIMIT 1";

      $query = $db->query($str);

  	  return $query->getResultArray();
    }

    public function getLatestCheckStatusDefinedOnScan($cId){

      $db = \Config\Database::connect();

      $str = "SELECT c.* FROM checklists c 
              WHERE c.status = 'a' AND c.id = $cId
              ORDER BY c.created_date desc LIMIT 1";

      $query = $db->query($str);

  	  return $query->getResultArray();
    }
    public function getLatestChecklistId($id){

      $db = \Config\Database::connect();

      $str = "SELECT c.* FROM checklists c WHERE c.status = 'a' AND c.user_id = $id ORDER BY c.created_date desc LIMIT 1";

      $query = $db->query($str);

  	  return $query->getResultArray();
    }
    
    public function getLatestChecklistAssessment($cId){

      $db = \Config\Database::connect();

      $str = "SELECT c.* FROM checklists c WHERE c.status = 'a' AND c.token = $cId";

      $query = $db->query($str);

  	  return $query->getResultArray();
    }

    public function getDate($id){

      $db = \Config\Database::connect();

      $str = "SELECT c.*, u.firstname, u.middlename, u.lastname FROM checklists c LEFT JOIN users u ON c.user_id = u.id
            WHERE c.status = 'a' AND c.user_id = $id ORDER BY c.created_date desc LIMIT 1";

      $query = $db->query($str);

  	  return $query->getResultArray();
    }

    public function getChecklist($id){

      $db = \Config\Database::connect();

      $str = 'SELECT a.*, e.* FROM checklists a LEFT JOIN guests e ON a.user_id = e.user_id WHERE a.status = "a" AND e.id = '.$id.' ORDER BY a.created_date desc';

      $query = $db->query($str);

  	  return $query->getResultArray();
    }


    public function getHealthTrendSummary($id){

      $db = \Config\Database::connect();

      $str = "SELECT c.* FROM  checklists c WHERE c.status = 'a' AND c.user_id = $id ORDER BY c.created_date desc";

      $query = $db->query($str);
      // echo "<pre>";
  		// print_r($query->getResultArray()); die();
  	  return $query->getResultArray();
    }

    public function getHealthProfile($id){

      $db = \Config\Database::connect();

      $str = "SELECT c.*, v.created_date FROM checklists c LEFT JOIN visits v ON c.visit_id = v.id WHERE c.status = 'a' AND v.status = 'a' AND v.user_id = $id ORDER BY c.created_date desc";

      $query = $db->query($str);
      // echo "<pre>";
  		// print_r($query->getResultArray()); die();
  	  return $query->getResultArray();
    }

    public function getGuestSummary($cId){

      $db = \Config\Database::connect();

      $str = "SELECT  c.* FROM checklists c WHERE c.status = 'a' AND c.id = $cId ";

      $query = $db->query($str);

  	  return $query->getResultArray();
    }

    public function isChecklistCaptured($id){
      $db = \Config\Database::connect();

      $str = 'SELECT * FROM checklists a WHERE a.id = '.$id;

      $query = $db->query($str);

      return count($query->getResultArray());
    }

}
