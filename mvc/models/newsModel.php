<?php
class newsModel extends db{
    public function SelectAllNews(){
        $sql =  "SELECT * FROM tintuc";
        return $this->pdo_query($sql);
    }
    public function SelectNewsID($id){
        $sql =  "SELECT * FROM tintuc WHERE id = ?";
        return $this->pdo_query($sql,$id);
    }
    public function UpdateNews($tennews,$ngaynews,$ndnews,$hinhtdnews,$id){
        $sql = "UPDATE tintuc SET tieuDe = ?, ngay = ?, noiDung = ?, anhtieude = ? WHERE id =? ";
        return $this->pdo_execute($sql,$tennews,$ngaynews,$ndnews,$hinhtdnews,$id);
    }
    public function UpdateNewsNoImg($tennews,$ngaynews,$ndnews,$id){
        $sql = "UPDATE tintuc SET tieuDe = ?, ngay= ?, noiDung= ? WHERE id =? ";
        return $this->pdo_execute($sql,$tennews,$ngaynews,$ndnews,$id);
    }
    public function RemoveNews($id){
        $sql = "DELETE FROM tintuc WHERE id = ?";
        return $this->pdo_execute($sql,$id);
    }
    public function SelectNewsByName($tennews){
        $sql =  "SELECT * FROM tintuc WHERE tieuDe = ?";
        return $this->pdo_execute($sql,$tennews);
    }
    public function InsertNews($id,$tennews,$ngaynews,$ndnews,$hinhtdnews){
        $sql = "INSERT INTO tintuc (id, tieuDe, ngay, noiDung, anhtieude) VALUES (?,?,?,?,?)";
        return $this->pdo_execute($sql,$id,$tennews,$ngaynews,$ndnews,$hinhtdnews);
    }
}
?>