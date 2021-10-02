<?php
namespace Modules\GuestAssessment\Models;

use App\Models\BaseModel;

class InvalidateModel extends BaseModel
{
    protected $table = 'invalid_guests';

    protected $allowedFields = ['id','user_id','reason_checklist_id','date', 'status','created_date','updated_date', 'deleted_date'];

    public function getInvalidGuestWithReasonChecklist(){

        $db = \Config\Database::connect();

        $str = "SELECT a.*, u.firstname, u.middlename, u.lastname, u.email, 
        u.cellphone_no, u.landline_no, u.address, u.postal,
        p.province, gen.gender, t.guest_type, ci.city,
        rc.r_q_one, rc.r_q_two, rc.r_q_three, rc.r_q_four, rc.r_q_five, r.reason
        FROM invalid_guests a 
        LEFT JOIN users u ON u.id = a.user_id
        LEFT JOIN genders gen ON gen.id = u.gender_id 
        LEFT JOIN provinces p ON p.id = u.province_id 
        LEFT JOIN types t ON t.id = u.user_type_id 
        LEFT JOIN cities ci ON ci.id = u.city_id 
        LEFT JOIN reason_checklists rc ON rc.id = a.reason_checklist_id
        LEFT JOIN reasons r ON rc.reason_id = r.id
        WHERE a.status = 'a' ORDER BY a.created_date DESC";

        $query = $db->query($str);

        return $query->getResultArray();
    }
    
    public function getPrintInvalidatedGuest($id){

        $db = \Config\Database::connect();
  
        $str = "SELECT a.*, g.firstname, g.middlename, g.lastname, g.email, g.birthdate,
        g.cellphone_no, g.landline_no, g.address, g.postal,
        p.province, gen.gender, t.guest_type, ci.city,
        r.reason, c.r_q_one, c.r_q_two, c.r_q_three, c.r_q_four, c.r_q_five
        FROM invalid_guests a 
        LEFT JOIN users g ON g.id = a.user_id
        LEFT JOIN genders gen ON gen.id = g.gender_id 
        LEFT JOIN provinces p ON p.id = g.province_id 
        LEFT JOIN types t ON t.id = g.user_type_id 
        LEFT JOIN cities ci ON ci.id = g.city_id 
        LEFT JOIN reason_checklists c ON c.id = a.reason_checklist_id
        LEFT JOIN reasons r ON r.id = c.reason_id 
        WHERE a.status = 'a' AND a.id = '$id'
        ORDER BY a.created_date DESC";
  
        $query = $db->query($str);
  
        return $query->getResultArray();
      }
      
}
