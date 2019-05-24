<?php

class UserModel extends CI_Model{

    function login($regNum,$password){

        if(strtolower($regNum)=="admin"){

            $this->db->select('*');
            $this->db->from('users');
            $this->db->where(array('type'=> $regNum,'password'=>md5($password)));
            $query = $this->db->get();

            if($query->result()){

                $user= $query->row();

                $_SESSION['user_logged'] = TRUE;
                $_SESSION['userType'] = 'admin';
                $_SESSION['regNum'] = $user->regNum;
                $_SESSION['imagePath']=$user->image;

                redirect("LmsController/admin");

            }else{

                $this->session->set_flashdata("error", "2");

            }

        }else{

            $this->db->select('*');
            $this->db->from('users');
            $this->db->where(array('regNum'=> $regNum));
            $query = $this->db->get();

            if($query->result()){

                $this->db->select('*');
                $this->db->from('users');
                $this->db->where(array('regNum'=> $regNum,'password'=>md5($password)));
                $query1 = $this->db->get();

                if($query1->result()){

                    $user= $query1->row();

                    $this->db->select('*');
                    $this->db->from('register');
                    $this->db->where(array('regNum'=> $regNum));
                    $query2 = $this->db->get();

                    $user2= $query2->row();

                    if ($user->type == 'student'){

                        $_SESSION['user_logged'] = TRUE;
                        $_SESSION['userType'] = 'student';
                        $_SESSION['regNum'] = $user->regNum;
                        $_SESSION['userFirst'] = $user2->fname;
                        $_SESSION['imagePath']=$user->image;
                        $_SESSION['userNotification'] = $user->notifications;

                        redirect("LmsController/student");
                    }else if($user->type == 'lecturer'){

                        $_SESSION['user_logged'] = TRUE;
                        $_SESSION['userType'] = 'lecturer';
                        $_SESSION['regNum'] = $user->regNum;
                        $_SESSION['userFirst'] = $user2->fname;
                        $_SESSION['imagePath']=$user->image;

                        redirect("LmsController/lecturer");
                    }
                }else{
                    $this->session->set_flashdata("error", "2");
                }
            }else{

                $this->db->select('*');
                $this->db->from('register');
                $this->db->where(array('regNum'=> $regNum));
                $query = $this->db->get();

                if($query->result()){
                    $this->session->set_flashdata("error", "3");
                }else{
                    $this->session->set_flashdata("error", "1");
                }
            }
        }
    }

    function register($regNo,$nic,$password){

        $this->db->select('*');
        $this->db->from('register');
        $this->db->where(array('regNum'=> $regNo));
        $query = $this->db->get();

        if($query->result()){

            $user= $query->row();

            if ($user->nic==$nic){

                if ($user->student == true){

                    $data = array(

                        'regNum'=>$user->regNum,
                        'password'=>md5($password),//encrypted password
                        'type'=>'student',
                        'last_sign'=>date('Y-m-d')

                    );

                    $this->db->insert('users',$data);

                    $this->session->set_flashdata("success", "1");

                    redirect('UserController/login');
                }else if (!$user->academic == null){

                    $data = array(

                        'regNum'=>$user->regNum,
                        'password'=>md5($password),//encrypted password
                        'type'=>$user->academic

                    );

                    $this->db->insert('users',$data);

                    $this->session->set_flashdata("success", "1");

                    redirect('UserController/login');
                }else{
                    $this->session->set_flashdata("error", "1");
                }
            }else{
                $this->session->set_flashdata("error", "2");
            }
        }else{
            $this->session->set_flashdata("error", "3");
        }
    }

    public function uploadImage($name,$regNum){

        $this->db->set('image', base64_encode($name));
        $this->db->where('regNum', $regNum);
        $this->db->update('users');

        $_SESSION['imagePath']=base64_encode($name);

        redirect("LmsController/profile");

    }

    public function userDetails($regNum){

        $this->db->select('*');
        $this->db->from('register');
        $this->db->where(array('regNum' => $regNum));
        $query = $this->db->get();

        return $query->result();

    }

    public function confirmEmail($emailNew,$regNum){

        $this->db->select('*');
        $this->db->from('register');
        $this->db->where(array('email' => $emailNew));
        $query = $this->db->get();

        if($query->result()){

            $this->session->set_flashdata("error","1");

        }else{

            $this->db->set('email' , $emailNew);
            $this->db->where('regNum', $regNum);
            $this->db->update('register');

            $this->session->set_flashdata("success","1");

        }
    }

    public function confirmPhone($phone,$regNum){

        $this->db->set('phone' , $phone);
        $this->db->where('regNum', $regNum);
        $this->db->update('register');

        $this->session->set_flashdata("success","1");

    }

    public function confirmPassword($password,$currentPassword,$regNum){

        $this->db->select('*');
        $this->db->from('users');
        $this->db->where(array('regNum' => $regNum,'password' => md5($currentPassword)));
        $query = $this->db->get();

        if($query->result()){

            $this->db->set('password' , md5($password));
            $this->db->where('regNum', $regNum);
            $this->db->update('users');

            $this->session->set_flashdata("success","1");

        }else{

            $this->session->set_flashdata("error","2");

        }

    }

    public function last_sign($regNum){

        $this->db->set('last_sign' , date('Y-m-d'));
        $this->db->where('regNum', $regNum);
        $this->db->update('users');

    }

}