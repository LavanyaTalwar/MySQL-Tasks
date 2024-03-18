<?php
    class Name{
        public $firstname;
        public $lastname;

        public function __construct($firstname,$lastname){
            $this->firstname = $firstname;
            $this->lastname = $lastname;
        }
        
        public function getname(){
            echo "<p>Hello  " . $this->firstname . "  " . $this->lastname."</p>";
            
        } 
    }

    if(isset($_POST['submit'])){
        $obj = new Name($_POST['fname'],$_POST['lname']);
        $obj->getname();
    }

?>