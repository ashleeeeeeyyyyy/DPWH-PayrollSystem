<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="../../CSS/font.css">
	</head>

	<body>
		<div class="container-fluid">
			<div class="row">
				<form id="Home" action="portal_sort.php" method="post">
					<h3>Sort Category</h3>
						<div class="col-md-3 bg-success">
							<select class="form-control" name="sort_op">
									<option>Last Name</option>
									<option>First Name</option>
									<option>Middle Name</option>
									<option>Employee ID</option>
									<option>Division</option>
									<option>Office</option>
									<option>Position</option>
									<option>Salary Grade</option>
							</select>

							<select class="form-control" name="sort_or">
									<option>Ascending</option>
									<option>Descending</option>
							</select>
					
							<button type="submit" class="btn btn-primary" name="submit">Search</button>
							
				</form>

				<form id="Home" action="portal_search.php" method="post">
					<h3 class="col-md-3">Search Category</h3>
						
							<select class="form-control" name="categ_op_search">
									<option>Last Name</option>
									<option>First Name</option>
									<option>Middle Name</option>
									<option>Employee ID</option>
									<option>Division</option>
									<option>Office</option>
									<option>Position</option>
									<option>Salary Grade</option>
							</select>

							<input type="text" class="form-control" name="keyword">

							<button type="submit" class="btn btn-primary" name="submit">Search</button>
</div>
				</form>
			</div>
		</div>
	</body>
</html>