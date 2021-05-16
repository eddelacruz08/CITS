<?php
namespace Modules\Scan\Models;

use App\Models\BaseModel;

class QrcodeAttendanceModel extends BaseModel
{
    protected $table = 'assess';
    protected $allowedFields = ['guest_id','user_id','status', 'created_date','updated_date', 'deleted_date'];
}
