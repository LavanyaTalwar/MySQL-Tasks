<?php
    class Name{
        public $firstname;
        public $lastname;
        public $content = "";
        public function __construct($firstname,$lastname){
            $this->firstname = $firstname;
            $this->lastname = $lastname;
        }
        public function move($temp,$dir){
            move_uploaded_file($temp,$dir);
            $this->content.= "<img src=$dir height='200px' width ='200px'>";
        }
        public function sub_marks($marks){
            $lines = explode("\n",$marks);
                $this->content.= "<table>";
                $this->content.= "<tr>
                <th>'Subject'</th>
                <th>'Marks'</th>
                </tr>";
                foreach ($lines as $x){
                    $a = explode("|",$x);
                    $this->content.= "\n";
                    $a[1] = trim($a[1]);

                    if(!preg_match("/^[a-zA-Z\s]*$/",$a[0])) {
                        $this->content.= "incorrect format of sub names";
                
                    }
                    elseif(!preg_match("/^[0-9]+$/",$a[1])){
                        $this->content.= "<br>";
                        $this->content.= "incorrect format of sub marks";
                    }
                    else{
                        $this->content.= "<tr><td>".$a[0]."</td>
                        <td>".$a[1]."</td></tr>";
                    }
                    
                }
                
                $this->content.= "</table>";
        }
        public function getname(){
            $this->content.= "<p>Hello  " . $this->firstname . "  " . $this->lastname."</p>";
            
        }
        public function mobile($phone){
            if(preg_match('/^\+91[0-9]{10}$/', $phone)){
                $this->content.= "<p>".$phone."</p>";   
             }
            else{
                $this->content.= "incorrect phone no.";
            }
        }
        public function email($email,$api_key){
            $curl = curl_init();
                
                curl_setopt_array($curl, [
                CURLOPT_URL => "https://emailvalidation.abstractapi.com/v1/?api_key=$api_key&email=$email",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "GET",
                ]);

                $response = curl_exec($curl);
                $err = curl_error($curl);

                curl_close($curl);
                $data = json_decode($response,true);
                if ($data['is_valid_format'] && $data['is_smtp_valid'] && $data['autocorrect'] =='') {
                    $this->content.= "<br>Email is valid: $email<br><br>";
                  } else {
                    $this->content.= "<br>Email is not valid <br><br>";
                  }
            }
    }

    if(isset($_POST['submit'])){
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=exporttoword.doc");
        header("Pragma: no-cache");
        header("Expires: 0");
        $obj = new Name($_POST['fname'],$_POST['lname']);
        $image_size = $_FILES['uploadfile']['size'];
        if($image_size !=0){
            $image = $_FILES['uploadfile']['name'];
            $temp = $_FILES['uploadfile']['tmp_name'];
            $dir = "/var/www/task1.com/html/images/$image";
            echo $obj->move($temp,$dir);
        }
        else{
            echo "No image uploaded";
        }
        
        echo $obj->getname();
        $marks = $_POST['marks'];
        if(!empty($marks)){
            $obj->sub_marks($marks);
        }
        else{
            echo "No Marks Entered";
        }

        if(isset($_POST['phone'])){
            $obj->mobile($_POST['phone']);
        }
        else{
            echo "Please enter phone no.";
        }

        $api_key = "52c2497faf1042cf99f24f1e97995eab";
        $email = $_POST['email'];
        if(isset($_POST['email'])){
            $obj->email($email,$api_key);
        }
        else{
            echo "Please enter your email";
        }

        echo $obj->content;
        $title ='myPost.doc';
                   
                
                
        $fh = fopen($title, "w");
        fwrite($fh,$obj->content);
                
                
        fclose($fh);
    }

?>