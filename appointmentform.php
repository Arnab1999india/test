<?php
include "connection.php";
include "user_home.php";

$doctor_id = $_GET['id'];
$sql = "select * from doctor_info where id = '$doctor_id'";
$query = mysqli_query($conn,$sql);
$doctor_data = mysqli_fetch_array($query);
echo $doctor_data['name'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/appointment.css">
    <title>Make Appointment</title>
</head>
<body>
    <div class="main">
    <div class="container">
        <h2>Make Appointment </h2>
            <form action="" method="post">
                <table id="tbl">
                    <tr><td style="color: blueviolet; font-weight: bold;">Doctor :</td><td><input type="text" name="dname" value="<?php  echo $doctor_data['name'];   ?>" id="dname" readonly ></td></tr>
                    <tr><td style="color:blueviolet; font-weight: bold;">Appointment Date:</td><td><input type="text" name="appdate" value="<?php  echo $doctor_data['date'];   ?>" readonly id="apdate"></td></tr>
                    <tr><td style="color:blueviolet; font-weight: bold;">Patient Name:</td><td><input type="text" name="name" value="" id="name"></td></tr>
                    <tr><td style="color:blueviolet; font-weight: bold;">Patient Age:</td><td><input type="number" name="age" value="" id="age"></td></tr>
                    <tr><td style="color:blueviolet; font-weight: bold;">Patient Gender:</td><td><input type="radio" name="gender" id="gender" value="Male" required>Male &nbsp;&nbsp;
                                            <input type="radio" name="gender" id="gender" value="Female" required>Female</td></tr>
                    <tr><td style="color:blueviolet; font-weight: bold;">Patient Contact No:</td><td><input type="number" name="contact" value="" id="contact"></td></tr>
                    <tr><td style="color:blueviolet; font-weight: bold;">Patient Email:</td><td><input type="email" name="email" value="" id="email"></td></tr>
                    <tr><td style="color:blueviolet; font-weight: bold;">Patient Address:</td><td><textarea name="address" id="address" cols="20" rows="5" ></textarea></td></tr>
                   <tr><td><input type="submit" name="submit" id="submit" value="Make Appointment"></td></tr>
                </table>
            </form>
    </div>
    </div>

                    <?php

                        if(isset($_POST['submit']))
                        {
                            $dname = $_POST['dname'];
                            $appdate = $_POST['appdate'];
                            $name = $_POST['name'];
                            $age = $_POST['age'];
                            $gender = $_POST['gender'];
                            $contact = $_POST['contact'];
                            $email = $_POST['email'];
                            $address = $_POST['address'];

                            

                            if($dname == "" || $appdate == "" || $name == "" || $age == "" || $gender == "" || $contact == "" || $email == "" || $address == "")
                            {
                                    echo "Enter data to all the field";
                            }
                            else{

                                $sql = "insert into appointment values('$dname', '$appdate', '$name', '$age', '$gender', '$contact', '$email', '$address')";
                                $query = mysqli_query($conn, $sql);
                                if($query)
                                {
                                    echo "data inserted";
                                }
                                else{
                                    echo "data not inserted";
                                }
                            }
                        }

                    ?>
</body>
</html>