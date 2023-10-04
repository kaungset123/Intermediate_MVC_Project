<?php

class Category extends Controller{
    private $catModel;

    public function __construct()
    {
        $this->catModel = $this->model('CategoryModel');
    }

    public function create($data=[]){
        $data =[
            "name"=>"",
            "name_err"=>"",
            "cats"=>$this->catModel->getAllCategory()
        ];
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_SPECIAL_CHARS);
            $data['name']=$_POST['name'];

            if(empty($data['name'])){
                $data['name_err']="please input category name";
                $this->view('admin/category/home',$data);
            }else{
                if($this->catModel->getCategoryByName($data['name'])){
                    $data['name_err']="This category name is already exist";
                    $this->view('admin/category/home',$data);
                }else{
                    if($this->catModel->insertCateName($data['name'])){
                        flash("cat_create_success","Category created successfully");
                        $data['cats']=$this->catModel->getAllCategory(); // updating database values by reassiging $data['cats']
                        $this->view('admin/category/home',$data);
                    }else{
                        flash("cat_create_fail","Category creation fail");
                        $this->view('admin/category/home',$data);
                    }
                }
            }
        //   echo "I am post";

        }else{
            $this->view('admin/category/home',$data);
            // echo "I am get";
     
        }
        
    }

    public function edit($data=[]){
        $dta =[
            "name"=>"",
            "name_err"=>"",
            "cats"=>"",
            "currentCat"=>""
        ];
        $dta['cats']=$this->catModel->getAllCategory();
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            // echo "I am coming with post";
            $dta['name']=$_POST['name'];
            if(!empty($dta['name'])){
                if($this->catModel->updateCategory(getCurrentId(),$dta['name'])){
                    deleteCurrentId();
                    redirect(URLROOT . 'category/create');
                }else{
                    $dta['currentCat']=$this->catModel->getCategoryById(getCurrentId());
                    deleteCurrentId();
                    flash("cat_edit_error","Category edit fail");
                    redirect(URLROOT,"admin/category/edit",$dta);
                }              
            }else{
                $dta['name_err']="please insert category name";
                $dta['currentCat']=$this->catModel->getCategoryById(getCurrentId());
                deleteCurrentId();
                $this->view("admin/category/edit",$dta);
            }
        }else{
            setCurrentId($data[0]);
            $dta['currentCat']=$this->catModel->getCategoryById($data[0]);
            // echo "category to delete is ".$data[0];
            $this->view("admin/category/edit",$dta);
        }
    }

    public function delete($data=[]){
        if($this->catModel->deleteCats($data[0])){
            redirect( URLROOT . "category/create");
        }else{
            redirect( URLROOT . "category/create");
        }
    }
}