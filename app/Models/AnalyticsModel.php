<?php

namespace App\Models;

use CodeIgniter\Model;

class AnalyticsModel extends Model
{
    protected $table = 'analytics';
    protected $allowedFields = ['view_count'];
    public function getPageViewCount($page = false)
    {
        if ($page === false) {
            $views = $this->findAll();
            return $views;
        }
    }
    public function incrementPageCount($page)
    {
        $this->where('page_name', $page);
        $this->set('view_count', 'view_count+1', FALSE);
        $this->update();
    }
}
