<?php  

class Article_model extends CI_Model
{

    private $_table = 'article';

    // get all data from dbms
    public function get()
    {
        $query = $this->db->get($this->_table);
        return $query->result();
    }

    public function get_published($limit = null, $offset = null)
    {
        if( !$limit && $offset )
        {
            $query = $this->db->get_where($this->_table, ['draft' => 'false']);
        } else {
            $query = $this->db->get_where($this->_table, ['draft' => 'false'], $limit, $offset);
        }
        return $query->result();
    }

    public function find_by_slug($slug)
    {
        if( !$slug )
        {
            return;
        }
        $query = $this->db->get_where($this->_table, ['slug' => $slug]);
        return $query->row();
    }

    // get by id
    public function find($id)
    {
        if( !$id )
        {
            return;
        }

        $query = $this->db->get_where($this->_table, array('id' => $id));
        return $query->row();
    }

    // insert data to dbms
    public function insert($article)
    {
        return $this->db->insert($this->_table, $article);
    }

    // update data from dbms
    public function update($article)
    {
        if( !isset($article['id']) )
        {
            return;
        }

        return $this->db->update($this->_table, $article, ['id' => $article['id']]);
    }

    // delete data from dbms
    public function delete($id)
    {
        if(!$id)
        {
            return;
        }

        return $this->db->delete($this->_table, ['id' => $id]);
    }

}

?>

<!-- 

$this->db->insert() untuk menambahkan data ke tabel;
$this->db->get() untuk mengambil data dari tabel, sama seperti query SELECT.
$this->db->update() untuk update data di tabel;
$this->db->delete() untuk menghapus data di tabel;
$this->db->get_where() untuk mengambil data dengan WHERE;

 -->