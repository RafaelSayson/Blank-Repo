<html>
<head>
	<title>MLA </title>
	<link rel="stylesheet" type="text/css" href="designMLA.css"/>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

	<link rel="stylesheet" href="http://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<script src ="http://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>	
	<script src="jquery.PrintArea.js" type="text/JavaScript" language="javascript"></script>
	<script src="jquery.js" type="text/JavaScript" language="javascript"></script>
	
	<script>
		$(document).ready(function(){
			$('.search').on('keyup',function(){
				var searchTerm = $(this).val().toLowerCase();
				$('#userTbl tbody tr').each(function(){
					var lineStr = $(this).text().toLowerCase();
					if(lineStr.indexOf(searchTerm) === -1){
						$(this).hide();
					}else{
						$(this).show();
					}
				});
			});
		});


	</script>
</head>
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css">
<body>
	<div id= "header">
		<div class="logo"><a href"#">Blank Repo</a></div>
		<a href = "#"><i class="fa fa-sign-out" ></i>    Logout</a>
	</div>
	<div id="container">
		<div class = "nav-content"> 
			<div class="nav-bar">
				<a href = 'MainPageAdmin.php'><button class="dropbtn">Main Menu</button></a>
				<div class="dropdown">
					<button class="dropbtn">Students</button>
				</div>
				<div class="dropdown">
					<button class="dropbtn">University</button>

				</div>


			</div>
			<div class="content"> 
				<div class="table-responsive">  
					<h3 align="center">Students</h3><br /> 
					<a href="javascript:void(0);" id="print_button1" style="width: 100px; padding: 5px 8px 5px 8px;text-align: center;float: right;background-color: #02A6D8;color: #fff;text-decoration: none; margin: 10px;">Print Table</a>

					<input type="text" class="search form-control" placeholder="What you looking for?">
					<button id="Add" data-toggle="modal" data-target="#add">Add</button>
					<div id="live_data"></div>  


				</div>
			</div>

		</div>
		
		<div id="add" class="modal fade" role="dialog">
			<div class="modal-dialog">


				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Add Row</h4>
					</div>
					<div class="modal-body">
						<div class=" form-group  ">
							<label for='name' class="col-md-3">First Name: </label>
							<input type="text" name="name" id='name'>
						</div>
						<div class=" form-group  ">
							<label for='mdn' class="col-md-3">Middle Name: </label>
							<input type="text" name="mdn" id='mdn'>
						</div>
						<div class=" form-group  ">
							<label for='lsn' class="col-md-3">Last Name: </label>
							<input type="text" name="lsn" id='lsn'>
						</div>
						<div class=" form-group  ">
							<label for='ctn' class="col-md-3">Contact Number:</label>
							<input type="text" name="ctn" id='ctn'>
						</div>
						<div class=" form-group  ">
							<label for='adr' class="col-md-3">Address:</label>
							<input type="text" name="adr" id='adr'>
						</div>
						<div class=" form-group  ">
							<label for='eml' class="col-md-3">Email:</label>
							<input type="text" name="eml" id='eml'>
						</div>
						<div class=" form-group  ">
							<label for='edu' class="col-md-3">Educational Lvl:</label>
							<select name = edu id = "edu">
								<option value="1001">Grade 1</option>
								<option value="1002">Grade 2</option>
								<option value="1003">Grade 3</option>
								<option value="1004">Grade 4</option>
								<option value="1005">Grade 5</option>
								<option value="1006">Grade 6</option>
								<option value="1007">1st Year HS</option>
								<option value="1008">2nd Year HS</option>
								<option value="1009">3rd Year HS</option>
								<option value="1010">4th Year HS</option>
							</select>
						</div>

					</div>
					<div class="modal-footer">
						<button text-align="center" id="submit" type="submit" name="">Submit</button>
					</div>
				</div>

			</div>
		</div>

		<script>
			$(document).ready(function(){
				$("#print_button1").click(function(){
            var mode = 'iframe'; // popup
            var close = mode == "popup";
            var options = { mode : mode, popClose : close};
            $("div.live_data").printArea( options );
        });
				$("#print_button2").click(function(){
            var mode = 'iframe'; // popup
            var close = mode == "popup";
            var options = { mode : mode, popClose : close};
            $("div.content").printArea( options );
        });
			});

		</script>

	</body>


	<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
	<script src="js/bootstrap.js"></script>
	<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
	<script>  
		$(document).ready(function(){  
			function fetch_data()  
			{  
				$.ajax({  
					url:"selectStudents.php",  
					method:"POST",  
					success:function(data){  
						$('#live_data').html(data);  
					}  
				});  
			}  
			fetch_data();

			function edit_data(id, text, column_name)  
			{  

				$.ajax({  
					url:"editApplicants.php",  
					method:"POST",  
					data:{id:id, text:text, column_name:column_name},  
					dataType:"text",  
					success:function(data){  
						alert(data);  
					}  
				});  
			}  
			$(document).on('blur', '.firstname', function(){  
				var id = $(this).data("id1");  
				var firstname = $(this).text();  
				edit_data(id, firstname, "firstname");  
			});  
			$(document).on('blur', '.middlename', function(){  
				var id = $(this).data("id2");  
				var middlename = $(this).text();  
				edit_data(id,middlename, "middlename");  
			});
			$(document).on('blur', '.lastname', function(){  
				var id = $(this).data("id3");  
				var lastname = $(this).text();  
				edit_data(id,lastname, "lastname");  
			});
			$(document).on('blur', '.contactNo', function(){  
				var id = $(this).data("id4");  
				var contactNo = $(this).text();  
				edit_data(id,contactNo, "contactNo");  
			});
			$(document).on('blur', '.address', function(){  
				var id = $(this).data("id5");  
				var address = $(this).text();  
				edit_data(id,address, "address");
			});
			$(document).on('blur', '.email', function(){  
				var id = $(this).data("id6");  
				var email = $(this).text();  
				edit_data(id,email, "email");  
			});
			$(document).on('blur', '.eduDescription', function(){  
				var id = $(this).data("id7");  
				var eduDescription = $(this).text();  
				edit_data(id,eduDescription, "eduDescription");  
			});
			$(document).on('blur', '.yearApplied', function(){  
				var id = $(this).data("id8");  
				var yearApplied = $(this).text();  
				edit_data(id,yearApplied, "yearApplied");  
			});

			$('#submit').click(function(){
				var name = $('#name').val();
				var mdn = $('#mdn').val();
				var lsn = $('#lsn').val();
				var ctn = $('#ctn').val();
				var adr = $('#adr').val();
				var eml = $('#eml').val();
				var edu = $('#edu').val();
				console.log(name);
				console.log(mdn);
				console.log(lsn);
				console.log(ctn);
				console.log(adr);
				console.log(eml);
				console.log(edu);
				$("#submit").unbind('click').bind('click', function () { }); 
				$('#add').modal('hide');
				
				
				$.ajax({
					type:'POST',
					url: 'ajax2.php/',
					data:{ 'method':5,'name':name,'mdn':mdn,'lsn':lsn,'ctn':ctn,'adr':adr
					,'eml':eml,'edu':edu},
					success: function(data){
						fetch_data();
						
						$('#name').val('');
						$('#mdn').val('');
						$('#lsn').val('');
						$('#ctn').val('');
						$('#adr').val('');
						$('#eml').val('');
						$('#edu').val('');
					}
				})
				
			});
		});  
	</script> 

	</html>