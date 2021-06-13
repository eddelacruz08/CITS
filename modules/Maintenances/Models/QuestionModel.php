<?php
namespace Modules\Maintenances\Models;

use App\Models\BaseModel;

class QuestionModel extends BaseModel
{
    protected $table = 'questions';

    protected $allowedFields = ['id','user_id','q_one','q_two','q_three','q_four','q_five','status', 'created_date','updated_date', 'deleted_date'];

}
