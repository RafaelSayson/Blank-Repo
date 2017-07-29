<html>
    <head>
        <title>View Students</title>
        <?php include("css/imports.html"); ?>
    </head>

    <body>

    <?php
    include ("navbar.php");

    if (isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] == 1 AND $_SESSION['role'] == "student"){
        //
    }
    else{
        echo 'You are not logged in. <a href="login.php">Click here</a> to log in.';
        exit();
    }
    ?>

    <div class="container-fluid">

<?php  
include("config.php");
$sql = "SELECT studentID, firstName, lastName, university from student";
$result = mysqli_query($db, $sql);

$sql1 = "SELECT distinct university from student";
$result1 = mysqli_query($db, $sql1);

echo
'<form>
    <h3>Filter by:</h3>

    <div class="form-group col-sm-3">
        <label for="dropdown1">University: </label>
        <select id="dropdown1" class="form-control">
            <option value=""> - </option>';
            while($row = mysqli_fetch_array($result1)){
               echo "<option value='" .$row["university"]. "'>" .$row["university"]. " </option>";
            }
echo
        '</select>
    </div>

    <div class="form-group col-sm-3">
        <label for="firstNameSearch">First Name: </label>
        <input type="text" id="firstNameSearch" placeholder="First name" class="form-control">
    </div>

    <div class="form-group col-sm-3">
        <label for="lastNameSearch">Last Name: </label>
        <input type="text" id="lastNameSearch" placeholder="Last name" class="form-control">
    </div>
</form>

<table id="example" class="display">
    <thead>
        <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>University</th>
        </tr>
    </thead>
    <tbody>';

    if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_array($result)){
    echo "<tr>";
    echo "<td>" .$row["studentID"]. "</td>";
    echo "<td>" .$row["firstName"]. "</td>";
    echo "<td>" .$row["lastName"]. "</td>";
    echo "<td>" .$row["university"]. "</td>";
    echo "</tr>";
    }
    echo "</tbody></table>";
    }
?>

    </div>
    </body>

    <script>
        $(document).ready(function(){

            var table = $('#example').DataTable( {
                paging: false,
                dom: 'lrtp' //hide search
                //bInfo: false,
                //bFilter: false
            });

            $('#dropdown1').on('change', function () {
                    table.columns(3).search( this.value ).draw();
            });

            $('#firstNameSearch').on('keyup change', function () {
                    table.columns(1).search( this.value ).draw();
            });

            $('#lastNameSearch').on('keyup change', function () {
                    table.columns(2).search( this.value ).draw();
            });

        });
    </script>

</html>