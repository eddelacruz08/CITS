<?php
namespace Modules\HealthDeclaration\Models;

use App\Models\BaseModel;

class ReasonsModel extends BaseModel
{
    protected $table = 'reason_checklists';

    protected $allowedFields = ['id','user_id', 'temperature', 'q_one', 'q_two', 'q_three', 'q_four', 'q_five', 'reason_id','status_defined', 'token','status', 'created_date', 'updated_date', 'deleted_date'];

    public function getReasonWithCondition($conditions = [])
    {
      foreach($conditions as $field => $value)
      {
        $this->where($field, $value);
      }
        return $this->findAll();
    }

}
