<?php
    /**
     * @author Daniel Marín López
     * @version 0.01a
     * 
     */

    namespace App\Models;

    class Usuario{
        private $user;
        private $passwd;

        private function testInput($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        public function __construct($user, $passwd) {
            $this->setUser($user);
            $this->setPasswd($passwd);
        }

        public function getUser() {
            return $this->user;
        }
    
        public function setUser($user) {
            $user = $this->testInput($user);
            $this->user = $user;
        }

        public function getPasswd() {
            return $this->passwd;
        }
    
        public function setPasswd($passwd) {
            $passwd = $this->testInput($passwd);
            $this->passwd = $passwd;
        }
    }


?>