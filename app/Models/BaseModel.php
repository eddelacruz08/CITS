<?php
namespace App\Models;

use CodeIgniter\Model;

class BaseModel extends Model
{
  public function get($conditions = [], $fields = [], $tables = [])
  {

    $this->select($this->table.'.*');
    foreach ($fields as $table => $array) {
      foreach ($array as $field => $name) {
        $this->select($table . '.' . $field . ' ' . $name);
      }
    }

    foreach ($tables as $a => $array) {
      foreach ($array as $fk => $id) {
        $this->join($a, $fk .'='. $id, 'left');
      }
    }

    foreach($conditions as $field => $value) {
      $this->where($field, $value);
    }

    return $this->findAll();
  }
    // assessment
  public function add_assess($val_array = [])
  {
    $val_array['created_date'] = (new \DateTime())->format('Y-m-d H:i:s');
    $val_array['status'] = 'a';
    return $this->save($val_array);
  }
  public function add_request($val_array = [])
  {
    $val_array['created_date'] = (new \DateTime())->format('Y-m-d H:i:s');
    $val_array['status'] = 'd';
    return $this->save($val_array);
  }
  
  public function edit_assess($val_array = [], $id)
  {
    $val_array['updated_date'] = (new \DateTime())->format('Y-m-d H:i:s');
    return $this->update($id, $val_array);
  }

  public function add_checkup($val_array = [])
  {
    $val_array['created_date'] = (new \DateTime())->format('Y-m-d H:i:s');
    $val_array['status'] = 'a';
    return $this->save($val_array);
  }
  public function add($val_array = [])
  {
    $val_array['created_date'] = (new \DateTime())->format('Y-m-d H:i:s');
    $val_array['status'] = 'a';
    return $this->save($val_array);
  }
  public function add_specific_guest($val_array = [])
  {
    $val_array['user_id'] = $_SESSION['uid'];
    $val_array['created_date'] = (new \DateTime())->format('Y-m-d H:i:s');
    $val_array['status'] = 'a';
    return $this->save($val_array);
  }

  // public function add_visit($val_array = [])
  // {
  //   $val_array['user_id'] = $_SESSION['uid'];
  //   $val_array['created_date'] = (new \DateTime())->format('Y-m-d H:i:s');
  //   $val_array['status'] = 'a';
  //   return $this->save($val_array);
  // }
  // public function add_bwisit($val_array = [])
  // {
  //   $val_array['created_date'] = (new \DateTime())->format('Y-m-d H:i:s');
  //   $val_array['log_in'] = (new \DateTime())->format('Y-m-d H:i:s');
  //   $val_array['status'] = 'a';
  //   return $this->save($val_array);
  // }
  // public function add_v($val_array = [])
  // {
  //   $val_array['user_id'] = $_SESSION['uid'];
  //   $val_array['created_date'] = (new \DateTime())->format('Y-m-d H:i:s');
  //   $val_array['status'] = 'a';
  //   return $this->save($val_array);
  // }

  // public function edit_assess($val_array = [], $id)
  // {
  //   $val_array['guest_status'] = 'd';
  //   $val_array['updated_date'] = (new \DateTime())->format('Y-m-d H:i:s');
  //   $val_array['status'] = 'd';
  //   return $this->update($id, $val_array);
  // }

  // public function edit_v($val_array = [], $id)
  // {
  //   $val_array['user_id'] = $_SESSION['uid'];
  //   $val_array['updated_date'] = (new \DateTime())->format('Y-m-d H:i:s');
  //   $val_array['status'] = 'a';
  //   return $this->update($id, $val_array);
  // }
  // public function edit_bwisit($val_array = [], $id)
  // {
  //   $val_array['user_id'] = $id;
  //   $val_array['updated_date'] = (new \DateTime())->format('Y-m-d H:i:s');
  //   $val_array['log_out'] = (new \DateTime())->format('Y-m-d H:i:s');
  //   $val_array['status'] = 'a';
  //   return $this->update($id, $val_array);
  // }
  // public function edit_visits($val_array = [], $id)
  // {
  //   $val_array['log_in'] = (new \DateTime())->format('Y-m-d H:i:s');
  //   $val_array['status'] = 'a';
  //   return $this->update($id, $val_array);
  // }
  // public function edit_visits_login($val_array = [], $id)
  // {
  //   $val_array['log_in'] = (new \DateTime())->format('Y-m-d H:i:s');
  //   $val_array['updated_date'] = (new \DateTime())->format('Y-m-d H:i:s');
  //   $val_array['status'] = 'a';
  //   return $this->update($id, $val_array);
  // }
  public function add_visits_login($val_array = [])
  {
    $val_array['created_date'] = (new \DateTime())->format('Y-m-d H:i:s');
    $val_array['status'] = 'a';
    return $this->save($val_array);
  }
  public function edit_visits_logout($val_array = [], $id)
  {
    $val_array['updated_date'] = (new \DateTime())->format('Y-m-d H:i:s');
    $val_array['status'] = 'a';
    return $this->update($id, $val_array);
  }

  public function edit($val_array = [], $id)
  {
    $val_array['log_in'] = (new \DateTime())->format('Y-m-d H:i:s');
    $val_array['updated_date'] = (new \DateTime())->format('Y-m-d H:i:s');
    $val_array['status'] = 'a';
    return $this->update($id, $val_array);
  }
  // public function edit_a($val_array = [], $id)
  // {
  //   $val_array['log_in'] = (new \DateTime())->format('Y-m-d H:i:s');
  //   $val_array['log_out'] = (new \DateTime())->format('Y-m-d H:i:s');
  //   $val_array['updated_date'] = (new \DateTime())->format('Y-m-d H:i:s');
  //   $val_array['status'] = 'b';
  //   return $this->update($id, $val_array);
  // }
  public function edit_checklist($val_array = [], $id)
  {
    $val_array['updated_date'] = (new \DateTime())->format('Y-m-d H:i:s');
    return $this->update($id, $val_array);
  }

  public function add_maintenance($val_array = [])
  {
    $val_array['created_date'] = (new \DateTime())->format('Y-m-d H:i:s');
    return $this->save($val_array);
  }
  public function edit_maintenance($val_array = [], $id)
  {
    $val_array['updated_date'] = (new \DateTime())->format('Y-m-d H:i:s');
    return $this->update($id, $val_array);
  }

  public function softDelete($id)
  {
    $val_array['deleted_date'] = (new \DateTime())->format('Y-m-d H:i:s');
    $val_array['status'] = 'd';

    return $this->update($id, $val_array);
  }
}
