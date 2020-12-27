<?php 
    class crud{
        private $db;

        function __construct($conn) {
            $this->db = $conn;
        }
        
        public function insert($fname, $lname, $dob, $email, $phone, $specialty) {
            try {
                $sql = "INSERT INTO site1_db.register (fname, lname, dob, email, phone,specialty_id) VALUES (:fname,:lname,:dob,:email,:phone,:specialty)";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':fname',$fname);
                $stmt->bindparam(':lname',$lname);
                $stmt->bindparam(':dob',$dob);
                $stmt->bindparam(':email',$email);
                $stmt->bindparam(':phone',$phone);
                $stmt->bindparam(':specialty',$specialty);

                $stmt->execute();
                return true;
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

        public function update($id, $fname, $lname, $dob, $email, $phone, $specialty) {
            try {
                $sql = "UPDATE site1_db.register SET `fname`=:fname,`lname`=:lname,`dob`=:dob,`email`=:email,`phone`=:phone,`specialty_id`=:specialty WHERE id=:id";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':fname',$fname);
                $stmt->bindparam(':lname',$lname);
                $stmt->bindparam(':dob',$dob);
                $stmt->bindparam(':email',$email);
                $stmt->bindparam(':phone',$phone);
                $stmt->bindparam(':specialty',$specialty);
                $stmt->bindparam(':id',$id);
                
                $stmt->execute();
                return true;
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

        public function getRecords() {
            try {
                $sql = 'SELECT * FROM site1_db.register a inner join site1_db.specialties s on a.specialty_id = s.specialty_id';
                $result = $this->db->query($sql);
                return $result;
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }
        public function getSpecialties() {
            try {
                $sql = 'SELECT * FROM site1_db.specialties';
                $result = $this->db->query($sql);
                return $result;
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

        public function deleteRecord($id) {
            try {
                $sql = 'DELETE FROM site1_db.register WHERE id=:id';
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':id',$id);
                $stmt->execute();
                return true;
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

        public function viewRecord($id) {
            try {
                $sql = 'SELECT * FROM site1_db.register a inner join site1_db.specialties s on a.specialty_id = s.specialty_id where id=:id';
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':id', $id);
                $stmt->execute();
                $result = $stmt->fetch();
                return $result;
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }
    }
?>