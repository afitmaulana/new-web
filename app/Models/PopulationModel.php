<?php namespace App\Models;
use CodeIgniter\Model;
class PopulationModel extends Model
{
    protected $table = 'populations';
    protected $primaryKey = 'id';
    protected $allowedFields = ['dusun', 'rw', 'rt', 'jumlah_kk', 'jumlah_pria', 'jumlah_wanita', 'last_updated'];
}