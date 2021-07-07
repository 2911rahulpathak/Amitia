<?php
if (isset($_POST['get'])) {
    if (isset($_POST['firstname']) && isset($_POST['contact']) &&
        isset($_POST['nation']) && isset($_POST['addres']) &&
        isset($_POST['donation']) && isset($_POST['gender'])) {
        
        $firstname = $_POST['firstname'];
        $contact = $_POST['contact'];
        $nation = $_POST['nation'];
        $addres = $_POST['addres'];
        $donation = $_POST['donation'];
        $gender = $_POST['gender'];
        // = $_POST'];
        $host = "localhost";
        $dbUsername = "root";
        $dbPassword = "";
        $dbName = "tech11";
        $conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);
        if ($conn->connect_error) {
            
            die('Could not connect to the database.');
        }
        else {
            $Select = "SELECT nation FROM registration3 WHERE nation = ? LIMIT 1";
            $Insert = "INSERT INTO registration3(firstname, contact, nation, addres, donation, gender ) values(?, ?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($Select);
            $stmt->bind_param("s", $nation);
            $stmt->execute();
            $stmt->bind_result($resultnation);
            $stmt->store_result();
            $stmt->fetch();
            $rnum = $stmt->num_rows;
            if ($rnum == 0) {
                $stmt->close();
                $stmt = $conn->prepare($Insert);
                $stmt->bind_param("ssssss",$firstname, $contact, $nation, $addres, $donation, $gender);
                if ($stmt->execute()) {
                    echo "Registered sucessfully.";
                }
                else {
                    echo $stmt->error;
                }
            }
            else {
                echo "Someone already registers using this email.";
            }
            $stmt->close();
            $conn->close();
        }
    }
    else {
        echo "All field are required.";
        die();
    }
}
else {
    echo "register button is not set";
}
?>