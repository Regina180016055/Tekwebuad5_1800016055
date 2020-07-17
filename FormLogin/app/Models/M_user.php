<?php namespace App\Models;
//use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;

class M_user extends Model{
    protected $table = 'user';
    //protected $allowedFields =['firstname','lastname','email','password','date_update'];

    public function __construct()
    {
       $this->db = db_connect(); 
       $this->builder = $this->db->table($this->table);
    }

    public function getAllData()
    {
        return $this->db->table('user')->get()->getResultArray();
    }

    public function tambah($data)
    {
        return $this->db->table('user')->insert($data);
    }

    public function hapus($nim)
    {
        return $this->db->table('user')->delete(['nim' => $nim]); 
    }

    public function ubah($data,$id)
    {
        return $this->builder->update($data,['id'=>$id]); 
    }
}
