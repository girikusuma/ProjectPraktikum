<?php
    class Perpustakaan{
        private $mysqli;
        public function __construct($conn)
        {
            $this->mysqli = $conn;
        }

        public function lihat($id=null){
            $db = $this->mysqli->connection;
            $sql = "SELECT * FROM tb_buku b JOIN tb_pengarang p ON b.id_pengarang=p.id_pengarang JOIN tb_penerbit pe ON b.id_penerbit=pe.id_penerbit JOIN tb_kategori k ON b.id_kategori=k.id_kategori JOIN tb_rak r ON b.id_rak=r.id_rak";
            $query = $db->query($sql) or die($db->error);
            return $query;
        }
        public function lihat_sorting($sort,$field){
            $db = $this->mysqli->connection;
            $sql = "SELECT * FROM tb_buku b JOIN tb_pengarang p ON b.id_pengarang=p.id_pengarang JOIN tb_penerbit pe ON b.id_penerbit=pe.id_penerbit JOIN tb_kategori k ON b.id_kategori=k.id_kategori JOIN tb_rak r ON b.id_rak=r.id_rak ORDER BY $field $sort";
            $query = $db->query($sql) or die($db->error);
            return $query;
        }
        public function lihat_filter($q,$column){
            $db = $this->mysqli->connection;
            $sql = "SELECT * FROM tb_buku b JOIN tb_pengarang p ON b.id_pengarang=p.id_pengarang JOIN tb_penerbit pe ON b.id_penerbit=pe.id_penerbit JOIN tb_kategori k ON b.id_kategori=k.id_kategori JOIN tb_rak r ON b.id_rak=r.id_rak WHERE $column LIKE '%$q%'";
            $query = $db->query($sql) or die($db->error);
            return $query;
        }
    }
?>