<?php

class Detail extends Controller{ 
    private $postModel;
    private $catModel;

    public function __construct()
    {     
        $this->postModel = $this->model("PostModel");
        $this->catModel = $this->model("CategoryModel");
    }

    public function homedetail($params=[]){
        $data=[
            "cats"=>'',
            "posts"=>''
        ];
       $data['cats'] = $this->catModel->getAllCategory();
       $data['posts']=$this->postModel->getPostByCatId($params[0]);
        $this->view('user/detail/homedetail',$data);
    
    }

    public function detailshow($params=[]){
        // echo $params[0];
        $post=$this->postModel->getPostById($params[0]);
        $this->view('user/detail/detailshow',['post' => $post]);
    }
}