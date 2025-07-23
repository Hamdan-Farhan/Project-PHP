<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&family=Tajawal:wght@200;300;400;500;700;800;900&display=swap" rel="stylesheet">
    <title></title>

</head>
<body>

    <?php

     # Connect with the Database

     $host = 'localhost';
     $user = 'root';
     $pass = '';
     $db = 'student1';

     $con = mysqli_connect($host, $user, $pass, $db);
     $res = mysqli_query($con, "select * from student");

     # button Variable --

     $id = '';
     $name = '';
     $address = '';

     if(isset($_POST['id']))
     {
        $id = $_POST['id'];
     }
     if(isset($_POST['name']))
     {
        $namr = $_POST['name'];
     }
     if(isset($_POST['address']))
     {
        $address = $_POST['address'];
     }

     $sqls = '';

     if(isset($_POST['add']))
     {
        $sqls = "insert into student value( $id, '$name', '$address')";
        mysqli_query( $con, $sqls);
        header("location: home.php");
     }
     if(isset($_POST['del']))
     {
        $sqls = "delete from student where name='$name'";
        mysqli_query($con, $sqls);
        header("location: home.php");
     }

    ?>
 

    <div id='mother'>
        <form mother='POST'>

            <!-- Control Panel  -->
            <aside>
                <div id='div'>
                    <img src='https://www.privo.com/hs-fs/hubfs/images/privo-headerkid-10.png?width=500&name=privo-headerkid-10.png' alt="logo" width="200">
                    <h3>Admin Panel</h3>
                    <label>:رقم الطالب</label><br>
                    <input type='text' name='id' id='id'><br>
                    <label>:اسم الطالب</label><br>
                    <input type='text' name='name' id='name'><br>
                    <label>:عنوان الطالب</label><br>
                    <input type='text' name='address' id='address'><br><br>
                    <button name='add'>اضافة طالب</button>
                    <button name='del'>حذف طالب</button>

                </div>
            </aside>


            <!-- View Student Data -->
            <main>
                
                    <?php

                        while( $row = mysqli_fetch_array($res))
                        {

                         echo "<tr>";

                         echo "<td>" . $row['id'] . "</td>";
                         echo "<td>" . $row['name'] . "</td>";
                         echo "<td>" . $row['address'] . "</td>";

                         echo "</tr>";

                        }

                    ?>

            </main>

        </form>

    </div>
    
</body>
</html>
