<?php
include '../dbase.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $country_code = $_POST['country_code'];
    $tel = $_POST['tel'];
    $address = $_POST['address'];
    $password = $_POST['password'];
    $tel2 = $country_code . $tel;

    $sql2 = "SELECT c_id FROM customers ORDER BY c_id DESC LIMIT 1";
    $result = $conn->query($sql2);

    if ($result->num_rows > 0) {
        $row = $result->fetch_row();
        $last_c_id = (int)substr($row[0], 1); 
        $c_id = "C" . str_pad($last_c_id + 1, 3, '0', STR_PAD_LEFT); 
    } else {
        $c_id = "C001"; 
    }
   
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
   
    $stmt = $conn->prepare("INSERT INTO customers (c_id, c_name, c_email, c_tel, c_address, c_uname, c_pwd) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssss", $c_id, $name, $email, $tel2, $address, $username, $hashed_password);

    if ($stmt->execute()) {
        echo "success"; 
    } else {
        echo 'fail'; 
    }

    $stmt->close();
    $conn->close();
}
?>
