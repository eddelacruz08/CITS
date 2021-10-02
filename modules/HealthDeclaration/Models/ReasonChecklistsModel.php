<?php
namespace Modules\HealthDeclaration\Models;

use App\Models\BaseModel;

class ReasonChecklistsModel extends BaseModel
{
    protected $table = 'reason_checklists';

    protected $allowedFields = ['id','user_id', 'r_q_one', 'r_q_two', 'r_q_three', 'r_q_four', 'r_q_five', 'reason_id','r_status_defined', 'r_token','status', 'created_date', 'updated_date', 'deleted_date'];

    public function getReasonWithCondition($conditions = [])
    {
      foreach($conditions as $field => $value)
      {
        $this->where($field, $value);
      }
        return $this->findAll();
    }

    public function getReasonChecklist($id){

      $db = \Config\Database::connect();

      $str = "SELECT rc.*, r.reason
      FROM reason_checklists rc
      LEFT JOIN reasons r ON rc.reason_id = r.id 
      WHERE rc.status = 'a' AND rc.user_id = $id ORDER BY rc.created_date DESC";

      $query = $db->query($str);

      return $query->getResultArray();
    }

    public function getLatestReasonChecklist($id){

      $db = \Config\Database::connect();

      $str = "SELECT rc.*
      FROM reason_checklists rc 
      WHERE rc.status = 'a' AND rc.user_id = $id ORDER BY rc.created_date DESC";

      $query = $db->query($str);

      return $query->getResultArray();
    }

}
