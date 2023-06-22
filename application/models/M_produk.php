<?php


class M_produk extends CI_Model
{
    public function GetData()
    {
        $data = $this->db->query("SELECT * FROM product");
        return $data->result();
    }

    public function Edit()
    {
    }

    public function Tambah($data)
    {
        $this->db->insert('product', $data);
    }

    public function Delete($id)
    {
        $this->db->where('id_produk', $id)->delete('product');
    }
}
