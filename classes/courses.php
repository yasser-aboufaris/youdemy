<?php
class Course {
    private $pdo;
    private $id_course;
    private $title;
    private $description;
    private $content;
    private $type;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }
    
    public function readCourses() {
        try {
            $qry = "SELECT * FROM courses";
            $stmt = $this->pdo->prepare($qry);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch(Exception $ex) {
            throw new Exception("Error in readCourse method: " . $ex->getMessage());
        }
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

    public function create() {
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
        return $this;
    }

    public function setTitle($title) {
        $this->title = $title;
        return $this;
    }

    public function setDescription($description) {
        $this->description = $description;
        return $this;
    }

    public function setContent($content) {
        $this->content = $content;
        return $this;
    }

    public function setType($type) {
        $this->type = $type;
        return $this;
}
}