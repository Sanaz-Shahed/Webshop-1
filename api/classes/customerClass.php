<?php 
class customer {
    public $ID;
    public $Password;
    public $Name;
    public $Phone;
    public $Email;
    public $Adress;
    public $LoginUser;

    function __construct($ID, $Password, $Name, $Phone, $Email, $Adress, $LoginUser)
    {
        $this->ID = $ID;
        $this->Password = $Password;
        $this->Name = $Name;
        $this->Phone = $Phone;
        $this->Email = $Email;
        $this->Adress = $Adress;
        $this->LoginUser = $LoginUser;
    }

};

$userArray = array($ID, $Password, $Name, $Phone, $Mail, $Adress, $LoginUser);
 

?>