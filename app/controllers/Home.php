<?php

class Home extends Controller{
    private $userModel;

    public function __construct()
    {   

        $this->userModel=$this->model("CategoryModel");

    }

    // public function index($data=[1]){
    //     $dta =[
    //         'post'=>'',
    //         'cat'=>''
    //     ];
    //    $dta['post']= $this->userModel->getPostByid($data[1]);
    //    $dta['cat']=$this->userModel->getAllcat();
    //         // $data = $this->userModel->getAllUsers();       
    //     $this->view("home/index",$dta);
    // }

    public function index($data=[]){
       $dta=$this->userModel-> getAllCategory();      
        $this->view("home/index",$dta);
    }

}