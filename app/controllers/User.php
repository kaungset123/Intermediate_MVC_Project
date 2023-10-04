<?php

class User extends Controller{
    private $userModel;
    private $postModel;
    private $catModel;

    public function __construct()
    {
        $this->userModel = $this->model('Usermodel');
        $this->postModel = $this->model("PostModel");
        $this->catModel = $this->model("CategoryModel");

    }

    public function register(){

      if($_SERVER['REQUEST_METHOD'] == "POST"){
        // $_POST=filter_input_array(INPUT_POST,);
        $data=[
            "name"=>$_POST['name'],
            "email"=>$_POST['email'],
            "password"=>$_POST['password'],
            "confirm_password"=>$_POST['confirm_password'],
            "name_err"=>'',
            "email_err"=>'',
            "password_err"=>'',
            "confirm_password_err"=>''            
        ];

        if(empty($data['name'])){
            $data['name_err']="Please input username";
        }if(empty($data['email'])){
            $data['email_err']="Please input email";
        }else{
            if($this->userModel->getUserByEmail($data['email'])){
                $data['email_err']="Email is already exist";
            }
        }
        if(empty($data['password'])){
            $data['password_err']="Please input password";
        }if(empty($data['confirm_password'])){
            $data['confirm_password_err']="Please input confirmpassword";
        }else{
            if($data['password'] != $data['confirm_password']){
                $data['confirm_password_err']="password do not match";
            }
        }

        if(empty($data['name_err']) && empty($data['email_err']) && empty($data['password_err']) && empty($data['confirm_password_err'])){
            if($this->userModel->register($data['name'],$data['email'],$data['password'])){
                flash('register_success',"Register success,please login");
                  $this->view("user/login"); // echo "Success";
            }else{
                $this->view("user/register");//echo "fail";
            }
        }else{
            $this->view("user/register",$data);
        }


      }else{
        $this->view("user/register");
      }
             
    }

    public function login(){
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            // $_POST=filter_input_array(INPUT_POST,);
            $data=[
                "email"=>$_POST['email'],
                "password"=>$_POST['password'],
                "email_err"=>'',
                "password_err"=>''           
            ];
    
           if(empty($data['email'])){
                $data['email_err']="Please input email";
            }if(empty($data['password'])){
                $data['password_err']="Please input password";
            }  
            if(empty($data['email_err']) && empty($data['password_err']) ){
                
                $rowUser= $this->userModel->getUserByEmail($data['email']);
                if(!empty($rowUser)){
                    $hash_pass = $rowUser->password;
                  
                    if(password_verify($data['password'],$hash_pass)){

                        if($_POST['email'] === "kaung@gmail.com"){
                            setUserSession($rowUser);
                            redirect( URLROOT. 'admin/home');

                        }else{
                             // echo "success";                       
                        setUserSession($rowUser);
                        redirect( URLROOT . 'user/member/1' );
                        // $this->view('user/member.php');
                        }
                       
                        
                    }else{
                        // echo "fail";
                        flash("login_fail","User Credential error");
                        $this->view('user/login');
                    }
                }else{
                    $data['email_err'] = "Email is not correct";
                }

            }else{
                $this->view("user/login",$data);
            }
    

          }else{
            $this->view("user/login");
          }
    }

    public function logout(){
        unsetUserSession();
        // $this->view('home/index/1');
        redirect( URLROOT);
    }

    public function member($params=[]){
       
        $data = [
            "cats"=>'',
            "posts"=>''
        ];
        $data['cats']=$this->catModel->getAllCategory();
        $data['posts']=$this->postModel->getPostByCatId($params[0]);
        $this->view('user/member',$data);

    }

    public function create(){
        // $this->view('user/create');
   
            // echo "post create";
            $data=[
                "title"=>'',
                "desc"=>'',
                "file"=>'',
                "content"=>'',
                "title_err"=>'',
                "desc_err"=>'',
                "file_err"=>'',
                "content_err"=>'',
                "cats"=>'',
                "posts"=>''
            ];
           $data['cats'] = $this->catModel->getAllCategory();

            if($_SERVER['REQUEST_METHOD'] == "POST"){
    
                // $dir = dirname(dirname(dirname(__FILE__)));
                // echo $dir;
                $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_SPECIAL_CHARS);
                $dir = dirname(dirname(dirname(__FILE__)));
                $files = $_FILES['file'];
    
                $data['title']=$_POST['title'];
                $data['desc']=$_POST['desc'];
                $data['file']=$_FILES['file'];
                $data['content']=$_POST['content'];
    
                if(empty($data['title'])){
                    $data['title_err']= "Please input title";
                }
                if(empty($data['desc'])){
                    $data['desc_err']= "Please input description";
                }
                if(empty($data['content'])){
                    $data['content_err']= "Please input content";
                }
                          
                if(empty($data['title_err']) && empty($data['desc_err']) &&  empty($data['content_err']) ){
                    if(!empty($files)){
                        move_uploaded_file($files['tmp_name'], $dir . '/public/assets/uploads/' . $files['name']);
                        $this->postModel->insertPost($_POST['cate_id'],$_POST['title'],$_POST['desc'],$files['name'],$_POST['content']);
                        flash("post_insert_success","post inserted successfully");
                        redirect(URLROOT . 'user/member/1');
                    }else{
                        $this->view("user/create",$data);
                        flash("post_insert_success","post insertion fail");
                    }
    
                }else{
                    $this->view("user/create",$data);
                }
    
                $this->view("user/create",$data);
            }else{
                $this->view("user/create",$data);
            }
           
        }

        public function memberdetail($params=[]){
            $post=$this->postModel->getPostById($params[0]);
            $this->view('user/memberdetail',['post' => $post]);
        }
    }
