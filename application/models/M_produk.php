<?php


class M_produk extends CI_Model
{
    public function GetData()
    {
        $data = $this->db->query("SELECT * FROM product ORDER BY id_produk ASC");
        $this->db->query("CALL increment_store()");
        return $data->result();
    }

    public function Update($data)
    {
        $this->db->where('id_produk', $data['id_produk'])->update('product', $data);
    }

    public function Tambah($data)
    {
        $this->db->insert('product', $data);
    }

    public function Delete($id, $cek)
    {
        $this->db->where($cek, $id)->delete('product');
    }
}
