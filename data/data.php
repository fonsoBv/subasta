<?php

class Data {

    public $server;
    public $user;
    public $password;
    public $db;
    public $connection;
    public $isActive;

    /* constructor */

    public function Data() {

        $hostName = gethostname();
        
        switch ($hostName) {
            case "SILVIA": //Office's PC
                $this->isActive = false;
                $this->server = "localhost";
                $this->user = "root";
                $this->password = "";
                $this->db = "dbsubasta";
                break;
            case "fonso-VirtualBox": //Office's PC
                $this->isActive = false;
                $this->server = "localhost";
                $this->user = "root";
                $this->password = "";
                $this->db = "dbsubasta";
                break;
            case "johan-VirtualBox": //Office's PC
                $this->isActive = false;
                $this->server = "localhost";
                $this->user = "root";
                $this->password = "";
                $this->db = "bdsubasta";
                break;
            case "DESKTOP-PF38PII": //Office's PC
                $this->isActive = false;
                $this->server = "localhost";
                $this->user = "root";
                $this->password = "";
                $this->db = "bdsubasta";
                break;
            case "danny-GP62MVR-6RF": //laptop's PC
                $this->isActive = false;
                $this->server = "127.0.0.1";
                $this->user = "root";
                $this->password = "";
                $this->db = "dbsubasta";
                break;
	    case "sekekepa": //laptop's PC
                $this->isActive = false;
                $this->server = "127.0.0.1";
                $this->user = "root";
                $this->password = "";
                $this->db = "dbsubasta";
                break;
            default: //Hosting
                 $this->isActive = false;
                 $this->server = "x.x.x.x";
                 $this->user = "xxxxxxx";
                 $this->password = "xxxxxxx";
                 $this->db = "xxxxxxxxxx";
                break;
        }//end switch

    }//constructor
    
}//end class

?>
