<?php 
    class crud{
        private $db;
        private $db_name;

        function __construct($conn, $db) {
            $this->db = $conn;
            $this->db_name = $db;
        }
        
        public function insert($fname, $lname, $dob, $email, $phone, $specialty, $dest_file) {
            try {
                $sql = "INSERT INTO " . $this->db_name . ".register (fname, lname, dob, email, phone,specialty_id, avatar_path) VALUES (:fname,:lname,:dob,:email,:phone,:specialty,:dest)";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':fname',$fname);
                $stmt->bindparam(':lname',$lname);
                $stmt->bindparam(':dob',$dob);
                $stmt->bindparam(':email',$email);
                $stmt->bindparam(':phone',$phone);
                $stmt->bindparam(':specialty',$specialty);
                $stmt->bindparam(':dest',$dest_file);

                $stmt->execute();
                return true;
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

        public function update($id, $fname, $lname, $dob, $email, $phone, $specialty) {
            try {
                $sql = "UPDATE " . $this->db_name . ".register SET `fname`=:fname,`lname`=:lname,`dob`=:dob,`email`=:email,`phone`=:phone,`specialty_id`=:specialty WHERE id=:id";
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

        public function updateAvatar($id, $dest) {
            try {
                $sql = "UPDATE " . $this->db_name . ".register SET `avatar_path`=:avatar WHERE id=:id";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':avatar',$dest);
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
                $sql = 'SELECT * FROM ' . $this->db_name . '.register a inner join ' . $this->db_name . '.specialties s on a.specialty_id = s.specialty_id';
                $result = $this->db->query($sql);
                return $result;
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }
        public function getSpecialties() {
            try {
                $sql = 'SELECT * FROM ' . $this->db_name . '.specialties';
                $result = $this->db->query($sql);
                return $result;
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

        public function deleteRecord($id) {
            try {
                $sql = 'DELETE FROM ' . $this->db_name . '.register WHERE id=:id';
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':id',$id);
                $stmt->execute();
                return true;
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

        public function deleteAvatar($id) {
            try {
                $sql = 'UPDATE ' . $this->db_name . '.register SET avatar_path="" WHERE id=:id';
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
                $sql = 'SELECT * FROM ' . $this->db_name . '.register a inner join ' . $this->db_name . '.specialties s on a.specialty_id = s.specialty_id where id=:id';
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

        public function getAvatarlink($id) {
            try {
                $sql = 'SELECT avatar_path FROM ' . $this->db_name . '.register where id=:id';
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