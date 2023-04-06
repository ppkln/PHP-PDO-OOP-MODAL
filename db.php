<?php 

    require_once 'config.php';

    class Database extends Config {
        public function insert($email, $citizenid, $fname, $lname, $sex, $phone, $img) {
            $sql = "INSERT INTO users(email,citizen_id,fname, lname, sex, phone,img) VALUES(:email, :citizenid, :fname, :lname, :sex, :phone, :img)";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                'email' => $email,
                'citizenid' => $citizenid,
                'fname' => $fname,
                'lname' => $lname,
                'sex' => $sex,
                'phone' => $phone,
                'img'=> $img
            ]);
            return true;
        }

        public function read() {
            $sql = "SELECT * FROM users ORDER BY id ASC";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll();
            return $result;
        }

        public function readOne($id) {
            $sql = "SELECT * FROM users WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['id' => $id]);
            $result = $stmt->fetch();
            return $result;
        }

        public function update($id, $fname, $lname, $sex, $phone, $img) {
            $sql = "UPDATE users SET fname = :fname, lname = :lname, sex = :sex, phone = :phone, img = :img WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                'id' => $id,
                'fname' => $fname,
                'lname' => $lname,
                'sex' => $sex,
                'phone' => $phone,
                'img' =>$img
            ]);
            return true;
        }

        public function delete($id) {
            $sql = "DELETE FROM users WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['id' => $id]);
            return true;
        }
    }

?>