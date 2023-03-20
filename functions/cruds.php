<?php

class crud
{
    private $db;

    function __construct($conn)
    {
        $this->db = $conn;
    }

    public function create_admin($email, $firstName, $Surname, $password)
    {
        try {
            $result = $this->checkAdmin($email);

            if ($result->rowCount() > 0) {
                return false;
            } else {
                $sql = "INSERT INTO `admins` (`email`,`firstName`,`Surname`,`password`) VALUES
             (:email,:firstName,:Surname,:password) ";

                $stmt = $this->db->prepare($sql);

                $stmt->bindParam(':email', $email);
                $stmt->bindParam(':firstName', $firstName);
                $stmt->bindParam(':Surname', $Surname);
                $stmt->bindParam(':password', $password);

                $stmt->execute();
                return true;
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function checkAdmin($email)
    {
        try {
            $sql = "SELECT * FROM admins WHERE email = :email";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            return $stmt;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function loginAdmin($email, $password)
    {
        try {
            $sql = "SELECT * FROM admins WHERE email = ? AND password = ?";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$email, $password]);

            if ($stmt->rowCount() > 0) {
                $details = $stmt->fetch();
                // $details = $stmt->fetch(PDO::FETCH_ASSOC);
                $_SESSION['adminID'] = $details['adminID'];
                return $details;
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function adminDetails($id)
    {
        try {
            $sql = "SELECT * FROM admins WHERE adminID = $id";
            $result = $this->db->query($sql);
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function update_Admin($id, $firstname, $surname, $email)
    {
        try {
            $sql = "UPDATE admins SET firstName = :firstname, Surname = :Surname, email = :email WHERE adminID = :adminID";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam('adminID', $id);
            $stmt->bindParam(':firstname', $firstname);
            $stmt->bindParam(':Surname', $surname);
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function admins()
    {
        try {
            $sql = "SELECT * FROM admins";
            $result = $this->db->query($sql);
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function delete_Admin($id)
    {
        try {
            $sql = "DELETE FROM admins WHERE adminID = :adminID";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':adminID', $id);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function show_Students()
    {
        try {
            $sql = "SELECT studentID,firstname,othername,surname,house,department_id,class,sex,dept_id,name FROM students LEFT JOIN department ON department_id = dept_id";
            $result = $this->db->query($sql);
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function checkStudent($firstname, $othername, $surname, $house, $department, $class, $sex)
    {
        try {
            $sql = "SELECT * FROM students WHERE `firstname` = :firstname, othername = :othername, surname = :surname, house = :house,
             department = :department, class = :class, sex = :sex";
            $stmt = $this->db->prepare($sql);

            $stmt->bindParam(':firstname', $firstname);
            $stmt->bindParam(':othername', $othername);
            $stmt->bindParam(':surname', $surname);
            $stmt->bindParam(':department', $department);
            $stmt->bindParam(':class', $class);
            $stmt->bindParam(':house', $house);
            $stmt->bindParam(':sex', $sex);
            $stmt->execute();
            // $stmt->execute([$firstname, $othername, $surname, $house, $department, $class, $sex]);
            return $stmt;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function addStudent($firstname, $othername, $surname, $house, $department, $class, $uniqueCode, $sex)
    {
        try {
            $stmt = $this->checkStudent($firstname, $othername, $surname, $house, $department, $class, $sex);

            if($stmt->rowCount() > 0) {
                return false;
            } else {
                $sql = "INSERT INTO students (firstname,othername,surname,house,department,class,uniqueCode,sex)
            VALUES (:firstname,:othername,:surname,:house,:department,:class,:uniqueCode,:sex)";

                $stmt = $this->db->prepare($sql);
                $stmt->bindParam(':firstname', $firstname);
                $stmt->bindParam(':othername', $othername);
                $stmt->bindParam(':surname', $surname);
                $stmt->bindParam(':house', $house);
                $stmt->bindParam(':department', $department);
                $stmt->bindParam(':class', $class);
                $stmt->bindParam(':uniqueCode', $uniqueCode);
                $stmt->bindParam(':sex', $sex);

                $stmt->execute();
                return true;
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function student_details($id)
    {
        try {
            $sql = "SELECT * FROM students WHERE studentID = $id";
            $result = $this->db->query($sql);
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function addDepartment($name)
    {
        try {
            $stmt = $this->checkDepartment($name);

            if ($stmt->rowCount() > 0) {
                return false;
            } else {
                $sql = "INSERT INTO department (`name`) VALUE (:name)";
                $stmt = $this->db->prepare($sql);
                $stmt->bindParam(':name', $name);
                $stmt->execute();
                return true;
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function checkDepartment($name)
    {
        try {
            $sql = "SELECT * FROM department WHERE `name` = :name";
            $stmt = $this->db->prepare($sql);

            $stmt->bindParam(':name', $name);
            $stmt->execute();
            return $stmt;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function department()
    {
        try {
            $sql = "SELECT * FROM department";
            $result = $this->db->query($sql);
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function delete_dept($id)
    {
        try {
            $sql = "DELETE FROM department WHERE dept_id = :departmentID";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':departmentID', $id);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function dept_details($id)
    {
        try {
            $sql = "SELECT * FROM department WHERE dept_id = $id";
            $result = $this->db->query($sql);
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function update_dept($id, $name)
    {
        try {
            $stmt = $this->checkDepartment($name);

            if ($stmt->rowCount() > 0) {
                return false;
            } else {
                $sql = "UPDATE department SET `name` = :name WHERE dept_id = :departmentID";
                $stmt = $this->db->prepare($sql);
                $stmt->bindParam('departmentID', $id);
                $stmt->bindParam(':name', $name);
                $stmt->execute();
                return true;
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
}

function sanitizeInput($data)
{
    try {
        $data = trim($data, " ");
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    } catch (PDOException $e) {
        echo $e->getMessage();
        return false;
    }
}
