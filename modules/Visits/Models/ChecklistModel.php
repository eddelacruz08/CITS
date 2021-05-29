<?php
namespace Modules\Visits\Models;

use App\Models\BaseModel;

class ChecklistModel extends BaseModel
{
    protected $table = 'checklists';

    protected $allowedFields = ['id','user_id', 'temperature', 'q_one', 'q_two', 'q_three', 'q_four', 'q_five', 'reason_id','status_defined','status', 'created_date', 'updated_date', 'deleted_date'];

    public function getChecklistWithCondition($conditions = [])
    {
      foreach($conditions as $field => $value)
      {
        $this->where($field, $value);
      }
        return $this->findAll();
    }

    // public function getSelfAssessmentHistory(){

    //   $db = \Config\Database::connect();

    //   $str = "SELECT  c.id,
    //                   GROUP_CONCAT(q.question ORDER BY q.id) DepartmentName
    //           FROM    checklists c
    //                   INNER JOIN questions q
    //                       ON FIND_IN_SET(q.id, c.question_id) > 0
    //           GROUP   BY c.id";

    //   $query = $db->query($str);

    //   return $query->getResultArray();
    // }

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

      $str = 'SELECT a.*, e.* FROM checklists a LEFT JOIN users e ON a.user_id = e.id WHERE a.status = "a" AND a.id = '.$id.' ORDER BY a.created_date desc LIMIT 1';

      $query = $db->query($str);

  	  return $query->getResultArray();
    }
    public function getLatestChecklistDate($id){

      $db = \Config\Database::connect();

      $str = "SELECT c.*, u.firstname, u.middlename, u.lastname FROM checklists c LEFT JOIN users u ON c.user_id = u.id
            WHERE c.status = 'a' AND c.user_id = $id ORDER BY c.created_date desc LIMIT 1";

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
