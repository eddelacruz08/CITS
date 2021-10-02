<?php
namespace Modules\Maintenances\Models;

use App\Models\BaseModel;

class ExtensionModel extends BaseModel
{
    protected $table = 'extensions';

    protected $allowedFields = ['id','user_id','extension','status', 'created_date','updated_date', 'deleted_date'];

    public function getExtensionWithCondition($conditions = [])
    {
    foreach($conditions as $field => $value)
    {
      $this->where($field, $value);
    }
      return $this->findAll();
    }
}
