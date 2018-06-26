<table id="main_menu">
<tr>
<td>
<table>

		<form id="Home" action="portal_sort.php" method="post">
		<tr>
			<th colspan="2">Sort</th>
		</tr>
		
		<tr>
			<td>
				<label>Sort By: </label>
			</td>
			<td>
				<select name="sort_op">
					<option>Employee ID</option>
					<option>Last Name</option>
					<option>First Name</option>
					<option>Middle Name</option>
					<option>Division</option>
					<option>Position</option>
					<option>Salary Grade</option>
					<option>Leave Type (For Absences Only)</option>
				</select>
			</td>

			
		</tr>
		<tr>
			<td>
				<label>Order: </label>
			</td>
			<td>
				<select name="sort_or">
					<option>Ascending</option>
					<option>Descending</option>
				</select>
			</td>

			
		</tr>
		

		<tr>
			<td>
				<label>Action: </label>
			</td>

			<td>
				
				<input class = "srbtn" type="submit" name = "submit" value="Go"></input>
				
			</td>
			
		</tr>
		</form>



	</table>
	</td>
	<td>
	<table>
		<form id="Home" action="portal_search.php" method="post">
		<tr>
			<th colspan="2">Search</th>
		</tr>
		
		<tr>
			<td>
				<label>Search Category: </label>
			</td>
			<td>
				<select name="categ_op_search">
					<option>----------</option>
					<option>Employee ID</option>
					<option>Last Name</option>
					<option>First Name</option>
					<option>Middle Name</option>
					<option>Division</option>
					<option>Position</option>
					<option>Salary Grade</option>
				</select>
			</td>
			<td>
			</td>
			
		</tr>

		
		<tr>
			<td>
				<label>Keyword: </label>
			</td>
			<td>
				<input type="text" name='keyword'></input>
			</td> 

			
		</tr>

		<tr>
			<td>
				<label>Action: </label>
			</td>

			<td>
				
				<input class = "srbtn" type="submit" value="Go"></input>
				
			</td>
			
		</tr>
		</form>



	</table>
	</td>
	</tr>
	</table>