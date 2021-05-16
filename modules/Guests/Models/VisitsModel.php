<?php
namespace Modules\Visits\Models;

use App\Models\BaseModel;

class VisitsModel extends BaseModel
{
    protected $table = 'visits';

    protected $allowedFields = ['id','user_id','patient_id','status','date','log_in','log_out', 'created_date','updated_date', 'deleted_date'];

    public function getVisitWithCondition($conditions = [])
    {
      foreach($conditions as $field => $value)
      {
        $this->where($field, $value);
      }
        return $this->findAll();
    }

    public function getVisitId($id){
      $visit_list = $this->get(['patient_id' => $id, 'status' => 'a', 'updated_date' => null]);
      if(!empty($visit_list))
        return $visit_list[0]['id'];

      return 0;
    }
    public function getGuestVisitId($id){
      $visit_list = $this->get(['patient_id' => $id, 'status' => 'a', 'updated_date' => null]);
      if(!empty($visit_list))
        return $visit_list[0]['id'];

      return 0;
    }

}
