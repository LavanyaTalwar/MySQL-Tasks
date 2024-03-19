<?php
if (isset($_POST['submit'])) {
    $servername = "localhost";
    $username = "lavanya";
    $password = "password";
    $uname = $_POST['username'];
    $pass = $_POST['pass'];
    $hashedpass=(password_hash($pass, PASSWORD_DEFAULT));
    $repass=$_POST['repass'];
    $email = $_POST['email'];
    $api_key = "8a8f7b1af8a248479d7db7538efcc291";
    $dbname = 'php_sql';


    $conn = mysqli_connect($servername, $username, $password, $dbname);

    if (mysqli_connect_error()) {
        die('Database not connected :' . mysqli_connect_error());
    }

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
    $data = json_decode($response, true);
    if (($data['is_valid_format']['value'] && $data['is_smtp_valid']['value']) && ($data['autocorrect'] == "")) {

        if($pass!=$repass){
            echo "Both password entries does not match";
        }

        else{

        $sql = "INSERT INTO credentials VALUES('$uname','$hashedpass','$email',NULL)";
       
        try{
            $res = $conn->query($sql);
        if ($res) {
            echo "Data inserted successfully";
        } else {
            die('Error in adding data');
        }}
        catch (mysqli_sql_exception $e) {

            $error="Error: " . $e->getMessage();
             echo "<script>alert(". json_encode($error).");
             window.location.href='/signup.php'</script>";
        
        }
    } 
}
else {
        echo "<br>Email is not valid<br><br>";
    }
}
?>