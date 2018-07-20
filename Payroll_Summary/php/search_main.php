<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="../../CSS/font.css">
	</head>

	<body>
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<form id="Home" action="portal_sort.php" method="post">
						<div class="col-md-2" style="margin-left:35%;">
							<h3>Sort Category</h3>
							<select class="form-control" name="sort_op">
								<option>---------------------------------------------------</option>
								<option>Employee ID</option>
								<option>Last Name</option>
								<option>First Name</option>
								<option>Middle Name</option>
								<option>Division</option>
								<option>Position</option>
								<option>Salary Grade</option>

							</select><br>

							<select class="form-control" name="sort_or">
								<option>Ascending</option>
								<option>Descending</option>
							</select><br>
						
							<button type="submit" class="btn btn-primary" name="submit">Sort</button>
						</div>
					</form>
				
					<form id="Home" action="portal_search.php" method="post">
						<div class="col-md-2">
							<h3>Search Category</h3>
							<select class="form-control" name="categ_op_search">
								<option>---------------------------------------------------</option>
								<option>Employee ID</option>
								<option>Last Name</option>
								<option>First Name</option>
								<option>Middle Name</option>
								<option>Division</option>
								<option>Position</option>
								<option>Salary Grade</option>
							</select><br>

							<input type="text" class="form-control" name="keyword" placeholder="Input here"><br>
							<button type="submit" class="btn btn-primary" name="submit">Search</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</body>
</html>