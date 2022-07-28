<?php

    class User {
        private $user_id;
        private $name;
        private $document;
        private $cellPhone;
        private $mail;
        private $adress;
        private $wallet;
        private $password;
        private $registered;
        private $conf_mail;
        private $conf_cel;
        private $type;

        public function __construct($name = null, $cellPhone = null, $mail = null, $password = null, $user_id = null, $document = null, $adress = null, $wallet = null, $registered = null, $conf_mail = null, $conf_cel = null, $type = "User"){
                $this->name = $name;
                $this->cellPhone = $cellPhone;
                $this->mail = $mail;
                $this->password = $password;
                $this->user_id = $user_id;
                $this->document = $document;
                $this->adress = $adress;
                $this->wallet = $wallet;
                $this->registered = $registered;
                $this->conf_mail = $conf_mail;
                $this->conf_cel = $conf_cel;
                $this->type = $type;

        }

        

        /**
         * Get the value of user_id
         */ 
        public function getUser_id()
        {
                return $this->user_id;
        }

        /**
         * Set the value of user_id
         *
         * @return  self
         */ 
        public function setUser_id($user_id)
        {
                $this->user_id = $user_id;

                return $this;
        }
        

        /**
         * Get the value of name
         */ 
        public function getName()
        {
                return $this->name;
        }

        /**
         * Set the value of name
         *
         * @return  self
         */ 
        public function setName($name)
        {
                $this->name = $name;

                return $this;
        }
        

        /**
         * Get the value of document
         */ 
        public function getDocument()
        {
                return $this->document;
        }

        /**
         * Set the value of document
         *
         * @return  self
         */ 
        public function setDocument($document)
        {
                $this->document = $document;

                return $this;
        }

        /**
         * Get the value of cellPhone
         */ 
        public function getCellPhone()
        {
                return $this->cellPhone;
        }

        /**
         * Set the value of cellPhone
         *
         * @return  self
         */ 
        public function setCellPhone($cellPhone)
        {
                $this->cellPhone = $cellPhone;

                return $this;
        }

        /**
         * Get the value of mail
         */ 
        public function getMail()
        {
                return $this->mail;
        }

        /**
         * Set the value of mail
         *
         * @return  self
         */ 
        public function setMail($mail)
        {
                $this->mail = $mail;

                return $this;
        }

        /**
         * Get the value of adress
         */ 
        public function getAdress()
        {
                return $this->adress;
        }

        /**
         * Set the value of adress
         *
         * @return  self
         */ 
        public function setAdress($adress)
        {
                $this->adress = $adress;

                return $this;
        }
        

        /**
         * Get the value of wallet
         */ 
        public function getWallet()
        {
                return $this->wallet;
        }

        /**
         * Set the value of wallet
         *
         * @return  self
         */ 
        public function setWallet($wallet)
        {
                $this->wallet = $wallet;

                return $this;
        }
        

        /**
         * Get the value of password
         */ 
        public function getPassword()
        {
                return $this->password;
        }

        /**
         * Set the value of password
         *
         * @return  self
         */ 
        public function setPassword($password)
        {
                $this->password = $password;

                return $this;
        }
        

        /**
         * Get the value of registered
         */ 
        public function getRegistered()
        {
                return $this->registered;
        }

        /**
         * Set the value of registered
         *
         * @return  self
         */ 
        public function setRegistered($registered)
        {
                $this->registered = $registered;

                return $this;
        }
        

        /**
         * Get the value of conf_mail
         */ 
        public function getConf_mail()
        {
                return $this->conf_mail;
        }

        /**
         * Set the value of conf_mail
         *
         * @return  self
         */ 
        public function setConf_mail($conf_mail)
        {
                $this->conf_mail = $conf_mail;

                return $this;
        }


        /**
         * Get the value of conf_cel
         */ 
        public function getConf_cel()
        {
                return $this->conf_cel;
        }

        /**
         * Set the value of conf_cel
         *
         * @return  self
         */ 
        public function setConf_cel($conf_cel)
        {
                $this->conf_cel = $conf_cel;

                return $this;
        }
        

        /**
         * Get the value of type
         */ 
        public function getType()
        {
                return $this->type;
        }

        /**
         * Set the value of type
         *
         * @return  self
         */ 
        public function setType($type)
        {
                $this->type = $type;

                return $this;
        }
        
    }