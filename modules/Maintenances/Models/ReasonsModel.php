<?php
namespace Modules\Maintenances\Models;

use App\Models\BaseModel;

class ReasonsModel extends BaseModel
{
    protected $table = 'reasons';

    protected $allowedFields = ['id','user_id','reason','status', 'created_date','updated_date', 'deleted_date'];

}
