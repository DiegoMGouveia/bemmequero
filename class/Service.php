<?php

    class Service {

        private $serviceID;
        private $name;
        private $price;
        private $description;
        private $promotion;
        private $imagem;

        public function __construct($name, $price, $description, $imagem = null, $promotion = null, $serviceID = null, $adress = null, $wallet = null, $registered = null, $conf_mail = null, $conf_cel = null, $type = "User"){
                
                $this->serviceID = $serviceID;
                $this->name = $name;
                $this->price = $price;
                $this->description = $description;
                $this->promotion = $promotion;
                $this->imagem = $imagem;
        }

        
        
        

        /**
         * Get the value of serviceID
         */ 
        public function getServiceID()
        {
                return $this->serviceID;
        }

        /**
         * Set the value of serviceID
         *
         * @return  self
         */ 
        public function setServiceID($serviceID)
        {
                $this->serviceID = $serviceID;

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
         * Get the value of price
         */ 
        public function getPrice()
        {
                return $this->price;
        }

        /**
         * Set the value of price
         *
         * @return  self
         */ 
        public function setPrice($price)
        {
                $this->price = $price;

                return $this;
        }
        

        /**
         * Get the value of description
         */ 
        public function getDescription()
        {
                return $this->description;
        }

        /**
         * Set the value of description
         *
         * @return  self
         */ 
        public function setDescription($description)
        {
                $this->description = $description;

                return $this;
        }
        

        /**
         * Get the value of promotion
         */ 
        public function getPromotion()
        {
                return $this->promotion;
        }

        /**
         * Set the value of promotion
         *
         * @return  self
         */ 
        public function setPromotion($promotion)
        {
                $this->promotion = $promotion;

                return $this;
        }
        

        /**
         * Get the value of imagem
         */ 
        public function getImagem()
        {
                return $this->imagem;
        }

        /**
         * Set the value of imagem
         *
         * @return  self
         */ 
        public function setImagem($imagem)
        {
                $this->imagem = $imagem;

                return $this;
        }

    }