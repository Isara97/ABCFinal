<?php

class LmsController extends CI_Controller{

    public function __construct() {
        parent::__construct();
        $this->load->model('LmsModel');
        $this->load->model('UserModel');
        $arr = array();
    }

    public function home(){

        $this->load->view('AbcHome');

    }

    public function student(){
        $user=$this->userConfirm();

        if ($user=='student') {
            $this->load->view('student/student');
        }else{
            redirect("LmsController/profile");
        }

    }

    public function logout(){

        if (isset($_SESSION['user_logged'])&&isset($_SESSION['regNum'])){
            $this->UserModel->last_sign($_SESSION['regNum']);
        }

        session_destroy();

        unset($_SESSION);
        redirect("LmsController/home");

    }

    public function admin(){
        $user=$this->userConfirm();

        if ($user=='admin') {
            $this->load->view('admin/admin');
        }else{
            redirect("LmsController/profile");
        }

    }

    public function lecturer(){
        $user=$this->userConfirm();

        if ($user == 'lecturer') {
            $this->load->view('lecturer/lecturer');
        }else{
            redirect("LmsController/profile");
        }

    }

    public function profile(){

        $user=$this->userConfirm();

        if ($user == 'student'){
            redirect("LmsController/student");
        }else if($user == 'admin'){
            redirect("LmsController/admin");
        }else if($user == 'lecturer'){
            redirect("LmsController/lecturer");
        }else{
            redirect("LmsController/home");
        }
    }

    public function stdSettings(){

        $user=$this->userConfirm();

        if ($user == 'student') {

            if (isset($_POST['confirmEmail'])) {
                $this->UserModel->confirmEmail($_POST['email'], $_SESSION['regNum']);
            }

            if (isset($_POST['confirmPhone'])) {
                $this->UserModel->confirmPhone($_POST['phone'], $_SESSION['regNum']);
            }

            if (isset($_POST['confirmPassword'])) {
                $this->UserModel->confirmPassword($_POST['password'], $_POST['currentPassword'], $_SESSION['regNum']);
            }

            $data['user'] = $this->UserModel->userDetails($_SESSION['regNum']);

            $this->load->view('student/settings', $data);
        }else{
            redirect("LmsController/profile");
        }
    }

    public function course(){

        $user=$this->userConfirm();

        if ($user == 'admin') {

            if (isset($_POST['addCourse'])) {
                $this->LmsModel->addNewCourse($_POST['id'], $_POST['name'], $_POST['enrollment'], $_POST['year'], $_POST['semester']);
            }

            if (isset($_POST['editCourse'])) {
                $this->LmsModel->editCourse($_POST['editCourse'], $_POST['old_id'], $_POST['id'], $_POST['name'], $_POST['enrollment'], $_POST['year'], $_POST['semester']);
            }

            if (isset($_POST['deleteCourse'])) {
                $this->LmsModel->deleteCourse($_POST['deleteId']);
            }

            $data['course'] = $this->LmsModel->courseDetails();

            $this->load->view('admin/course', $data);
        }else{
            redirect("LmsController/profile");
        }

    }

    public function studentRegister(){

        $user=$this->userConfirm();

        if ($user == 'admin') {
            if(isset($_POST['addStudent'])){
                $this->LmsModel->addStudent($_POST['fname'],$_POST['lname'],$_POST['sname'],$_POST['nic'],$_POST['phone'],$_POST['email']);
            }

            if(isset($_POST['editStudent'])){
                $this->LmsModel->registerUpdate($_POST['regNum'],$_POST['fname'],$_POST['lname'],$_POST['sname'],$_POST['nic'],$_POST['phone'],$_POST['email'],'student');
            }

            if(isset($_POST['deleteStudent'])){
                $this->LmsModel->deleteUser($_POST['regNum']);
            }

            $data['student'] =$this->LmsModel->usersDetails('student');

            $this->load->view('admin/student',$data);
        }else{
            redirect("LmsController/profile");
        }

    }

    public function lecturerRegister(){

        $user=$this->userConfirm();

        if ($user == 'admin') {
            if (isset($_POST['addLecturer'])) {
                $this->LmsModel->addLecturer($_POST['fname'], $_POST['lname'], $_POST['sname'], $_POST['nic'], $_POST['phone'], $_POST['email']);
            }

            if (isset($_POST['editLecturer'])) {
                $this->LmsModel->registerUpdate($_POST['regNum'], $_POST['fname'], $_POST['lname'], $_POST['sname'], $_POST['nic'], $_POST['phone'], $_POST['email'], 'lecturer');
            }

            if (isset($_POST['deleteLecturer'])) {
                $this->LmsModel->deleteUser($_POST['regNum']);
            }

            $data['lecturer'] = $this->LmsModel->usersDetails('academic');

            $this->load->view('admin/lecturer', $data);
        }else{
            redirect("LmsController/profile");
        }

    }

    public function adminSettings(){
        $user=$this->userConfirm();

        if ($user == 'admin') {
            if (isset($_POST['confirmPassword'])) {
                $this->UserModel->confirmPassword($_POST['password'], $_POST['currentPassword'], $_SESSION['regNum']);
            }

            $this->load->view('admin/settings');
        }else{
            redirect("LmsController/profile");
        }
    }

    public function lecturerSettings(){
        $user=$this->userConfirm();

        if ($user == 'lecturer') {
            if (isset($_POST['confirmEmail'])) {
                $this->UserModel->confirmEmail($_POST['email'], $_SESSION['regNum']);
            }

            if (isset($_POST['confirmPhone'])) {
                $this->UserModel->confirmPhone($_POST['phone'], $_SESSION['regNum']);
            }

            if (isset($_POST['confirmPassword'])) {
                $this->UserModel->confirmPassword($_POST['password'], $_POST['currentPassword'], $_SESSION['regNum']);
            }

            $data['user'] = $this->UserModel->userDetails($_SESSION['regNum']);

            $this->load->view('lecturer/settings', $data);
        }else{
            redirect("LmsController/profile");
        }
    }

    public function coursework(){
        $user=$this->userConfirm();

        if ($user == 'lecturer'|| $user=='student'||$user=='admin') {
            $data['course'] = $this->LmsModel->courseDetails();

            if ($_SESSION['userType'] == 'student') {
                $this->load->view('student/coursework', $data);
            } else if ($_SESSION['userType'] == 'lecturer') {
                $this->load->view('lecturer/coursework', $data);
            }else if ($_SESSION['userType'] == 'admin') {
                $this->load->view('admin/allCoursework', $data);
            } else {
                redirect('LmsController/profile');
            }
        }else{
            redirect("LmsController/profile");
        }
    }

    public function enrollment(){
        $user=$this->userConfirm();

        if ($user == 'lecturer'|| $user=='student'||$user=='admin'){
            if (isset($_POST['courseworkId'])){

                $_SESSION['courseworkId']=$_POST['courseworkId'];

                $_SESSION['courseName']=$this->LmsModel->courseInformation($_POST['courseworkId']);

            }

            if($_SESSION['userType']=='admin'){
                redirect('LmsController/courseView');
            }else{
                if (isset($_POST['enrollmentKey'])){
                    $this->LmsModel->enrollCourse($_SESSION['courseworkId'],$_POST['enrollment'],$_SESSION['regNum']);
                }

                if ($this->LmsModel->alreadyEnroll($_SESSION['courseworkId'],$_SESSION['regNum'])){
                    if ($_SESSION['userType'] == 'student'){
                        redirect('LmsController/stdCourse');
                    }else if ($_SESSION['userType'] == 'lecturer'){
                        redirect('LmsController/courseView');
                    }
                }

                if ($_SESSION['userType'] == 'student'){
                    $this->load->view('student/enrollment');
                }else if ($_SESSION['userType'] == 'lecturer'){
                    $this->load->view('lecturer/enrollment');
                }else{
                    redirect('LmsController/profile');
                }
            }
        }else{
            redirect("LmsController/profile");
        }
    }

    public function courseView(){

        $user=$this->userConfirm();

        if ($user == 'lecturer'|| $user=='admin') {

            if (isset($_SESSION['courseworkId'])) {
                if (isset($_POST['addCourseMaterial'])) {

                    $file = $_FILES['upload_File'];

                    $ext = pathinfo($file['name']);

                    $filename = 'files/' . $_POST['fileName'] . time() . '.' . $ext['extension'];

                    move_uploaded_file($file['tmp_name'], $filename);

                    $this->LmsModel->addCourseMaterial($_POST['type'], $_POST['description'], $_POST['fileName'], $_POST['week'], $_SESSION['courseworkId'], $filename);

                }

                if (isset($_POST['editCourseMaterial'])) {
                    if ($_POST['editUrl'] == "") {

                        unlink($_POST['file_Path']);

                        $file = $_FILES['upload_File_Change'];

                        $ext = pathinfo($file['name']);

                        $filename = 'files/' . $_POST['fileName'] . time() . '.' . $ext['extension'];

                        move_uploaded_file($file['tmp_name'], $filename);

                        $this->LmsModel->editCourseMaterial($_POST['type'], $_POST['description'], $_POST['fileName'], $_POST['week'], $filename, $_POST['old_id']);
                    } else {
                        $this->LmsModel->editCourseMaterialWithoutFile($_POST['type'], $_POST['description'], $_POST['fileName'], $_POST['week'], $_POST['old_id']);
                    }
                }

                if (isset($_POST['removeAssignment'])) {
                    $this->LmsModel->removeAssignment($_POST['assignmentRemove_id']);
                }

                if (isset($_POST['removeCourseMaterial'])) {
                    $this->LmsModel->removeCourseMaterial($_POST['remove_id']);
                }

                if (isset($_POST['addAssignment'])) {
                    if ($_POST['assignmentDocument'] != "") {
                        $file = $_FILES['assignmentFile'];

                        $ext = pathinfo($file['name']);

                        $filename = 'assignment/' . $_POST['assignmentName'] . time() . '.' . $ext['extension'];

                        move_uploaded_file($file['tmp_name'], $filename);
                    } else {
                        $filename = "";
                    }
                    $this->LmsModel->addAssignment($_POST['week'], $_POST['date'], $_POST['description'], $filename, $_POST['assignmentName'], $_SESSION['courseworkId']);
                }

                if (isset($_POST['editAssignment'])) {
                    if ($_POST['assignmentFileUrl'] == "") {

                        unlink($_POST['file_Path']);

                        $file = $_FILES['assignmentFile'];

                        $ext = pathinfo($file['name']);

                        $filename = 'assignment/' . $_POST['assignmentName'] . time() . '.' . $ext['extension'];

                        move_uploaded_file($file['tmp_name'], $filename);

                        $this->LmsModel->editAssignment($_POST['week'], $_POST['date'], $_POST['description'], $_POST['assignmentName'], $filename, $_POST['assignment_id']);
                    } else {
                        $this->LmsModel->editAssignmentWithoutFile($_POST['week'], $_POST['date'], $_POST['description'], $_POST['assignmentName'], $_POST['assignment_id']);
                    }
                }

                if (isset($_POST['addNotices'])) {
                    $this->LmsModel->addNotices($_POST['note'], $_SESSION['courseworkId']);
                }

                if (isset($_POST['editNotices'])) {
                    $this->LmsModel->editNotices($_POST['note'], $_POST['notice_id']);
                }

                if (isset($_POST['removeNotices'])) {
                    $this->LmsModel->removeNotices($_POST['removeNoticeId']);
                }

                $data['material'] = $this->LmsModel->courseMaterialDetails($_SESSION['courseworkId']);

                $data['assignment'] = $this->LmsModel->assignmentDetails($_SESSION['courseworkId']);

                $data['notice'] = $this->LmsModel->noticeDetails($_SESSION['courseworkId']);

                if ($_SESSION['userType'] == 'admin') {
                    $this->load->view('admin/coursework', $data);
                } else if ($_SESSION['userType'] == 'lecturer') {
                    $this->load->view('lecturer/course', $data);
                } else {
                    redirect('LmsController/profile');
                }
            } else {
                redirect('LmsController/coursework');
            }
        }else{
            redirect("LmsController/profile");
        }
    }

    public function stdCourse(){
        $user=$this->userConfirm();

        if ($user=='student') {
            if (isset($_SESSION['courseworkId'])) {
                if (isset($_POST['assignment_id'])) {
                    $_SESSION['std_assignment_id'] = $_POST['assignment_id'];
                    redirect('LmsController/stdAssignment');
                }
                $data['material'] = $this->LmsModel->courseMaterialDetails($_SESSION['courseworkId']);

                $data['assignment'] = $this->LmsModel->assignmentDetails($_SESSION['courseworkId']);

                $data['notices'] = $this->LmsModel->courseNotices($_SESSION['courseworkId']);

                $_SESSION['courseName'] = $this->LmsModel->courseInformation($_SESSION['courseworkId']);

                $this->load->view('student/course', $data);
            } else {
                redirect('LmsController/coursework');
            }
        }else{
            redirect("LmsController/profile");
        }
    }

    public function stdAssignment(){
        $user=$this->userConfirm();

        if ($user=='student') {
            if (isset($_SESSION['std_assignment_id'])) {
                if ($this->LmsModel->submissionDateCheck($_SESSION['std_assignment_id'])) {
                    if (isset($_POST['addSubmission'])) {

                        $file = $_FILES['upload_File'];

                        $ext = pathinfo($file['name']);

                        $filename = 'submission/' . $_SESSION['regNum'] . time() . '.' . $ext['extension'];

                        move_uploaded_file($file['tmp_name'], $filename);

                        $this->LmsModel->addSubmission($filename, $_POST['description'], $_SESSION['std_assignment_id'], $_SESSION['regNum']);
                    }
                    $data['submission'] = $this->LmsModel->submissionDetails($_SESSION['std_assignment_id']);

                    $this->load->view('student/addSubmission', $data);
                } else {
                    redirect('LmsController/stdCourse');
                }
            } else {
                redirect('LmsController/profile');
            }
        }else{
            redirect("LmsController/profile");
        }
    }

    public function myCourse(){
        $user=$this->userConfirm();

        if ($user=='student'||$user == 'lecturer') {
            if (isset($_SESSION['regNum'])) {
                $data['myCourses'] = $this->LmsModel->myCourses($_SESSION['regNum']);

                if ($_SESSION['userType'] == 'student'){
                    $this->load->view('student/myCourse', $data);
                }else if ($_SESSION['userType'] == 'lecturer'){
                    $this->load->view('lecturer/myCourse', $data);
                }
            }
        }else{
            redirect("LmsController/profile");
        }
    }

    public function participants(){
        $user=$this->userConfirm();

        if ($user=='student') {
            if (isset($_SESSION['courseworkId'])) {
                $data['participants'] = $this->LmsModel->participants($_SESSION['courseworkId']);

                $_SESSION['courseName'] = $this->LmsModel->courseInformation($_SESSION['courseworkId']);

                $this->load->view('student/participants', $data);
            } else {
                redirect('LmsController/coursework');
            }
        }else{
            redirect("LmsController/profile");
        }
    }

    public function stdNotification(){
        $user=$this->userConfirm();

        if ($user=='student') {
            $this->LmsModel->notifyUser($_SESSION['regNum']);

            $data['notification'] = $this->LmsModel->notification($_SESSION['regNum']);

            $data['assignments'] = $this->LmsModel->notificationAssignment($_SESSION['regNum']);

            $_SESSION['userNotification'] = null;

            $this->load->view('student/notifications', $data);
        }else{
            redirect("LmsController/profile");
        }
    }

    public function ltrAssignment(){
        $user=$this->userConfirm();

        if ($user == 'lecturer') {

            $data['assignments'] = $this->LmsModel->lecturerAssignment($_SESSION['regNum']);

            $this->load->view('lecturer/assignment', $data);
        }else if($user=='admin'){
            $data['assignments'] = $this->LmsModel->adminAssignment();

            $this->load->view('admin/assignment', $data);
        }else{
            redirect("LmsController/profile");
        }
    }

    public function ltrSubmission(){
        $user=$this->userConfirm();

        if ($user == 'lecturer'||$user=='admin') {
            if (isset($_POST['assignmentId'])) {
                $_SESSION['assignmentId'] = $_POST['assignmentId'];
            }

            $data['submission'] = $this->LmsModel->assignmentSubmission($_SESSION['assignmentId']);

            $_SESSION['assignmentDetails'] = $this->LmsModel->courseAssignment($_SESSION['assignmentId']);

            if ($_SESSION['userType'] == 'admin'){
                $this->load->view('admin/submission', $data);
            }else if ($_SESSION['userType'] == 'lecturer'){
                $this->load->view('lecturer/submission', $data);
            }
        }else{
            redirect("LmsController/profile");
        }
    }

    private function userConfirm(){
        if (isset($_SESSION['user_logged'])&&isset($_SESSION['userType'])){
            if ($_SESSION['user_logged']==true){
                if ($_SESSION['userType']=='admin'){
                    return 'admin';
                }else if ($_SESSION['userType']=='student'){
                    $_SESSION['userNotification']=$this->LmsModel->notificationCheck($_SESSION['regNum']);
                    return 'student';
                }else if ($_SESSION['userType']='lecturer'){
                    return 'lecturer';
                }else{
                    return '';
                }
            }
        }else{
            return '';
        }
    }

}
