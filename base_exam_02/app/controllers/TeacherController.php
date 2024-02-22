<?php
namespace  App\Controllers;
//include_once 'app/models/Teacher.php';
//include_once 'app/controllers/BaseController.php';
use App\Models\Teacher;
class TeacherController extends BaseController{
    public $teacher;
    public function __construct()
    {
        $this->teacher = new Teacher();
    }

    public function getTeacher() {
        $teachers = $this->teacher->getListTeacher();
        return $this->render('teacher.index',compact('teachers'));
    }
    public function addTeacher(){
        return $this->render('teacher.add');
    }
    public function postTeacher(){
        if(isset($_POST['btn-submit'])){
            $error = [];
            if(empty($_POST['name'])){
                $error[] = "Bạn phải nhập tên";
            }
            if(count($error)>=1){
                redirect('errors', $error, 'add-teacher');
            }else{
                $check = $this->teacher->addTeacher(NULL, $_POST['name'], $_POST['email'], $_POST['salary'], $_POST['school']);
                redirect('success', "Thêm thành công", 'add-teacher');
            }
        }
    }
    public function deleteTeacher($id){
        $check = $this->teacher->deleteTeacher($id);
        if($check){
            redirect('success',  "Xóa thành công", 'list-teacher');
        }
    }
}
