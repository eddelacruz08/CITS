<?php
namespace Modules\Maintenances\Models;

use App\Models\BaseModel;

class DepartmentModel extends BaseModel
{
    protected $table = 'departments';

    protected $allowedFields = ['id','user_id','department','status', 'created_date','updated_date', 'deleted_date'];

}
