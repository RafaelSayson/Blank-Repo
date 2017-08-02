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
$sql = "SELECT studentID, firstName, lastName, birthday, age, university from student"; //STR_TO_DATE(birthday, '%c/%e/%Y')
$result = mysqli_query($db, $sql);

$sql1 = "SELECT distinct university from student";
$result1 = mysqli_query($db, $sql1);
$result2 = mysqli_query($db, $sql1); //for another result fetch for second dropdown

echo
'<form>
    <h3>Filter by:</h3>

    <div class="form-group col-sm-3">
        <label for="dropdown1">University (Single): </label>
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

    <div class="form-group col-sm-3">
        <label for="lastNameSearch">Birthday: </label>
        <input type="text" id="birthdaySearch" placeholder="Birthday" class="form-control">
    </div>
	
	<div class="form-group col-sm-3">
        <label for="lastNameSearch">Age: </label>
        <input type="text" id="ageSearch" placeholder="Age" class="form-control">
    </div>


    <div class="form-group col-sm-3">
        <label for="testingSearch">University (Multiple - Regex): </label>
        <input type="text" id="testingSearch" placeholder="University (Regex)" class="form-control">
    </div>
	
	<div class="form-group col-sm-2">
        <label for="testingSearch">Min age: </label>
        <input type="text" id="min" class="form-control">
    </div>
	
	<div class="form-group col-sm-2">
        <label for="testingSearch">Max age: </label>
        <input type="text" id="max" class="form-control">
    </div>
	
</form>

<table id="example" class="display">
    <thead>
        <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Birthday</th>
			<th>Age</th>
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
    echo "<td>" .$row["birthday"]. "</td>";
	echo "<td>" .$row["age"]. "</td>";
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

            var searchString;
			
			$.fn.dataTable.ext.search.push(
				function( settings, data, dataIndex ) {
					var min = parseInt( $('#min').val(), 10 );
					var max = parseInt( $('#max').val(), 10 );
					var age = parseFloat( data[4] ) || 0; // use data for the age column
			 
					if ( ( isNaN( min ) && isNaN( max ) ) ||
						 ( isNaN( min ) && age <= max ) ||
						 ( min <= age   && isNaN( max ) ) ||
						 ( min <= age   && age <= max ) )
					{
						return true;
					}
					return false;
				}
			);
			
			$('#min, #max').keyup( function() {
				table.draw();
			} );

            $('#dropdown1').on('change', function () {
                    table.columns(5).search( this.value ).draw();
            });

            $('#firstNameSearch').on('keyup change', function () {
                    table.columns(1).search( this.value ).draw();
            });

            $('#lastNameSearch').on('keyup change', function () {
                    table.columns(2).search( this.value ).draw();
            });

            $('#birthdaySearch').on('keyup change', function () {
                    table.columns(3).search( this.value ).draw();
            });
			
			$('#ageSearch').on('keyup change', function () {
                    table.columns(4).search( this.value ).draw();
            });

            $('#testingSearch').on('keyup', function () {
            		table.columns(5).search( this.value, true, true ).draw();
            });

        });
    </script>

</html>