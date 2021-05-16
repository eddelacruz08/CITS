<?php
namespace Modules\Maintenances\Models;

use App\Models\BaseModel;

class QuestionModel extends BaseModel
{
    protected $table = 'questions';

    protected $allowedFields = ['id','user_id','question','status', 'created_date','updated_date', 'deleted_date'];

}
