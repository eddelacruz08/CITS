<?php
namespace Modules\Guests\Models;

use App\Models\BaseModel;

class GuestsModel extends BaseModel
{
    protected $table = 'guests';

    protected $allowedFields = ['id','user_id','user_type_id','first_name','middle_name','last_name','ext_name_id','birthdate','gender_id','cellphone_no','landline_no','email','address','city_id','province_id','postal','status','date', 'created_date','updated_date', 'deleted_date'];

    public function getProfile($id){

    $db = \Config\Database::connect();

    $str = "SELECT g.*, t.guest_type, e.extension, c.city, gen.gender, p.province FROM guests g LEFT JOIN types t ON g.user_type_id = t.id LEFT JOIN extensions e ON g.ext_name_id = e.id
            LEFT JOIN cities c ON g.city_id = c.id LEFT JOIN genders gen ON g.gender_id = gen.id LEFT JOIN provinces p ON g.province_id = p.id WHERE g.status = 'a' AND g.user_id = '$id'";

    $query = $db->query($str);

    return $query->getResultArray();
    }

    public function getGuest(){

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

    public function getGuestWithCondition($conditions = [])
    {
      foreach($conditions as $field => $value)
      {
        $this->where($field, $value);
      }
        return $this->findAll();
    }

      public function getStudent1(){

      $db = \Config\Database::connect();

      $str = "SELECT COUNT(g.id) AS S1, t.* FROM guests g LEFT JOIN types t ON g.user_type_id = t.id WHERE g.status = 'a' AND t.guest_type = 'Student'";

      $query = $db->query($str);

      return $query->getResultArray();
      }
      public function getFaculty1(){

      $db = \Config\Database::connect();

      $str = "SELECT COUNT(g.id) AS F1, t.* FROM guests g LEFT JOIN types t ON g.user_type_id = t.id WHERE g.status = 'a' AND t.guest_type = 'Faculty'";
      // $str = "SELECT COUNT(*) AS F1 FROM guests WHERE status = 'a' AND user_type = 'f'";

      $query = $db->query($str);

      return $query->getResultArray();
      }
      public function getEmployee1(){

      $db = \Config\Database::connect();

      $str = "SELECT COUNT(g.id) AS E1, t.* FROM guests g LEFT JOIN types t ON g.user_type_id = t.id WHERE g.status = 'a' AND t.guest_type = 'Employee'";
      // $str = "SELECT COUNT(*) AS E1 FROM guests WHERE status = 'a' AND user_type = 'e'";

      $query = $db->query($str);

      return $query->getResultArray();
      }
      public function getOutsider1(){

      $db = \Config\Database::connect();

      $str = "SELECT COUNT(g.id) AS O1, t.* FROM guests g LEFT JOIN types t ON g.user_type_id = t.id WHERE g.status = 'a' AND t.guest_type = 'Outsider'";
      // $str = "SELECT COUNT(*) AS O1 FROM guests WHERE status = 'a' AND user_type = 'o'";

      $query = $db->query($str);

      return $query->getResultArray();
      }
      //----------- Guests student print pdf ----------------------
      public function getGuests($date1, $date2){

      $db = \Config\Database::connect();

      $str = "SELECT * FROM guests WHERE date >= '$date1' AND date <= '$date2'";

      $query = $db->query($str);

      return $query->getResultArray();
      }
      //----------- Guests student print pdf ----------------------
      public function getGuestTotalPdf(){

      $db = \Config\Database::connect();

      $str = 'SELECT p.*, c.* FROM guests p LEFT JOIN checklists c ON p.id = c.user_id WHERE c.status = "a" AND p.status = "a" ORDER BY c.updated_date desc';

      $query = $db->query($str);

      return $query->getResultArray();
      }

    //----------- Patient done assessment LIST ----------------------
    public function getPatientAssessList(){

      $db = \Config\Database::connect();

      $str = 'SELECT p.*, c.* FROM guests p LEFT JOIN checklists c ON p.id = c.user_id WHERE c.status = "a" AND c.status_defined = "d" AND p.status = "a" ORDER BY c.updated_date desc';

      $query = $db->query($str);

      return $query->getResultArray();
    }


    public function getPatientTotal(){

      $db = \Config\Database::connect();

      $str = 'SELECT COUNT(*) FROM guests WHERE status = "a" ORDER BY created_date desc';

      $query = $db->query($str);

      return $query->getResultArray();
    }

    ////////////////////// STUDENTS MODEL ///////////////////////////////////////
    public function getStudentTotal(){

      $db = \Config\Database::connect();

      $str = "SELECT COUNT(g.id), t.* FROM guests g LEFT JOIN types t ON g.user_type_id = t.id WHERE g.status = 'a' AND t.guest_type = 'Student'";

      $query = $db->query($str);

      return $query->getResultArray();
    }

    public function getStudentMale(){

      $db = \Config\Database::connect();

      $str = "SELECT COUNT(g.id), t.*, gen.* FROM guests g LEFT JOIN types t ON g.user_type_id = t.id LEFT JOIN genders gen
              ON g.gender_id = gen.id WHERE g.status = 'a' AND t.guest_type = 'Student' AND gen.gender ='male'";
      // $str = 'SELECT COUNT(*) FROM guests  WHERE user_type = "s" AND gender = "m" AND status = "a"';

      $query = $db->query($str);

      return $query->getResultArray();
    }
    public function getStudentFemale(){

      $db = \Config\Database::connect();

      $str = "SELECT COUNT(g.id), t.*, gen.* FROM guests g LEFT JOIN types t ON g.user_type_id = t.id LEFT JOIN genders gen
              ON g.gender_id = gen.id WHERE g.status = 'a' AND t.guest_type = 'Student' AND gen.gender ='female'";
      // $str = 'SELECT COUNT(*) FROM guests  WHERE user_type = "s" AND gender = "f" AND status = "a"';

      $query = $db->query($str);

      return $query->getResultArray();
    }
    //----------- Student Define ----------------------
    public function getGuestDefined(){

      $db = \Config\Database::connect();

      $str = "SELECT COUNT(c.status_defined) AS count_guest_define, g.* FROM checklists c LEFT JOIN users g ON c.user_id = g.id
              WHERE c.status = 'a' AND c.status_defined = 'd' ORDER BY c.created_date DESC";

      $query = $db->query($str);

      return $query->getResultArray();
    }
    public function getGuestDefinedAt(){

      $db = \Config\Database::connect();

      $str = "SELECT c.*, g.* FROM checklists c LEFT JOIN users g ON c.user_id = g.id
              WHERE c.status = 'a' AND c.status_defined = 'd' ORDER BY c.created_date DESC";

      $query = $db->query($str);

      return $query->getResultArray();
    }

    ////////////////////// FACULTY MODEL ///////////////////////////////////////
    public function getFacultyTotal(){

      $db = \Config\Database::connect();

      $str = "SELECT COUNT(g.id), t.* FROM guests g LEFT JOIN types t ON g.user_type_id = t.id
      WHERE g.status = 'a' AND t.guest_type = 'Faculty'";

      $query = $db->query($str);

      return $query->getResultArray();
    }

    public function getFacultyMale(){

      $db = \Config\Database::connect();

      $str = "SELECT COUNT(g.id), t.*, gen.* FROM guests g LEFT JOIN types t ON g.user_type_id = t.id LEFT JOIN genders gen
             ON g.gender_id = gen.id WHERE g.status = 'a' AND t.guest_type = 'Faculty' AND gen.gender ='male'";
      // $str = 'SELECT COUNT(*) FROM guests  WHERE user_type = "f" AND gender = "m" AND status = "a"';

      $query = $db->query($str);

      return $query->getResultArray();
    }

    public function getFacultyFemale(){

      $db = \Config\Database::connect();

      $str = "SELECT COUNT(g.id), t.*, gen.* FROM guests g LEFT JOIN types t ON g.user_type_id = t.id LEFT JOIN genders gen
             ON g.gender_id = gen.id WHERE g.status = 'a' AND t.guest_type = 'Faculty' AND gen.gender ='female'";
      // $str = 'SELECT COUNT(*) FROM guests  WHERE user_type = "f" AND gender = "f" AND status = "a"';

      $query = $db->query($str);

      return $query->getResultArray();
    }
    //----------- faculty Define ----------------------
    public function getFacultyDefined(){

      $db = \Config\Database::connect();

      $str = 'SELECT p.*, COUNT(c.status_defined) AS count_faculty_define, t.* FROM guests p LEFT JOIN checklists c ON p.id = c.user_id LEFT JOIN types t ON p.user_type_id = t.id WHERE c.status = "a" AND c.status_defined = "d" AND t.guest_type = "Faculty"';

      $query = $db->query($str);

      return $query->getResultArray();
    }
    //----------- faculty Define LIST ----------------------
    public function getFacultyDefinedList(){

      $db = \Config\Database::connect();

      $str = 'SELECT p.*, c.* FROM guests p LEFT JOIN checklists c ON p.id = c.user_id WHERE c.status = "a" AND c.status_defined = "d" AND p.user_type = "f"';

      $query = $db->query($str);

      return $query->getResultArray();
    }

    ////////////////////// EMPLOYEE MODEL ///////////////////////////////////////
    public function getEmployeeTotal(){

      $db = \Config\Database::connect();

      $str = "SELECT COUNT(g.id), t.* FROM guests g LEFT JOIN types t ON g.user_type_id = t.id
      WHERE g.status = 'a' AND t.guest_type = 'Employee'";
      // $str = 'SELECT COUNT(*) FROM guests WHERE status = "a" AND user_type = "e" AND status = "a"';

      $query = $db->query($str);

      return $query->getResultArray();
    }

    public function getEmployeeMale(){

      $db = \Config\Database::connect();

      $str = "SELECT COUNT(g.id), t.*, gen.* FROM guests g LEFT JOIN types t ON g.user_type_id = t.id LEFT JOIN genders gen
             ON g.gender_id = gen.id WHERE g.status = 'a' AND t.guest_type = 'Employee' AND gen.gender ='male'";
      // $str = 'SELECT COUNT(*) FROM guests  WHERE user_type = "e" AND gender = "m" AND status = "a"';

      $query = $db->query($str);

      return $query->getResultArray();
    }

    public function getEmployeeFemale(){

      $db = \Config\Database::connect();

      $str = "SELECT COUNT(g.id), t.*, gen.* FROM guests g LEFT JOIN types t ON g.user_type_id = t.id LEFT JOIN genders gen
             ON g.gender_id = gen.id WHERE g.status = 'a' AND t.guest_type = 'Employee' AND gen.gender ='female'";
      // $str = 'SELECT COUNT(*) FROM guests  WHERE user_type = "e" AND gender = "f" AND status = "a"';

      $query = $db->query($str);

      return $query->getResultArray();
    }
    //----------- employee Define ----------------------
    public function getEmployeeDefined(){

      $db = \Config\Database::connect();

      $str = 'SELECT p.*, COUNT(c.status_defined) AS count_employee_define, t.* FROM guests p LEFT JOIN checklists c ON p.id = c.user_id LEFT JOIN types t ON p.user_type_id = t.id WHERE c.status = "a" AND c.status_defined = "d" AND t.guest_type = "Employee"';

      // $str = 'SELECT p.*, COUNT(c.status_defined) AS count_employee_define FROM guests p LEFT JOIN checklists c ON p.id = c.user_id WHERE c.status = "a" AND c.status_defined = "d" AND p.user_type = "e"';

      $query = $db->query($str);

      return $query->getResultArray();
    }
    //----------- Employee Define LIST ----------------------
    public function getEmployeeDefinedList(){

      $db = \Config\Database::connect();

      $str = 'SELECT p.*, c.* FROM guests p LEFT JOIN checklists c ON p.id = c.user_id WHERE c.status = "a" AND c.status_defined = "d" AND p.user_type = "e"';

      $query = $db->query($str);

      return $query->getResultArray();
    }

    ////////////////////// OUTSIDER MODEL ///////////////////////////////////////
    public function getOutsiderTotal(){

      $db = \Config\Database::connect();

      $str = "SELECT COUNT(g.id), t.* FROM guests g LEFT JOIN types t ON g.user_type_id = t.id
      WHERE g.status = 'a' AND t.guest_type = 'Outsider'";
      // $str = 'SELECT COUNT(*) FROM guests WHERE status = "a" AND user_type = "o" AND status = "a"';

      $query = $db->query($str);

      return $query->getResultArray();
    }

    public function getOutsiderMale(){

      $db = \Config\Database::connect();

      $str = "SELECT COUNT(g.id), t.*, gen.* FROM guests g LEFT JOIN types t ON g.user_type_id = t.id LEFT JOIN genders gen
             ON g.gender_id = gen.id WHERE g.status = 'a' AND t.guest_type = 'Outsider' AND gen.gender ='male'";
      // $str = 'SELECT COUNT(*) FROM guests  WHERE user_type = "o" AND gender = "m" AND status = "a"';

      $query = $db->query($str);

      return $query->getResultArray();
    }

    public function getOutsiderFemale(){

      $db = \Config\Database::connect();

      $str = "SELECT COUNT(g.id), t.*, gen.* FROM guests g LEFT JOIN types t ON g.user_type_id = t.id LEFT JOIN genders gen
             ON g.gender_id = gen.id WHERE g.status = 'a' AND t.guest_type = 'Outsider' AND gen.gender ='female'";
      // $str = 'SELECT COUNT(*) FROM guests  WHERE user_type = "o" AND gender = "f" AND status = "a"';

      $query = $db->query($str);

      return $query->getResultArray();
    }
    //----------- outsider Define ----------------------
    public function getOutsiderDefined(){

      $db = \Config\Database::connect();

      $str = 'SELECT p.*, COUNT(c.status_defined) AS count_outsider_define, t.* FROM guests p LEFT JOIN checklists c ON p.id = c.user_id LEFT JOIN types t ON p.user_type_id = t.id WHERE c.status = "a" AND c.status_defined = "d" AND t.guest_type = "Outsider"';

      // $str = 'SELECT p.*, COUNT(c.status_defined) AS count_outsider_define FROM guests p LEFT JOIN checklists c ON p.id = c.user_id WHERE c.status = "a" AND c.status_defined = "d" AND p.user_type = "o"';

      $query = $db->query($str);

      return $query->getResultArray();
    }
    //----------- Outsider Define LIST ----------------------
    public function getOutsiderDefinedList(){

      $db = \Config\Database::connect();

      $str = 'SELECT p.*, c.* FROM guests p LEFT JOIN checklists c ON p.id = c.user_id WHERE c.status = "a" AND c.status_defined = "d" AND p.user_type = "o"';

      $query = $db->query($str);

      return $query->getResultArray();
    }
}
