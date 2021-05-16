<?php
namespace Modules\Dashboard\Models;

use App\Models\BaseModel;

class DashboardModel extends BaseModel
{
    protected $table = 'dashboard';
    protected $allowedFields = ['user_id','patient_id','status', 'created_at','updated_at', 'deleted_at'];


}
