<?php
    class Gallery {
        private $id;
        public $title;
        public $path;
        public $likes;
        public $date;


        public function __construct($id = null, $title=null, $path=null, $likes = null, $date=null){
                
                $this->id = $id;
                $this->title = $title;
                $this->path = $path;
                $this->date = $date;
                $this-> likes = $likes;
        }


        /**
         * Get the value of id
         */ 
        public function getId()
        {
                return $this->id;
        }

        /**
         * Set the value of id
         *
         * @return  self
         */ 
        public function setId($id)
        {
                $this->id = $id;

                return $this;
        }
        

        /**
         * Get the value of title
         */ 
        public function getTitle()
        {
                return $this->title;
        }

        /**
         * Set the value of title
         *
         * @return  self
         */ 
        public function setTitle($title)
        {
                $this->title = $title;

                return $this;
        }

        
        /**
         * Get the value of path
         */ 
        public function getPath()
        {
                return $this->path;
        }

        /**
         * Set the value of path
         *
         * @return  self
         */ 
        public function setPath($path)
        {
                $this->path = $path;

                return $this;
        }


        /**
         * Get the value of likes
         */ 
        public function getLikes()
        {
                return $this->likes;
        }

        /**
         * Set the value of likes
         *
         * @return  self
         */ 
        public function setLikes($likes)
        {
                $this->likes = $likes;

                return $this;
        }


        /**
         * Get the value of date
         */ 
        public function getDate()
        {
                return $this->date;
        }

        /**
         * Set the value of date
         *
         * @return  self
         */ 
        public function setDate($date)
        {
                $this->date = $date;

                return $this;
        }
        
    }