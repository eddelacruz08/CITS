<?php
namespace Modules\Maintenances\Models;

use App\Models\BaseModel;

class ProvinceModel extends BaseModel
{
    protected $table = 'provinces';

    protected $allowedFields = ['id','user_id','province','status', 'created_date','updated_date', 'deleted_date'];

    public function getProvinceWithCondition($conditions = [])
    {
    foreach($conditions as $field => $value)
    {
      $this->where($field, $value);
    }
      return $this->findAll();
    }
}
