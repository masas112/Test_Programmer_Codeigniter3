<?php


class Produk extends CI_Model
{
    public function GetData()
    {
        $data = $this->db->query("SELECT * FROM product");
        return $data->result();
    }

    public function Edit()
    {
    }

    public function Tambah()
    {
    }

    public function Delete()
    {
    }
}
