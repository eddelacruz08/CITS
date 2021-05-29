<?php
namespace Modules\GuestAssessment\Models;

use App\Models\BaseModel;

class GuestAssessmentModel extends BaseModel
{
    protected $table = 'assess';

    protected $allowedFields = ['user_id','status','date', 'created_date','updated_date', 'deleted_date'];

    public function getGuestAssessWithCondition($conditions = [])
    {
      foreach($conditions as $field => $value)
      {
        $this->where($field, $value);
      }
        return $this->findAll();
    }

    public function getGuestChecklistDate($id){

      $db = \Config\Database::connect();

      $str = "SELECT c.*, a.guest_id, g.first_name, g.middle_name, g.last_name, v.created_date FROM checklists c LEFT JOIN guests g ON c.user_id = g.user_id
              LEFT JOIN assess a ON a.guest_id = c.patient_id
              LEFT JOIN visits v ON c.visit_id = v.id WHERE c.status = 'a' AND c.user_id = $id ORDER BY c.created_date desc LIMIT 1";

      $query = $db->query($str);

      return $query->getResultArray();
    }

    public function getAssessmentGuest(){

    $db = \Config\Database::connect();

    $str = "SELECT a.*, g.firstname, g.middlename, g.lastname, gen.gender, t.guest_type 
    FROM assess a 
    LEFT JOIN users g ON g.id = a.user_id
    LEFT JOIN genders gen ON gen.id = g.gender_id 
    LEFT JOIN types t ON t.id = g.user_type_id 
    WHERE a.status = 'a'
    ORDER BY a.created_date DESC";

    $query = $db->query($str);

    return $query->getResultArray();
    }
}
