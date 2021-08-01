<?php
if (isset($_POST['register'])) {
    if (isset($_POST['nameofthepatient']) && isset($_POST['contactnumber']) &&
        isset($_POST['emailid']) && isset($_POST['address']) &&
        isset($_POST['income']) && isset($_POST['disease'])
        && isset($_POST['nationCard'])) {
        
        $nameofthepatient = $_POST['nameofthepatient'];
        $contactnumber = $_POST['contactnumber'];
        $emailid = $_POST['emailid'];
        $address = $_POST['address'];
        $income = $_POST['income'];
        $disease = $_POST['disease'];
        $nationCard = $_POST['nationCard'];
        $host = "localhost";
        $dbUsername = "root";
        $dbPassword = "";
        $dbName = "tech11";
        $conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);
        if ($conn->connect_error) {
            
            die('Could not connect to the database.');
        }
        else {
            $Select = "SELECT emailid FROM registration2 WHERE emailid = ? LIMIT 1";
            $Insert = "INSERT INTO registration2(nameofthepatient, contactnumber, emailid, address, income, disease, nationCard ) values(?, ?, ?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($Select);
            $stmt->bind_param("s", $emailid);
            $stmt->execute();
            $stmt->bind_result($resultemailId);
            $stmt->store_result();
            $stmt->fetch();
            $rnum = $stmt->num_rows;
            if ($rnum == 0) {
                $stmt->close();
                $stmt = $conn->prepare($Insert);
                $stmt->bind_param("ssssssi",$nameofthepatient, $contactnumber, $emailid, $address, $income, $disease, $nationCard);
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