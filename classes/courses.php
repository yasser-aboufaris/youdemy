<?php
class Course {
    private $pdo;
    private $id_course;
    private $title;
    private $description;
    private $content;
    private $type;
    private $categorie;
    private $teacher;
    private $tags;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }
    

    public static function readCourses($pdo){
        $qry = "
            SELECT * 
            FROM courses 
            left join categories 
            ON courses.id_categorie = categories.id_categorie
            left join users on users.id_user = courses.id_teacher;

        ";
        $stmt = $pdo->prepare($qry);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $courses = [];
        
        foreach($data as $row){
            $object = new self($pdo);
            $object->setId($row['id_course']);
            $object->setTitle($row['title']);
            $object->setDescription($row['description']);
            $object->setContent($row['content']);
            $object->setTeacher($row['user_name']);
            $object->setCategorie($row['categorie_name']);
            array_push($courses, $object);
        }
        return $courses;
    }

    public static function readCoursesByCategorie($pdo, $id_categorie) {
        $qry = "
            SELECT * 
            FROM courses 
            LEFT JOIN categories 
            ON courses.id_categorie = categories.id_categorie
            LEFT JOIN users 
            ON users.id_user = courses.id_teacher
            WHERE courses.id_categorie = :id_categorie
        ";
    
        $stmt = $pdo->prepare($qry);
        $stmt->bindParam(':id_categorie', $id_categorie);
    
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $courses = [];
    
        foreach ($data as $row) {
            $object = new self($pdo); 
            $object->setId($row['id_course']);
            $object->setTitle($row['title']);
            $object->setDescription($row['description']);
            $object->setContent($row['content']);
            $object->setTeacher($row['user_name']);
            $object->setCategorie($row['categorie_name']);
            array_push($courses, $object);
        }
        return $courses;
    }
    



    public static function readCoursesByPagination($pdo, $limit = 6, $offset = 0) {
        $qry = "
            SELECT * FROM courses 
            LEFT JOIN 
            categories  ON 
            courses.id_categorie = categories.id_categorie 
            LEFT JOIN users 
            ON users.id_user = courses.id_teacher 
            LIMIT :offset, :limit
        ";
        
        $stmt = $pdo->prepare($qry);
        $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);  // Fixed bindParam and added type
        $stmt->bindParam(':offset', $offset, PDO::PARAM_INT); // Fixed bindParam and added type
        $stmt->execute();
        
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $courses = [];
        foreach ($data as $row) {
            $object = new self($pdo);
            $object->setId($row['id_course']);
            $object->setTitle($row['title']);
            $object->setDescription($row['description']);
            $object->setContent($row['content']);
            $object->setTeacher($row['user_name']);
            $object->setCategorie($row['categorie_name']);
            
            array_push($courses, $object);
        }
        return $courses;
    }


    public static function readCoursesByTeacher($pdo,$id_teacher){
        $qry = "
            SELECT * 
            FROM courses 
            left join categories 
            ON courses.id_categorie = categories.id_categorie
            left join users on users.id_user = courses.id_teacher
            where id_teacher = :id_yeacher
            ;

        ";
        $stmt = $pdo->prepare($qry);
        $stmt->bindParam(":id_teacher",$id_teacher);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $courses = [];
        
        foreach($data as $row){
            $object = new self($pdo);
            $object->setId($row['id_course']);
            $object->setTitle($row['title']);
            $object->setDescription($row['description']);
            $object->setContent($row['content']);
            $object->setTeacher($row['user_name']);
            $object->setCategorie($row['categorie_name']);
            array_push($courses, $object);
        }
        return $courses;
    }
    

    public function delete() {
        try {
            $qry = "DELETE FROM courses WHERE id_course = :id_course";
            $stmt = $this->pdo->prepare($qry);
            $stmt->bindParam(":id_course", $this->id_course);
            $stmt->execute();
        } catch(Exception $ex) {
            throw new Exception("Error in delete method: " . $ex->getMessage());
        }
    }   



    public function update() {
        try {
            $qry = "UPDATE courses 
                    SET course_title = :title,
                        course_description = :description,
                        course_content = :content
                    WHERE id_course = :id_course";
            $stmt = $this->pdo->prepare($qry);
            $stmt->bindParam(":title", $this->title);
            $stmt->bindParam(":description", $this->description);
            $stmt->bindParam(":content", $this->content);
            $stmt->bindParam(":id_course", $this->id_course);
            $stmt->execute();
        } catch(Exception $ex) {
            throw new Exception("Error in update method: " . $ex->getMessage());
        }
    }

    public function insert() {
        try {
            $qry = "INSERT INTO courses (course_title, course_description, course_content, course_type)
                    VALUES (:title, :description, :content, :type)";
            $stmt = $this->pdo->prepare($qry);
            $stmt->bindParam(":title", $this->title);
            $stmt->bindParam(":description", $this->description);
            $stmt->bindParam(":content", $this->content);
            $stmt->bindParam(":type", $this->type);
            $stmt->execute();
        } catch(Exception $ex) {
            throw new Exception("Error in create method: " . $ex->getMessage());
        }
    }



//µ///////////////////////////////////////////////
    public function getId() {
        return $this->id_course;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getContent() {
        return $this->content;
    }

    public function getType() {
        return $this->type;
    }


////////////////////////////////////////////////////////////////////////////////
    public function setId($id) {
        $this->id_course = $id;
    }

    public function setId($tags) {
        $this->tags = $tags;
    }

    public function setTitle($title) {
        $this->title = $title;
        return $this;
    }

    public function setDescription($description) {
        $this->description = $description;
    }

    public function setContent($content) {
        $this->content = $content;
    }

    public function setType($type) {
        $this->type = $type;
}



public function getCategorie() {
    return $this->categorie;
}


public function setCategorie($categorie) {
    $this->categorie = $categorie;
}



public function getTeacher() {
    return $this->teacher;
}


public function setTeacher($teacher) {
    $this->teacher = $teacher;
}
}