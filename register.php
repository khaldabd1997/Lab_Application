<?php

// Connect to the MySQL database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "studentregistration";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if(!$conn)
{
    die("Connection failed: " .mysqli_connect_error());
}

/*



*/ 

// Retrieve form data
$fullName = $_POST['fullName'];
$email = $_POST['email'];
$gender = $_POST['gender'];
$href = "index.php";
$text = "Click here";
// Validate form data
$errors = array();

if (empty($fullName)) {
    $errors[] = "Full Name is required";
}

if (empty($email)) {
    $errors[] = "Email Address is required";
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "Invalid email format";
}

if (empty($gender)) {
    $errors[] = "Gender is required";
} elseif ($gender !== 'Male' && $gender !== 'Female') {
    $errors[] = "Invalid gender value";
}


if (!empty($errors)) {
    echo "<h1>Error:</h1>";

    foreach ($errors as $error) {
        echo "<p>$error</p>";
        echo "<a style='display: inline-block;
                                    padding: 10px 20px;
                                    background-color: #4d0200;
                                    color: white;
                                    text-decoration: none;
                                    border: none;
                                    border-radius: 4px;
                                    font-size: 16px;
                                                        cursor: pointer;' href='$href'>$text</a>";
    }
} else {


        
            // Insert 
            
           
                $sql = "INSERT INTO students (full_name, email, gender) VALUES ('$fullName', '$email', '$gender')";

                if ($conn->query($sql) === TRUE) {
                    echo "<h2>Success:</h2>";
                    echo "<p>Student data inserted successfully</p>";
                   

                    echo "<a style='display: inline-block;
                    padding: 10px 20px;
                    background-color: #4d0200;
                    color: white;
                    text-decoration: none;
                    border: none;
                    border-radius: 4px;
                    font-size: 16px;
                    cursor: pointer;' href='$href'>$text</a>";
                    
                            
                    //echo $fullName,$email,$gender;
                    
                } else {
            
                    echo "<h2>Error:</h2>";
                    echo "<p>Error inserting student data: " . $conn->error . "</p>";
                    echo "<a style='display: inline-block;
                                    padding: 10px 20px;
                                    background-color: #4d0200;
                                    color: white;
                                    text-decoration: none;
                                    border: none;
                                    border-radius: 4px;
                                    font-size: 16px;
                                                        cursor: pointer;' href='$href'>$text</a>";
                }
           

       
}
/*
$select ="select * from students where full_name='$fullName' ";
$query=mysqli_query($conn,$select);
if(mysqli_num_rows($query)>0)
{
    $chekemail=mysqli_fetch_array($query);
    if($chekemail["email"]==$email)
    {
        ehco "we found the user  ",$fullName,$email,$gender;
    }
    else{
        echo "not found user",$fullName,$email,$gender;
    }
    
}

*/


$conn->close();


?>
