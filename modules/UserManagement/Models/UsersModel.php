<?php
namespace Modules\UserManagement\Models;

use CodeIgniter\Model;

class UsersModel extends \CodeIgniter\Model
{
    protected $table = 'users';

    protected $allowedFields = ['lastname','middlename', 'firstname','ext_name_id', 'username','gender_id', 'email', 'password', 'birthdate',
    'cellphone_no', 'landline_no', 'address','city_id','province_id', 'postal','user_type_id', 'role_id','date','token', 'status', 'created_date','updated_date',
    'deleted_date'];

    public function verifyToken($token){
      $builder = $this->db->table('users');
      $builder->select("id, token, firstname, lastname, username, updated_date");
      $builder->where("token", $token);
      $result = $builder->get();
      if (count($result->getResultArray())==1) {
        return $result->getRowArray();
      }else{
        return false;
      }
    }

    public function checkExpiryDate($time)
    {
      // $updated_time = strtotime($time);
      // $current_time = time();
      // // die(time());
      // $time_diff = ($current_time - $updated_time)/60;
      // if ($time_diff < 900) {
      //   return true;
      // }else{
      //   return false;
      // }
      $time_diff = (strtotime(date("Y-m-d h:i:s"))- strtotime($time))/60;
      if ($time_diff < 900) {
        return true;
      }else{
        return false;
      }
    }

    public function getProfile($id){

    $db = \Config\Database::connect();

    $str = "SELECT u.*, t.guest_type, e.extension, c.city, gen.gender, p.province FROM users u
            LEFT JOIN types t ON u.user_type_id = t.id
            LEFT JOIN extensions e ON u.ext_name_id = e.id
            LEFT JOIN cities c ON u.city_id = c.id
            LEFT JOIN genders gen ON u.gender_id = gen.id
            LEFT JOIN provinces p ON u.province_id = p.id
            WHERE u.status = 'a' AND u.role_id = 2 AND u.id = '$id'";

    $query = $db->query($str);

    return $query->getResultArray();
    }

    public function getUsersLists(){

    $db = \Config\Database::connect();

    $str = "SELECT u.*, t.guest_type, e.extension, c.city, gen.gender, p.province FROM users u
            LEFT JOIN types t ON u.user_type_id = t.id
            LEFT JOIN extensions e ON u.ext_name_id = e.id
            LEFT JOIN cities c ON u.city_id = c.id
            LEFT JOIN genders gen ON u.gender_id = gen.id
            LEFT JOIN provinces p ON u.province_id = p.id
            WHERE u.status = 'a' AND u.role_id = 2 ORDER BY u.created_date DESC";

    $query = $db->query($str);

    return $query->getResultArray();
    }

    ////////////////////// STUDENTS MODEL ///////////////////////////////////////
    public function getStudentTotal(){

      $db = \Config\Database::connect();

      $str = "SELECT COUNT(u.id), t.* FROM users u LEFT JOIN types t ON u.user_type_id = t.id
      WHERE u.status = 'a' AND u.role_id = 2 AND t.guest_type = 'Student'";

      $query = $db->query($str);

      return $query->getResultArray();
    }
    public function getStudentMale(){

      $db = \Config\Database::connect();

      $str = "SELECT COUNT(u.id), t.*, gen.* FROM users u LEFT JOIN types t ON u.user_type_id = t.id LEFT JOIN genders gen
              ON u.gender_id = gen.id WHERE u.status = 'a' AND u.role_id = 2 AND t.guest_type = 'Student' AND gen.gender ='male'";

      $query = $db->query($str);

      return $query->getResultArray();
    }
    public function getStudentFemale(){

      $db = \Config\Database::connect();

      $str = "SELECT COUNT(u.id), t.*, gen.* FROM users u LEFT JOIN types t ON u.user_type_id = t.id LEFT JOIN genders gen
              ON u.gender_id = gen.id WHERE u.status = 'a' AND u.role_id = 2 AND t.guest_type = 'Student' AND gen.gender ='female'";

      $query = $db->query($str);

      return $query->getResultArray();
    }
    ////////////////////// FACULTY MODEL ///////////////////////////////////////
    public function getFacultyTotal(){

      $db = \Config\Database::connect();

      $str = "SELECT COUNT(u.id), t.* FROM users u LEFT JOIN types t ON u.user_type_id = t.id
      WHERE u.status = 'a' AND u.role_id = 2 AND t.guest_type = 'Faculty'";

      $query = $db->query($str);

      return $query->getResultArray();
    }
        public function getFacultyMale(){

          $db = \Config\Database::connect();

          $str = "SELECT COUNT(u.id), t.*, gen.* FROM users u LEFT JOIN types t ON u.user_type_id = t.id LEFT JOIN genders gen
                 ON u.gender_id = gen.id WHERE u.status = 'a' AND u.role_id = 2 AND t.guest_type = 'Faculty' AND gen.gender ='male'";

          $query = $db->query($str);

          return $query->getResultArray();
        }

        public function getFacultyFemale(){

          $db = \Config\Database::connect();

          $str = "SELECT COUNT(u.id), t.*, gen.* FROM users u LEFT JOIN types t ON u.user_type_id = t.id LEFT JOIN genders gen
                 ON u.gender_id = gen.id WHERE u.status = 'a' AND u.role_id = 2 AND t.guest_type = 'Faculty' AND gen.gender ='female'";

          $query = $db->query($str);

          return $query->getResultArray();
        }
    ////////////////////// EMPLOYEE MODEL ///////////////////////////////////////
    public function getEmployeeTotal(){

      $db = \Config\Database::connect();

      $str = "SELECT COUNT(u.id), t.* FROM users u LEFT JOIN types t ON u.user_type_id = t.id
      WHERE u.status = 'a' AND u.role_id = 2 AND t.guest_type = 'Employee'";

      $query = $db->query($str);

      return $query->getResultArray();
    }
        public function getEmployeeMale(){

          $db = \Config\Database::connect();

          $str = "SELECT COUNT(u.id), t.*, gen.* FROM users u LEFT JOIN types t ON u.user_type_id = t.id LEFT JOIN genders gen
                 ON u.gender_id = gen.id WHERE u.status = 'a' AND u.role_id = 2 AND t.guest_type = 'Employee' AND gen.gender ='male'";

          $query = $db->query($str);

          return $query->getResultArray();
        }

        public function getEmployeeFemale(){

          $db = \Config\Database::connect();

          $str = "SELECT COUNT(u.id), t.*, gen.* FROM users u LEFT JOIN types t ON u.user_type_id = t.id LEFT JOIN genders gen
                 ON u.gender_id = gen.id WHERE u.status = 'a' AND u.role_id = 2 AND t.guest_type = 'Employee' AND gen.gender ='female'";

          $query = $db->query($str);

          return $query->getResultArray();
        }
    ////////////////////// OUTSIDER MODEL ///////////////////////////////////////
    public function getOutsiderTotal(){

      $db = \Config\Database::connect();

      $str = "SELECT COUNT(u.id), t.* FROM users u LEFT JOIN types t ON u.user_type_id = t.id
      WHERE u.status = 'a' AND u.role_id = 2 AND t.guest_type = 'Outsider'";

      $query = $db->query($str);

      return $query->getResultArray();
    }
    public function getOutsiderMale(){

      $db = \Config\Database::connect();

      $str = "SELECT COUNT(u.id), t.*, gen.* FROM users u LEFT JOIN types t ON u.user_type_id = t.id LEFT JOIN genders gen
             ON u.gender_id = gen.id WHERE u.status = 'a' AND u.role_id = 2 AND t.guest_type = 'Outsider' AND gen.gender ='male'";

      $query = $db->query($str);

      return $query->getResultArray();
    }

    public function getOutsiderFemale(){

      $db = \Config\Database::connect();

      $str = "SELECT COUNT(u.id), t.*, gen.* FROM users u LEFT JOIN types t ON u.user_type_id = t.id LEFT JOIN genders gen
             ON u.gender_id = gen.id WHERE u.status = 'a' AND u.role_id = 2 AND t.guest_type = 'Outsider' AND gen.gender ='female'";

      $query = $db->query($str);

      return $query->getResultArray();
    }
    ///////////////////// users total number //////////////////////////////
    public function getUsersTotal(){

      $db = \Config\Database::connect();

      $str = "SELECT COUNT(u.id) FROM users u WHERE u.status = 'a' AND u.role_id = 2";

      $query = $db->query($str);

      return $query->getResultArray();
    }
    /////////////////////////////////////////////////////////////////////////////
    public function getUserWithCondition($conditions = [])
	{
		foreach($conditions as $field => $value)
		{
			$this->where($field, $value);
		}
	    return $this->findAll();
	}

	public function getUsersWithRole($args = [])
	{
		$db = \Config\Database::connect();

		$str = "SELECT a.*, b.role_name FROM users a LEFT JOIN roles b ON a.role_id = b.id WHERE a.status = '".$args['status']."' LIMIT ". $args['offset'] .','.$args['limit'];

		$query = $db->query($str);
	    return $query->getResultArray();
	}

    public function getUsers()
	{
	    return $this->findAll();
	}

    public function addUsers($val_array = [])
	{
		$val_array['created_date'] = (new \DateTime())->format('Y-m-d H:i:s');
		$val_array['status'] = 'a';
		$val_array['password'] = password_hash($val_array['password'], PASSWORD_DEFAULT);

	    return $this->save($val_array);
	}

    public function editUsers($val_array = [], $id)
  	{
  		$user = $this->find($id);

  		$val_array['updated_date'] = (new \DateTime())->format('Y-m-d H:i:s');
  		$val_array['status'] = 'a';
  		//print_r($val_array); die();
  		if(empty($val_array['password']))
  		{
  			$val_array['password'] = $user['password'];
  		}
  		else
  		{
  			$val_array['password'] = password_hash($val_array['password'], PASSWORD_DEFAULT);
  		}

  		return $this->update($id, $val_array);
  	}

    public function deleteUser($id)
  	{
  		$val_array['deleted_date'] = (new \DateTime())->format('Y-m-d H:i:s');
  		$val_array['status'] = 'd';
  		return $this->update($id, $val_array);
  	}
    public function updatedDate($val_array = [], $id)
  	{
  		$val_array['updated_date'] = (new \DateTime())->format('Y-m-d H:i:s');
  		return $this->update($id, $val_array);
  	}
}
