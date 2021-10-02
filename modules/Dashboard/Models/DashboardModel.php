<?php
namespace Modules\Dashboard\Models;

use App\Models\BaseModel;

class DashboardModel extends BaseModel
{
   
    public function getTotalAssessPerDay(){

        $db = \Config\Database::connect();
  
        $str = "SELECT a.*, COUNT(a.id) as totalAssessPerDays
                FROM assess a 
                WHERE a.date = CURDATE() AND a.status = 'a'";
  
        $query = $db->query($str);
  
        return $query->getResultArray();
      }

      public function getTotalInvalidatedPerDay(){

        $db = \Config\Database::connect();
  
        $str = "SELECT ig.*, COUNT(ig.id) as totalInvalidatedPerDays
                FROM invalid_guests ig 
                WHERE ig.date = CURDATE() AND ig.status = 'a'";
  
        $query = $db->query($str);
  
        return $query->getResultArray();
      }

      public function getTotalGuestAssessment(){

        $db = \Config\Database::connect();
  
        $str = "SELECT a.*, COUNT(a.id) as totalAssessments
                FROM assess a 
                WHERE a.status = 'a'";
  
        $query = $db->query($str);
  
        return $query->getResultArray();
      }
      
      public function getTotalGuestInvalidated(){

        $db = \Config\Database::connect();
  
        $str = "SELECT ig.*, COUNT(ig.id) as totalInvalidated
                FROM invalid_guests ig 
                WHERE ig.status = 'a'";
  
        $query = $db->query($str);
  
        return $query->getResultArray();
      }

      public function getAssessmentMonthlyCount(){
        $db = \Config\Database::connect();
        $str = "SELECT
        SUM(MONTH(created_date) = '1') AS 'Jan',
        SUM(MONTH(created_date) = '2') AS 'Feb',
        SUM(MONTH(created_date) = '3') AS 'Mar',
        SUM(MONTH(created_date) = '4') AS 'Apr',
        SUM(MONTH(created_date) = '5') AS 'May',
        SUM(MONTH(created_date) = '6') AS 'Jun',
        SUM(MONTH(created_date) = '7') AS 'Jul',
        SUM(MONTH(created_date) = '8') AS 'Aug',
        SUM(MONTH(created_date) = '9') AS 'Sep',
        SUM(MONTH(created_date) = '10') AS 'Oct',
        SUM(MONTH(created_date) = '11') AS 'Nov',
        SUM(MONTH(created_date) = '12') AS 'Dec',
        SUM(YEAR(created_date) = YEAR(CURDATE())) AS 'total',
        YEAR(CURDATE()) AS currentyear
        FROM assess WHERE YEAR(created_date) = YEAR(CURDATE()) AND status = 'a'";
        $query = $db->query($str);
        return $query->getResultArray();
      }
      
      public function getInvalidatedMonthlyCount(){
        $db = \Config\Database::connect();
        $str = "SELECT
        SUM(MONTH(created_date) = '1') AS 'Jan',
        SUM(MONTH(created_date) = '2') AS 'Feb',
        SUM(MONTH(created_date) = '3') AS 'Mar',
        SUM(MONTH(created_date) = '4') AS 'Apr',
        SUM(MONTH(created_date) = '5') AS 'May',
        SUM(MONTH(created_date) = '6') AS 'Jun',
        SUM(MONTH(created_date) = '7') AS 'Jul',
        SUM(MONTH(created_date) = '8') AS 'Aug',
        SUM(MONTH(created_date) = '9') AS 'Sep',
        SUM(MONTH(created_date) = '10') AS 'Oct',
        SUM(MONTH(created_date) = '11') AS 'Nov',
        SUM(MONTH(created_date) = '12') AS 'Dec',
        SUM(YEAR(created_date) = YEAR(CURDATE())) AS 'total',
        YEAR(CURDATE()) AS currentyear
        FROM invalid_guests WHERE YEAR(created_date) = YEAR(CURDATE()) AND status = 'a'";
        $query = $db->query($str);
        return $query->getResultArray();
      }
      
      public function getTotalAssessmentLastYear(){
        $db = \Config\Database::connect();
        $str = "SELECT
        SUM(MONTH(created_date) = '1') AS 'Jan',
        SUM(MONTH(created_date) = '2') AS 'Feb',
        SUM(MONTH(created_date) = '3') AS 'Mar',
        SUM(MONTH(created_date) = '4') AS 'Apr',
        SUM(MONTH(created_date) = '5') AS 'May',
        SUM(MONTH(created_date) = '6') AS 'Jun',
        SUM(MONTH(created_date) = '7') AS 'Jul',
        SUM(MONTH(created_date) = '8') AS 'Aug',
        SUM(MONTH(created_date) = '9') AS 'Sep',
        SUM(MONTH(created_date) = '10') AS 'Oct',
        SUM(MONTH(created_date) = '11') AS 'Nov',
        SUM(MONTH(created_date) = '12') AS 'Dec',
        SUM(YEAR(created_date) = DATE_SUB( YEAR(CURDATE()), INTERVAL 1 YEAR )) AS 'total',
        YEAR(CURDATE()) AS currentyear
        FROM assess WHERE YEAR(created_date) = DATE_SUB( YEAR(CURDATE()), INTERVAL 1 YEAR ) AND status = 'a'";
        $query = $db->query($str);
        return $query->getResultArray();
      }
      
      public function getTotalInvalidatedLastYear(){
        $db = \Config\Database::connect();
        $str = "SELECT
        SUM(MONTH(created_date) = '1') AS 'Jan',
        SUM(MONTH(created_date) = '2') AS 'Feb',
        SUM(MONTH(created_date) = '3') AS 'Mar',
        SUM(MONTH(created_date) = '4') AS 'Apr',
        SUM(MONTH(created_date) = '5') AS 'May',
        SUM(MONTH(created_date) = '6') AS 'Jun',
        SUM(MONTH(created_date) = '7') AS 'Jul',
        SUM(MONTH(created_date) = '8') AS 'Aug',
        SUM(MONTH(created_date) = '9') AS 'Sep',
        SUM(MONTH(created_date) = '10') AS 'Oct',
        SUM(MONTH(created_date) = '11') AS 'Nov',
        SUM(MONTH(created_date) = '12') AS 'Dec',
        SUM(YEAR(created_date) = DATE_SUB( YEAR(CURDATE()), INTERVAL 1 YEAR )) AS 'total',
        YEAR(CURDATE()) AS currentyear
        FROM invalid_guests WHERE YEAR(created_date) = DATE_SUB( YEAR(CURDATE()), INTERVAL 1 YEAR ) AND status = 'a'";
        $query = $db->query($str);
        return $query->getResultArray();
      }
}
