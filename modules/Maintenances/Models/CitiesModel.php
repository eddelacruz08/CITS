<?php
namespace Modules\Maintenances\Models;

use App\Models\BaseModel;

class CitiesModel extends BaseModel
{
    protected $table = 'cities';

    protected $allowedFields = ['id','user_id','city','status', 'created_date','updated_date', 'deleted_date'];

    public function getCityWithCondition($conditions = [])
    {
    foreach($conditions as $field => $value)
    {
      $this->where($field, $value);
    }
      return $this->findAll();
    }
}
