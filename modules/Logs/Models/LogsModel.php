<?php
namespace Modules\Logs\Models;

use App\Models\BaseModel;

class LogsModel extends BaseModel
{
    protected $table = 'logs';

    protected $allowedFields = ['user_id','activity', 'status', 'created_date','updated_date', 'deleted_date'];
    
    public function getUserActivityLog($args = [])
    {
        $db = \Config\Database::connect();

        $str = "SELECT l.*, u.username FROM logs l LEFT JOIN users u ON u.id = l.user_id where u.status = 'a' ORDER BY l.created_date DESC LIMIT ". $args['offset'] .','.$args['limit'];
        $query = $db->query($str);
        return $query->getResultArray();
    }
}
