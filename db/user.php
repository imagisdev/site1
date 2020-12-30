<?php 

    class user{
        private $db;
        private $db_name;

        function __construct($conn, $db) {
            $this->db = $conn;
            $this->db_name = $db;
        }

        public function insertUser($username, $password){
            try {
                $result = $this->getUsername($username);
                if($result['num'] > 0) {
                    return false;
                } else {
                    $new_password = md5($password . $username);
                    $sql = "INSERT INTO " . $this->db_name . ".users (username, password) VALUES (:username,:password)";
                    $stmt = $this->db->prepare($sql);
                    $stmt->bindparam(':username',$username);
                    $stmt->bindparam(':password',$new_password);
                    $stmt->execute();
                    return true;
                }
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

        public function getUser($username, $password){
            try {
                $sql = 'SELECT * FROM ' . $this->db_name . '.users where username=:u and password=:p';
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':u', $username);
                $stmt->bindparam(':p', $password);
                $stmt->execute();
                $result = $stmt->fetch();
                return $result;
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

        public function getUsername($username){
            try {
                $sql = 'SELECT count(*) as num FROM ' . $this->db_name . '.users where username=:u';
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':u', $username);
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