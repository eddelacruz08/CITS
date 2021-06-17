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
        rc.q_one, rc.q_two, rc.q_three, rc.q_four, rc.q_five, r.reason
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

}
