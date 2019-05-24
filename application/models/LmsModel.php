<?php

class LmsModel extends CI_Model{

    public function addNewCourse($id,$name,$enrollment,$year,$semester){

        $this->db->select('*');
        $this->db->from('course');
        $this->db->where(array('course_id'=> $id));
        $query = $this->db->get();

        if($query->result()){

            $this->session->set_flashdata("error", "1");

        }else{

            $data = array(

                'course_id'=>$id,
                'name'=>$name,
                'enrollment'=>$enrollment,
                'date'=>date('Y-m-d'),
                'year'=>$year,
                'semester'=>$semester

            );

            $this->db->insert('course',$data);

            $this->db->where(array('type'=> 'student'));
            $this->db->set('notifications', true);
            $this->db->update('users');

            $this->session->set_flashdata("success", "1");

        }
    }

    public function courseDetails(){

        $this->db->select('*');
        $this->db->from('course');
        $query = $this->db->get();

        return $query->result();

    }

    public function editCourse($course,$old_id,$id,$name,$enrollment,$year,$semester){

        if ($course==$id){

            $data = array(

                'name'=>$name,
                'enrollment'=>$enrollment,
                'year'=>$year,
                'semester'=>$semester

            );

            $this->db->where(array('id'=> $old_id));
            $this->db->set($data);
            $this->db->update('course');

            $this->session->set_flashdata("success", "2");

        }else{
            $this->db->select('*');
            $this->db->from('course');
            $this->db->where(array('course_id'=> $id));
            $query = $this->db->get();

            if($query->result()){

                $this->session->set_flashdata("error", "1");

            }else{

                $data = array(

                    'course_id'=>$id,
                    'name'=>$name,
                    'enrollment'=>$enrollment,
                    'year'=>$year,
                    'semester'=>$semester

                );

                $this->db->where(array('id'=> $old_id));
                $this->db->set($data);
                $this->db->update('course');

                $this->session->set_flashdata("success", "2");

            }
        }
    }

    public function addStudent($fname,$lname,$sname,$nic,$phone,$email){

        $query =$this->db->query("SELECT regNum FROM register WHERE student = true ORDER BY id DESC LIMIT 1");

        if($query->result()){

            $student = $query->row();

            $regNum = $student->regNum;

            $number = preg_replace("/[^0-9]/", '', $regNum) + 8;

            $this->db->select('*');
            $this->db->from('register');
            $this->db->where(array('regNum'=> 'IT'.str_pad($number, 8, '0', STR_PAD_LEFT)));
            $query = $this->db->get();

            if($query->result()){

                $number = preg_replace("/[^0-9]/", '', $regNum) + 9;

                $this->register($fname,$lname,$sname,$nic,$phone,$email,'IT'.str_pad($number, 8, '0', STR_PAD_LEFT),'student');

            }else{

                $this->register($fname,$lname,$sname,$nic,$phone,$email,'IT'.str_pad($number, 8, '0', STR_PAD_LEFT),'student');

            }

        }else{

            $regNum = 'IT00000008';

            $this->register($fname,$lname,$sname,$nic,$phone,$email,$regNum,'student');

        }

    }

    private function register($fname,$lname,$sname,$nic,$phone,$email,$regNum,$type){

        if($this->checkNic($nic)){
            $this->session->set_flashdata("error", "1");
        }else {

            if ($this->checkEmail($email)) {
                $this->session->set_flashdata("error", "2");
            } else {
                if ($type == 'student') {

                    $data = array(

                        'fname' => $fname,
                        'lname' => $lname,
                        'sname' => $sname,
                        'nic' => $nic,
                        'regNum' => $regNum,
                        'phone' => $phone,
                        'email' => $email,
                        'student' => true

                    );

                    $this->db->insert('register', $data);

                    $this->session->set_flashdata("success", "1");

                    $this->session->set_flashdata("reg_No", $regNum);

                } else if ($type == 'lecturer') {

                    $data = array(

                        'fname' => $fname,
                        'lname' => $lname,
                        'sname' => $sname,
                        'nic' => $nic,
                        'regNum' => $regNum,
                        'phone' => $phone,
                        'email' => $email,
                        'academic' => true

                    );

                    $this->db->insert('register', $data);

                    $this->session->set_flashdata("success", "1");

                    $this->session->set_flashdata("reg_No", $regNum);

                }
            }
        }

    }

    public function deleteCourse($id){

        $this->db->where('id',$id);
        $this->db->delete('course');

        $this->session->set_flashdata("success","3");
    }

    public function usersDetails($type){

        $this->db->select('*');
        $this->db->from('register');
        $this->db->where($type,true);
        $query = $this->db->get();

        return $query->result();

    }

    public function registerUpdate($id,$fname,$lname,$sname,$nic,$phone,$email,$type){

        $this->db->select('*');
        $this->db->from('register');
        $this->db->where(array('id' => $id));
        $query = $this->db->get();
        $user = $query->row();

        $regNum = $user->regNum;
        $old_nic = $user->nic;
        $old_email = $user->email;

        if ($old_nic==$nic){

            if ($old_email==$email){
                $this->updateDetails($regNum,$fname,$lname,$sname,$nic,$phone,$email,$type);
            }else{

                if ($this->checkEmail($email)) {
                    $this->session->set_flashdata("error", "2");
                }else{
                    $this->updateDetails($regNum,$fname,$lname,$sname,$nic,$phone,$email,$type);
                }
            }
        }else{

            if($this->checkNic($nic)){
                $this->session->set_flashdata("error", "1");
            }else{

                if ($old_email==$email){
                    $this->updateDetails($regNum,$fname,$lname,$sname,$nic,$phone,$email,$type);
                }else{

                    if ($this->checkEmail($email)) {
                        $this->session->set_flashdata("error", "2");
                    }else{
                        $this->updateDetails($regNum,$fname,$lname,$sname,$nic,$phone,$email,$type);
                    }
                }
            }
        }
    }

    private function updateDetails($regNum,$fname,$lname,$sname,$nic,$phone,$email,$type){

        if ($type=='student'){

            $data = array(

                'fname' => $fname,
                'lname' => $lname,
                'sname' => $sname,
                'nic' => $nic,
                'regNum' => $regNum,
                'phone' => $phone,
                'email' => $email,
                'student' => true

            );

            $this->db->where(array('regNum'=> $regNum));
            $this->db->set($data);
            $this->db->update('register');

            $this->session->set_flashdata("success", "2");

        }else if ($type=='lecturer'){

            $data = array(

                'fname' => $fname,
                'lname' => $lname,
                'sname' => $sname,
                'nic' => $nic,
                'regNum' => $regNum,
                'phone' => $phone,
                'email' => $email,
                'academic' => true

            );

            $this->db->where(array('regNum'=> $regNum));
            $this->db->set($data);
            $this->db->update('register');

            $this->session->set_flashdata("success", "2");

        }

    }

    private function checkNic($nic){

        $this->db->select('*');
        $this->db->from('register');
        $this->db->where(array('nic'=> $nic));
        $query = $this->db->get();

        return $query->result();

    }

    private function checkEmail($email){

        $this->db->select('*');
        $this->db->from('register');
        $this->db->where(array('email' => $email));
        $query = $this->db->get();

        return $query->result();

    }

    public function deleteUser($id){

        $this->db->where('id',$id);
        $this->db->delete('register');

        $this->session->set_flashdata("success","3");

    }

    public function addLecturer($fname,$lname,$sname,$nic,$phone,$email){

        $query =$this->db->query("SELECT regNum FROM register WHERE academic = true ORDER BY id DESC LIMIT 1");

        if($query->result()){

            $lecturer = $query->row();

            $regNum = $lecturer->regNum;

            $number = preg_replace("/[^0-9]/", '', $regNum) + 8;

            $this->db->select('*');
            $this->db->from('register');
            $this->db->where(array('regNum'=> 'AD'.str_pad($number, 8, '0', STR_PAD_LEFT)));
            $query = $this->db->get();

            if($query->result()){

                $number = preg_replace("/[^0-9]/", '', $regNum) + 9;

                $this->register($fname,$lname,$sname,$nic,$phone,$email,'AD'.str_pad($number, 8, '0', STR_PAD_LEFT),'lecturer');

            }else{

                $this->register($fname,$lname,$sname,$nic,$phone,$email,'AD'.str_pad($number, 8, '0', STR_PAD_LEFT),'lecturer');

            }

        }else{

            $regNum = 'AD00000008';

            $this->register($fname,$lname,$sname,$nic,$phone,$email,$regNum,'lecturer');

        }

    }

    public function courseInformation($id){

        $this->db->select('*');
        $this->db->from('course');
        $this->db->where('id',$id);
        $query = $this->db->get();

        $course = $query->row();

        return $course->course_id.' '.$course->name;

    }

    public function enrollCourse($id,$key,$regNum){

        $this->db->select('*');
        $this->db->from('course');
        $this->db->where(array('id'=>$id,'enrollment'=>$key));
        $query = $this->db->get();

        if($query->result()){

            $course=$query->row();

            $data = array(
                'course' => $course->course_id,
                'c_id' => $id,
                'regNum' => $regNum
            );

            $this->db->insert('enrollment', $data);

            if ($_SESSION['userType'] == 'student'){
                redirect('LmsController/stdCourse');
            }else if ($_SESSION['userType'] == 'lecturer'){
                redirect('LmsController/courseView');
            }

        }else{
            $this->session->set_flashdata("error", "1");
        }

    }

    public function addCourseMaterial($type,$description,$fileName,$week,$courseId,$filePath){

        $data = array(
            'type' => $type,
            'description' => $description,
            'fileName' => $fileName,
            'Path' => $filePath,
            'week' => $week,
            'courseId' => $courseId
        );

        $this->db->insert('materials', $data);

        $this->session->set_flashdata("success","1");

    }

    public function courseMaterialDetails($id){

        $query =$this->db->query("SELECT *,m.id as materialsId FROM materials m , course c where m.courseId=c.id AND m.courseId=".$id);

        return $query->result();

    }

    public function editCourseMaterial($type,$description,$fileName,$week,$filePath,$id){

        $data = array(
            'type' => $type,
            'description' => $description,
            'fileName' => $fileName,
            'Path' => $filePath,
            'week' => $week
        );

        $this->db->where(array('id'=> $id));
        $this->db->set($data);
        $this->db->update('materials');

        $this->session->set_flashdata("success", "2");

    }

    public function editCourseMaterialWithoutFile($type,$description,$fileName,$week,$id){

        $data = array(
            'type' => $type,
            'description' => $description,
            'fileName' => $fileName,
            'week' => $week
        );

        $this->db->where(array('id'=> $id));
        $this->db->set($data);
        $this->db->update('materials');

        $this->session->set_flashdata("success", "2");

    }

    public function removeCourseMaterial($id){

        $this->db->where('id',$id);
        $this->db->delete('materials');

        $this->session->set_flashdata("success","3");

    }

    public function addAssignment($week,$date,$description,$fileName,$name,$id){

        $data = array(
            'week' => $week,
            'date' => $date,
            'description' => $description,
            'document' => $fileName,
            'name' => $name,
            'courseId' => $id
        );

        $this->db->insert('assignment', $data);

        $this->session->set_flashdata("success","1");

    }

    public function assignmentDetails($id){

        $query =$this->db->query("SELECT *,a.id as assignmentId,a.name as assignmentName,a.date as assignmentDate FROM assignment a , course c where a.courseId=c.id AND a.courseId=".$id);

        return $query->result();

    }

    public function editAssignment($week,$date,$description,$name,$fileName,$id){

        $data = array(
            'week' => $week,
            'date' => $date,
            'description' => $description,
            'document' => $fileName,
            'name' => $name
        );

        $this->db->where(array('id'=> $id));
        $this->db->set($data);
        $this->db->update('assignment');

        $this->session->set_flashdata("success", "2");

    }

    public function editAssignmentWithoutFile($week,$date,$description,$name,$id){

        $data = array(
            'week' => $week,
            'date' => $date,
            'description' => $description,
            'name' => $name
        );

        $this->db->where(array('id'=> $id));
        $this->db->set($data);
        $this->db->update('assignment');

        $this->session->set_flashdata("success", "2");

    }

    public function removeAssignment($id){

        $this->db->where('id',$id);
        $this->db->delete('assignment');

        $this->session->set_flashdata("success","3");

    }

    public function addNotices($note,$id){
        $data = array(
            'courseId'=>$id,
            'note'=>$note,
            'date'=>date('Y-m-d')
        );

        $this->db->insert('notices',$data);

        $this->session->set_flashdata("success", "1");
    }

    public function noticeDetails($id){

        $query =$this->db->query("SELECT * FROM notices where courseId=".$id);

        return $query->result();

    }

    public function editNotices($note,$id){

        $data = array(
            'note'=>$note,
            'date' => date('Y-m-d')
        );

        $this->db->where(array('id'=> $id));
        $this->db->set($data);
        $this->db->update('notices');

        $this->session->set_flashdata("success", "2");

    }

    public function removeNotices($id){

        $this->db->where('id',$id);
        $this->db->delete('notices');

        $this->session->set_flashdata("success","3");

    }

    public function submissionDetails($id){

        $query =$this->db->query("SELECT * FROM assignment where id=".$id);

        return $query->result();

    }

    public function addSubmission($path,$description,$assignmentId,$regNum){

        $data = array(
            'assignmentId'=>$assignmentId,
            'regNum'=>$regNum,
            'description'=>$description,
            'file'=>$path,
            'date' => date('Y-m-d'),
            'time' =>date('h:i:s')
        );

        $this->db->insert('submission',$data);

        $this->session->set_flashdata("success", "1");

    }

    public function submissionDateCheck($id){

        $query =$this->db->query("SELECT * FROM assignment WHERE id =".$id." and date >'".date('Y-m-d')."'");

        if($query->result()){
            return true;
        }else{
            $this->session->set_flashdata("error", "1");
            return false;
        }
    }

    public function myCourses($regNum){
        $query =$this->db->query("SELECT *,c.id as idz FROM enrollment e , course c where c.course_id= e.course and regNum='".$regNum."'");

        return $query->result();
    }

    public function participants($course){
        $query =$this->db->query("SELECT * FROM enrollment e , register r , course c , users u WHERE e.regNum=r.regNum and e.course=c.course_id and r.regNum=u.regNum and u.type='student' and c.id=".$course);

        return $query->result();
    }

    public function alreadyEnroll($id,$regNum){

        $this->db->select('*');
        $this->db->from('enrollment');
        $this->db->where(array('c_id'=>$id,'regNum'=>$regNum));
        $query = $this->db->get();

        if($query->result()){
            return true;
        }else{
            return false;
        }
    }

    public function notification($regNum){
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where(array('regNum'=>$regNum));
        $query = $this->db->get();

        $user= $query->row();

        if($user->notifications==1){
            $last_day = $user->last_sign;

            $query =$this->db->query("SELECT * FROM course where date >'".$last_day."' or DATE_ADD(date, INTERVAL 14 DAY)>'".date('Y-m-d')."'");

            return $query->result();

        }else{
            return array();
        }
    }

    public function notificationAssignment($regNum){

        $query =$this->db->query("SELECT *,a.id as assignmentId FROM assignment a, enrollment e WHERE a.courseId=e.c_id and regNum='".$regNum."' and a.date>'".date('Y-m-d')."'");

        $assignment = $query->row();

        if ($query->result()){
            $id = $assignment->assignmentId;

            $query1 =$this->db->query("SELECT * FROM submission WHERE regNum='".$regNum."' and assignmentId=".$id);

            if ($query1->result()){
                return array();
            }else{
                $query2 =$this->db->query("SELECT *,a.date as assignmentDate FROM assignment a, enrollment e WHERE a.courseId=e.c_id and regNum='".$regNum."' and a.date>'".date('Y-m-d')."'");

                return $query2->result();
            }

        }else{
            return array();
        }
    }

    public function notifyUser($regNum){
        $this->db->set('notifications', null);
        $this->db->where('regNum', $regNum);
        $this->db->update('users');
    }

    public function lecturerAssignment($regNum){
        $query =$this->db->query("SELECT *,a.id as assignment_id ,a.name as assignmentName FROM enrollment e , assignment a,course c WHERE a.courseId=e.c_id and a.courseId=c.id and regNum='".$regNum."' and a.date<='".date('Y-m-d')."'");

        return $query->result();
    }

    public function assignmentSubmission($id){
        $query =$this->db->query("SELECT * FROM submission where id=".$id);

        return $query->result();
    }

    public function courseAssignment($id){

        $query =$this->db->query("SELECT *,a.name as assignmentName,a.date as assignmentDate FROM assignment a , course c WHERE c.id=a.courseId and a.id=".$id);

        $assignment = $query->row();

        return $assignment->name.' - '.$assignment->course_id.' / '.$assignment->assignmentName.' / Due Date :'.$assignment->assignmentDate;

    }

    public function courseNotices($id){
        $query =$this->db->query("SELECT * FROM notices where courseId=".$id);

        return $query->result();
    }

    public function adminAssignment(){
        $query =$this->db->query("SELECT *,a.id as assignment_id ,a.name as assignmentName FROM enrollment e , assignment a,course c WHERE a.courseId=e.c_id and a.courseId=c.id and a.date<='".date('Y-m-d')."'");

        return $query->result();
    }

    public function notificationCheck($id){
        $query =$this->db->query("SELECT * FROM users WHERE regNum='".$id."'");

        $user = $query->row();

        return $user->notifications;
    }

}