<?php
namespace Modules\Maintenances\Models;

use App\Models\BaseModel;

class GenderModel extends BaseModel
{
    protected $table = 'genders';

    protected $allowedFields = ['id','user_id','gender','status', 'created_date','updated_date', 'deleted_date'];

    public function getGenderWithCondition($conditions = [])
    {
    foreach($conditions as $field => $value)
    {
      $this->where($field, $value);
    }
      return $this->findAll();
    }
}
