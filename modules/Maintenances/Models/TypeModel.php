<?php
namespace Modules\Maintenances\Models;

use App\Models\BaseModel;

class TypeModel extends BaseModel
{
    protected $table = 'types';

    protected $allowedFields = ['id','user_id','guest_type','status', 'created_date','updated_date', 'deleted_date'];

    public function getTypeWithCondition($conditions = [])
    {
    foreach($conditions as $field => $value)
    {
      $this->where($field, $value);
    }
      return $this->findAll();
    }
}
