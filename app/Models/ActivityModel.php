<?php namespace App\Models;

use CodeIgniter\Model;

class ActivityModel extends Model
{
    protected $table = 'activity';
    protected $primaryKey = 'id_activity';

    protected $allowedFields = ['id_user', 'activity', 'timestamp'];

    public function getActivities()
    {
        return $this->findAll();
    }
}
