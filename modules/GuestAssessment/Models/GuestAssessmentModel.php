<?php
namespace Modules\GuestAssessment\Models;

use App\Models\BaseModel;

class GuestAssessmentModel extends BaseModel
{
    protected $table = 'assess';

    protected $allowedFields = ['user_id','email_status','checklist_token','reason_checklist_token', 'func_action', 'status','date', 'created_date','updated_date', 'deleted_date'];

    public function getGuestAssessWithCondition($conditions = [])
    {
      foreach($conditions as $field => $value)
      {
        $this->where($field, $value);
      }
        return $this->findAll();
    }

    public function getLatestGuestAssessment($id){

      $db = \Config\Database::connect();

      $str = "SELECT a.* FROM assess a 
              WHERE a.status = 'a' AND a.func_action = '0' AND a.date = CURDATE() AND a.user_id = '$id' ORDER BY a.created_date desc LIMIT 1";

      $query = $db->query($str);

      return $query->getResultArray();
    }

    public function getAssessmentGuest(){

      $db = \Config\Database::connect();

      $str = "SELECT a.*, g.firstname, g.middlename, g.lastname, g.email, 
      g.cellphone_no, g.landline_no, g.address, g.postal,
      p.province, gen.gender, t.guest_type, ci.city,
      c.q_one, c.q_two, c.q_three, c.q_four, c.q_five,
      rc.r_q_one, rc.r_q_two, rc.r_q_three, rc.r_q_four, rc.r_q_five, rc.r_status_defined, r.reason
      FROM assess a 
      LEFT JOIN users g ON g.id = a.user_id
      LEFT JOIN genders gen ON gen.id = g.gender_id 
      LEFT JOIN provinces p ON p.id = g.province_id 
      LEFT JOIN types t ON t.id = g.user_type_id 
      LEFT JOIN cities ci ON ci.id = g.city_id 
      LEFT JOIN reason_checklists rc ON rc.r_token = a.reason_checklist_token 
      LEFT JOIN reasons r ON r.id = rc.reason_id
      LEFT JOIN checklists c ON c.token = a.checklist_token 
      WHERE a.status = 'a' AND a.func_action = 1 OR a.func_action = 2
      ORDER BY a.created_date DESC";

      $query = $db->query($str);

      return $query->getResultArray();
    }

    public function getAssessmentGuestAll(){

      $db = \Config\Database::connect();

      $str = "SELECT a.*, g.firstname, g.middlename, g.lastname, g.email, 
      g.cellphone_no, g.landline_no, g.address, g.postal,
      p.province, gen.gender, t.guest_type, ci.city,
      c.q_one, c.q_two, c.q_three, c.q_four, c.q_five,
      rc.r_q_one, rc.r_q_two, rc.r_q_three, rc.r_q_four, rc.r_q_five, rc.r_status_defined, r.reason
      FROM assess a 
      LEFT JOIN users g ON g.id = a.user_id
      LEFT JOIN genders gen ON gen.id = g.gender_id 
      LEFT JOIN provinces p ON p.id = g.province_id 
      LEFT JOIN types t ON t.id = g.user_type_id 
      LEFT JOIN cities ci ON ci.id = g.city_id 
      LEFT JOIN reason_checklists rc ON rc.r_token = a.reason_checklist_token 
      LEFT JOIN reasons r ON r.id = rc.reason_id
      LEFT JOIN checklists c ON c.token = a.checklist_token 
      WHERE a.status = 'a' AND a.func_action = 0
      ORDER BY a.created_date DESC";

      $query = $db->query($str);

      return $query->getResultArray();
    }

    public function getPrintAssessmentGuest($id){

      $db = \Config\Database::connect();

      $str = "SELECT a.*, g.firstname, g.middlename, g.lastname, g.email, g.birthdate,
      g.cellphone_no, g.landline_no, g.address, g.postal,
      p.province, gen.gender, t.guest_type, ci.city,
      c.q_one, c.q_two, c.q_three, c.q_four, c.q_five
      FROM assess a 
      LEFT JOIN users g ON g.id = a.user_id
      LEFT JOIN genders gen ON gen.id = g.gender_id 
      LEFT JOIN provinces p ON p.id = g.province_id 
      LEFT JOIN types t ON t.id = g.user_type_id 
      LEFT JOIN cities ci ON ci.id = g.city_id 
      LEFT JOIN checklists c ON c.token = a.checklist_token 
      WHERE a.status = 'a' AND a.id = $id
      ORDER BY a.created_date DESC";

      $query = $db->query($str);

      return $query->getResultArray();
    }
    
    public function getGenerateAssessReportByDateSelect(){

      $db = \Config\Database::connect();

      $str = "SELECT a.*, a.date FROM assess a WHERE a.status = 'a' GROUP BY a.date DESC";

      $query = $db->query($str);

      return $query->getResultArray();
    }

    public function getGenerateInvalidatedReportByDateSelect(){

      $db = \Config\Database::connect();

      $str = "SELECT a.*, a.date FROM invalid_guests a GROUP BY a.date DESC";

      $query = $db->query($str);

      return $query->getResultArray();
    }

    public function getGenerateAssessReportByDaterange($startDate, $endDate){

      $db = \Config\Database::connect();

      $str = "SELECT a.*, g.firstname, g.middlename, g.lastname,
      g.cellphone_no, gen.gender, t.guest_type, c.q_one, c.q_two, c.q_three, c.q_four, c.q_five, c.status_defined
      FROM assess a 
      LEFT JOIN users g ON g.id = a.user_id
      LEFT JOIN genders gen ON gen.id = g.gender_id 
      LEFT JOIN types t ON t.id = g.user_type_id 
      LEFT JOIN checklists c ON c.token = a.checklist_token 
      WHERE a.date BETWEEN '$startDate' AND '$endDate' AND a.status = 'a'
      ORDER BY a.created_date DESC";

      $query = $db->query($str);

      return $query->getResultArray();
    }

    public function getGenerateAssessReportByDate($date){

      $db = \Config\Database::connect();

      $str = "SELECT a.*, g.firstname, g.middlename, g.lastname,
      g.cellphone_no, gen.gender, t.guest_type, c.q_one, c.q_two, c.q_three, c.q_four, c.q_five, c.status_defined
      FROM assess a 
      LEFT JOIN users g ON g.id = a.user_id
      LEFT JOIN genders gen ON gen.id = g.gender_id 
      LEFT JOIN types t ON t.id = g.user_type_id 
      LEFT JOIN checklists c ON c.token = a.checklist_token 
      WHERE a.status = 'a' AND a.date = '$date'
      ORDER BY a.created_date DESC";

      $query = $db->query($str);

      return $query->getResultArray();
    }

    public function getGenerateInvalidatedReportByDaterange($startDate, $endDate){

      $db = \Config\Database::connect();

      $str = "SELECT a.*, g.firstname, g.middlename, g.lastname,
      g.cellphone_no, gen.gender, t.guest_type, 
      c.r_q_one, c.r_q_two, c.r_q_three, c.r_q_four, c.r_q_five, c.r_status_defined,
      r.reason
      FROM invalid_guests a 
      LEFT JOIN users g ON g.id = a.user_id
      LEFT JOIN genders gen ON gen.id = g.gender_id 
      LEFT JOIN types t ON t.id = g.user_type_id 
      LEFT JOIN reason_checklists c ON c.id = a.reason_checklist_id 
      LEFT JOIN reasons r ON r.id = c.reason_id 
      WHERE a.date BETWEEN '$startDate' AND '$endDate' AND a.status = 'a'
      ORDER BY a.created_date DESC";

      $query = $db->query($str);

      return $query->getResultArray();
    }

    public function getGenerateInvalidatedReportByDate($date){

      $db = \Config\Database::connect();

      $str = "SELECT a.*, g.firstname, g.middlename, g.lastname,
      g.cellphone_no, gen.gender, t.guest_type, 
      c.r_q_one, c.r_q_two, c.r_q_three, c.r_q_four, c.r_q_five, c.r_status_defined,
      r.reason
      FROM invalid_guests a 
      LEFT JOIN users g ON g.id = a.user_id
      LEFT JOIN genders gen ON gen.id = g.gender_id 
      LEFT JOIN types t ON t.id = g.user_type_id 
      LEFT JOIN reason_checklists c ON c.id = a.reason_checklist_id 
      LEFT JOIN reasons r ON r.id = c.reason_id 
      WHERE a.status = 'a' AND a.date = '$date'
      ORDER BY a.created_date DESC";

      $query = $db->query($str);

      return $query->getResultArray();
    }

    public function getGenerateInvalidatedReportByDateHistory(){

      $db = \Config\Database::connect();

      $str = "SELECT a.*, g.firstname, g.middlename, g.lastname,
      g.cellphone_no, gen.gender, t.guest_type, 
      c.q_one, c.q_two, c.q_three, c.q_four, c.q_five, c.status_defined,
      r.reason
      FROM invalid_guests a 
      LEFT JOIN users g ON g.id = a.user_id
      LEFT JOIN genders gen ON gen.id = g.gender_id 
      LEFT JOIN types t ON t.id = g.user_type_id 
      LEFT JOIN reason_checklists c ON c.id = a.reason_checklist_id 
      LEFT JOIN reasons r ON r.id = c.reason_id 
      WHERE a.status = 'a'
      ORDER BY a.created_date DESC";

      $query = $db->query($str);

      return $query->getResultArray();
    }

    public function getGenerateAssessReportByDateHistory(){

      $db = \Config\Database::connect();

      $str = "SELECT a.*, g.firstname, g.middlename, g.lastname,
      g.cellphone_no, gen.gender, t.guest_type, 
      c.q_one, c.q_two, c.q_three, c.q_four, c.q_five, c.status_defined
      FROM assess a 
      LEFT JOIN users g ON g.id = a.user_id
      LEFT JOIN genders gen ON gen.id = g.gender_id 
      LEFT JOIN types t ON t.id = g.user_type_id 
      LEFT JOIN checklists c ON c.token = a.checklist_token 
      WHERE a.status = 'a'
      ORDER BY a.created_date DESC";

      $query = $db->query($str);

      return $query->getResultArray();
    }
}
