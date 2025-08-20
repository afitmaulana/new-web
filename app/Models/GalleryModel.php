<?php

namespace App\Models;

use CodeIgniter\Model;

class GalleryModel extends Model
{
    protected $table = 'galleries';
    protected $primaryKey = 'id';
    protected $allowedFields = ['title', 'image', 'caption', 'uploaded_at'];
}