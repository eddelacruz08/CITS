<?php
namespace Modules\GuestAssessment\Models;

use App\Models\BaseModel;

class GuestCheckupModel extends BaseModel
{
    protected $table = 'checkups';

    protected $allowedFields = ['id','guest_id','user_id','no_days','date','description', 'status','created_date','updated_date', 'deleted_date'];

    public function getObservationGuest(){

    $db = \Config\Database::connect();

    $str = "SELECT a.*, g.first_name, g.middle_name, g.last_name, gen.gender, t.guest_type FROM checkups a LEFT JOIN guests g ON g.user_id = a.guest_id
    LEFT JOIN genders gen ON gen.id = g.gender_id LEFT JOIN types t ON t.id = g.user_type_id WHERE a.status = 'a' ORDER BY a.created_date DESC";

    $query = $db->query($str);

    return $query->getResultArray();
    }

}
