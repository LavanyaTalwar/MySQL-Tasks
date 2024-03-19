<?php
    class Name{
        public $firstname;
        public $lastname;
        
        public function __construct($firstname,$lastname){
            $this->firstname = $firstname;
            $this->lastname = $lastname;
        }
        public function move($temp,$dir){
            move_uploaded_file($temp,$dir);
            echo "<img src=$dir height='200px' width ='200px'>";
        }
        public function getname(){
            echo "<p>Hello  " . $this->firstname . "  " . $this->lastname."</p>";
            
        }
        
    }

    if(isset($_POST['submit'])){
       
        $obj = new Name($_POST['fname'],$_POST['lname']);
        $image_size = $_FILES['uploadfile']['size'];
        if($image_size !=0){
            $image = $_FILES['uploadfile']['name'];
            $temp = $_FILES['uploadfile']['tmp_name'];
            $dir = "/images/$image";
            $obj->move($temp,$dir);
        }
        else{
            echo "No image uploaded";
        }
        
        $obj->getname();
    
        
    }

?>