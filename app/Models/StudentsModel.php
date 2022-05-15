<?php namespace App\Models;
  
use CodeIgniter\Model;
  
class StudentsModel extends Model{
    protected $table = 'students';
    protected $primaryKey ='id';
    protected $allowedFields = ['name','address','imagen','created_at'];
}