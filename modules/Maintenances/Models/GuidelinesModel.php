<?php
namespace Modules\Maintenances\Models;

use App\Models\BaseModel;

class GuidelinesModel extends BaseModel
{
    protected $table = 'guidelines';

    protected $allowedFields = ['id','user_id','content','image','status', 'created_date','updated_date', 'deleted_date'];

}
