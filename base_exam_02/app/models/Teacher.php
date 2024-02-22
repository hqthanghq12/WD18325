<?php
//require_once 'app/models/BaseModel.php';
namespace App\Models;
class Teacher extends BaseModel{
    public function getListTeacher() {
        $sql = "select * from teacher";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }
    public function addTeacher($id, $name, $email, $salary, $school){
        $sql = "INSERT INTO teacher VALUES (?, ?, ?, ?, ?)";
        $this->setQuery($sql);
        return $this->execute([$id, $name, $email, $salary, $school]);
    }
    public function deleteTeacher($id){
        $sql = "DELETE FROM teacher WHERE id = ?";
        $this->setQuery($sql);
        return $this->execute([$id]);
    }
}

?>