<?php

    class ModelAuthentification{

        private $con;

        public function __construct($con) {
            $this->con = $con;
        }

        public function getUserByEmailAndPassword($Email,$Password){

            $Email = $this->con->quote($Email);
            $Password = $this->con->quote($Password);

            $sql = "SELECT * FROM users WHERE email = $Email AND password = $Password";

            $PDOStat = $this->con->query($sql);
            return $PDOStat->fetch();

        }

        public function checkEmail($Email){
            $Email = $this->con->quote($Email);
            
            $sql = "SELECT email FROM users WHERE email = $Email";
            
            $PDOStat = $this->con->query($sql);
            return $PDOStat->fetch();
        }
        
        public function getNomByEmail($email){
            
            $email = $this->con->quote($email);
            $sql = "SELECT nom FROM users WHERE email = $email";
            $PDOStat = $this->con->query($sql);
            return $PDOStat->fetch();

        }

        public function changePassword($password, $email){

            $email = $this->con->quote($email);
            $password = $this->con->quote($password);

            $sql = "UPDATE users SET password = $password WHERE email = $email";

            $this->con->exec($sql);

        }

        public function addUser($nom, $prenom, $email, $password){

            $nom = $this->con->quote($nom);
            $prenom = $this->con->quote($prenom);
            $email = $this->con->quote($email);
            $password = $this->con->quote($password);            

            $sql = "INSERT INTO users(nom, prenom, email, password) values($nom, $prenom, $email, $password)";
            $this->con->exec($sql);

        }
    
    }

