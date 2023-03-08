<?php
    $name = $_POST['name'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];

    //databased connection code 
    $conn = new mysqli('localhost','root','','singleproperty');
    if($conn->connect_error){
        die('Connection Failed :'.$conn->connect_error);
    }else{
        $stmt = $conn->prepare("insert into contact(name,lastname,email,phone,message)
        values(?, ?, ?, ?, ?)");
        $stmt->bind_param("sssis", $name, $lastname, $email, $phone, $message);
        $stmt->execute();
        echo "registration Successfully....";
        $stmt->close();
        $conn->close();
    }

?>