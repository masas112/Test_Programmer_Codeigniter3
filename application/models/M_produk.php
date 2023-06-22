<?php


class M_produk extends CI_Model
{
    public function GetData()
    {
        $data = $this->db->query("SELECT * FROM product ORDER BY id_produk ASC");
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

    public function Delete($id)
    {
        $this->db->where('id_produk', $id)->delete('product');
        $this->db->query("CALL increment_store()");
    }
}
