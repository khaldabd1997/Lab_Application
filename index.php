<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=devise-width, initial-scale=1">
    <title>Student Registration Form</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  </head>
    

<body class="body_index" >
    
    
    <section class="content">
    <h1 class="titel">Student Registration Form</h1>
    <form action="register.php" method="POST">
        <label for="fullName">Full Name:</label>
        <input class="input-box" type="text" id="fullName" name="fullName" placeholder="Enter your name"   required><br><br>

        <label for="email">Email Address:</label>
        <input class="input-box" type="email" id="email" name="email" placeholder="Enter your email"  required><br><br>

        <label for="gender">Gender:</label>
        <input type="radio" id="male" name="gender" value="Male" required>
        <label for="male">Male</label>
        <input type="radio" id="female" name="gender" value="Female" required>
        <label for="female">Female</label><br><br>
    <dev class="button">
        <input  type="submit" name="sub" value="Submit">
        
        
        </dev>
    </form>
    </section>
    <br>
    <br>
    <section class="content" >
            <table class="table">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">full name </th>
            <th scope="col">email</th>
            </tr>
        </thead>
        <tbody>
           <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "studentregistration";
            
            $conn = new mysqli($servername, $username, $password, $dbname);
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            
            
            $select ="SELECT * FROM students";
            $query = mysqli_query($conn,$select);
            if(mysqli_num_rows($query)>0)
            {
                while($row=mysqli_fetch_array($query))
                {
                    echo"<tr>";
                    echo "<td>".$row["id"]."</td>";
                    echo "<td>".$row["full_name"]."</td>";
                    echo "<td>".$row["email"]."</td>";
                    echo "<td>".$row["gender"]."</td>";

                }


            }
           
           
           
           
           
           
           ?>  
        </tbody>
        </table>


    </section>

</body>
</html>
