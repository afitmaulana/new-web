<?php

namespace App\Models;

use CodeIgniter\Model;

class NewsModel extends Model
{
    protected $table = 'news';
    protected $primaryKey = 'id';
    protected $allowedFields = ['title', 'content', 'created_at'];
    protected $useTimestamps = true; // biar otomatis isi created_at & updated_at
}
