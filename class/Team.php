<?php

class Team
{
    private $teamID;
    private $name;
    private $path;
    private $facebook;
    private $whats;
    private $instagram;
    private $ocupation;

    public function __construct($teamID=null, $name=null, $path=null, $facebook=null, $whats=null, $instagram=null, $ocupation=null)
    {
        
        $this->teamID = $teamID;
        $this->name = $name;
        $this->path = $path;
        $this->facebook = $facebook;
        $this->whats = $whats;
        $this->instagram = $instagram;
        $this->ocupation = $ocupation;

    }

    

    /**
     * Get the value of teamID
     */ 
    public function getTeamID()
    {
        return $this->teamID;
    }

    /**
     * Set the value of teamID
     *
     * @return  self
     */ 
    public function setTeamID($teamID)
    {
        $this->teamID = $teamID;

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
     * Get the value of facebook
     */ 
    public function getFacebook()
    {
        return $this->facebook;
    }

    /**
     * Set the value of facebook
     *
     * @return  self
     */ 
    public function setFacebook($facebook)
    {
        $this->facebook = $facebook;

        return $this;
    }

    

    /**
     * Get the value of whats
     */ 
    public function getWhats()
    {
        return $this->whats;
    }

    /**
     * Set the value of whats
     *
     * @return  self
     */ 
    public function setWhats($whats)
    {
        $this->whats = $whats;

        return $this;
    }



    /**
     * Get the value of instagram
     */ 
    public function getInstagram()
    {
        return $this->instagram;
    }

    /**
     * Set the value of instagram
     *
     * @return  self
     */ 
    public function setInstagram($instagram)
    {
        $this->instagram = $instagram;

        return $this;
    }

    /**
     * Get the value of ocupation
     */ 
    public function getOcupation()
    {
        return $this->ocupation;
    }

    /**
     * Set the value of ocupation
     *
     * @return  self
     */ 
    public function setOcupation($ocupation)
    {
        $this->ocupation = $ocupation;

        return $this;
    }
}