<?php
class PostModel {
    private $db;
    
    public function __construct()
    {
        $this->db = new Database(); // instantiation database object
    }

    public function getPostByCatId($cate_id){
        $this->db->query("SELECT * FROM post WHERE cate_id=:id ORDER BY id DESC");
        $this->db->bind(":id",$cate_id);
        return $this->db->multipleSet();
    }

    public function insertPost($cate_id,$title,$desc,$file,$content){
        $this->db->query("INSERT INTO post (cate_id,title,description,image,content) VALUES (:cate_id,:title,:desc,:file,:content)");
        $this->db->bind(':cate_id',$cate_id);
        $this->db->bind(':title',$title);
        $this->db->bind(':desc',$desc);
        $this->db->bind(':file',$file);
        $this->db->bind(':content',$content);
        return $this->db->execute();
    }

    public function getPostById($id){
        $this->db->query("SELECT * FROM post WHERE id=:id");
        $this->db->bind(":id",$id);
        return $this->db->singleSet();
    }

    public function deletePostById($id){
        $this->db->query("DELETE FROM post WHERE id=:id");
        $this->db->bind(":id",$id);
        return $this->db->singleSet();
    }

    public function updatePost($id,$cate_id,$title,$description,$image,$content){
        $this->db->query("UPDATE post SET cate_id=:cate_id,title=:title,description=:description, image=:image,content=:content WHERE id=:id");
        $this->db->bind(":id",$id);
        $this->db->bind(":cate_id",$cate_id);
        $this->db->bind(":title",$title);
        $this->db->bind(":description",$description);
        $this->db->bind(":image",$image);
        $this->db->bind(":content",$content);
        
        return $this->db->execute();
    }
}