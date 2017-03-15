
<script language="JavaScript">
	function confirmDelete(){return confirm('Save data ?');}
	
</script>
<html>
<head></head>
<?php include_once('header.php') ?>
<?php include_once('menu.php') ?>
<body >
	<div class="tile is-parent">
		<article class="tile is-child notification is-info">
			<p class="title">Insert Employee</p>

			<form  method="POST" action="addatabase_database.php" enctype="multipart/form-data">

				<label class="label">NamePictture</label>
				<p class="control has-icon has-icon-right">
					<input class="input is-success" type="text" placeholder="Text input" name='txtName'>

					<span class="icon is-small">
						<i class="fa fa-check"></i>
					</span>

					<input type="file" class="button is-danger is-outlined" name="filUpload">
				</p>

				<label class="label">Title</label>

				<p class="control">
					<span class="select" >
						<select name='selectTitel'>
							<option  value='Mr.]'>Mr.</option>
							<option value='Mrs'>Mrs.</option>
							<option value='Miss'>Miss</option>
							<option value='Ms.'>Ms.</option>
							<option value='Dr.'>Dr.</option>
						</select>
					</span>
				</p>

				<label class="label">Name</label>
				<p class="control has-icon has-icon-right">
					<input class="input is-success" type="text" placeholder="Name" name="text2">
				</p>

				<label class="label">LastName</label>
				<p class="control has-icon has-icon-right">
					<input class="input is-success" type="text" placeholder="LastName" name="text3">
				</p>

				<label class="label">Position</label>
				<p class="control">
					<span class="select">
						<select name='selectPosition'>
							<?php
							$Position=array('',
								'Chairman'
								,'Vice Chairman'
								,'President'
								,'Vice'
								,'Senior Advisor'
								,'Managing Director '
								,'Directors',
								'General Manager'
								,'Manager'
								,'Head of Department'
								,'Research and Development Manager'
								,'Marketing Manager'
								,'Secretary'
								,'Manufacturing Manager'
								,'Production Control Manager'
								,'Technical Manager'
								,'Accounting Manage'
								,'Plant Manager'
								,'Service Manager'
								,'Products Manager'
								,'Personnel Manager'
								,'Assurance Manager '
								,'Quality Control Manager'
								,'Sales Manager'
								,'Purchasing Manager'
								,'Finance Manager'
								,'Export Manager '
								,'Credit and Legal Manager');
							for ($i=0; $i < 28; $i++)
								echo "<option value='$Position[$i]'>".$Position[$i]."</option>";
							?>
						</select>
					</span>
				</p>

				<label class="label">Address</label>
				<p class="control">
					<textarea class="textarea" placeholder="Address" name="text4"></textarea>
				</p>

				<label class="label">Telephone </label>
				<p class="control has-icon has-icon-right">
					<input class="input is-success" type="text" placeholder="Telephone " name="text5">
				</p>


				<label class="label">Educational</label>
				<p class="control">
					<span class="select">
						<select  name='selectEducational'>
							<?php 
							$Educational=array('',
								'Honorary doctorate degree '
								,'Doctorate degree  '
								,'Master degree'
								,'Bachelor degree '
								,'College certificate',
								'Vocational Diploma',
								'Vocational certificate');
							for ($i=0; $i < 8; $i++)
								echo "<option value='$Educational[$i]'>".$Educational[$i]."</option>";
							?>
						</select>
					</span>
				</p>

				<label class="label">Email</label>
				<p class="control has-icon has-icon-right">
					<input class="input is-success" type="text" placeholder="Email input" value="" name='text8' >
				</p>


				<label class="label">Birthdate</label>

				<p class="control has-icon has-icon-right">
					<input class="input is-success" type="date" placeholder="" value="" name='date'>
				</p>

				<label class="label">Passport/ID</label>
				<p class="control has-icon has-icon-right">
					<input class="input is-success" type="text" placeholder="Passport/ID" value="" name='text6' >
				</p>

				<label class="label">BloodType</label>
				<p class="control">
					<span class="select">
						<select  name='selectblood'>
							<?php 
							$bloodtype=array('','A','B','O','AB');
							for ($i=0; $i <5; $i++)
								echo "<option value='$bloodtype[$i]'>".$bloodtype[$i]."</option>";
							?>
						</select>
					</span>
				</p>

				<label class="label">Gender</label>
				<p class="control">
					<span class="select">
						<select  name='selectGender'>
							<?php 
							$Genders=array('','Female','Male');
							for ($i=0; $i <3; $i++)
								echo "<option value=' $Genders[$i]'>". $Genders[$i]."</option>";
							?>
						</select>
					</span>
				</p>

				<label class="label">Status</label>
				<p class="control">
					<span class="select">
						<select  name='selectStatus'>
							<?php 
							$Status=array('','Single','Married','Widowed','Married with no children ','Divorced');
							for ($i=0; $i <6; $i++)
								echo "<option value=' $Status[$i]'>". $Status[$i]."</option>";
							?>
						</select>
					</span>
				</p>

				<label class="label">Access</label>
				<p class="control">
					<label class="radio">

					</label>

					<label class="radio">
						<input type="radio" name="text7" value="Admin">
						Admin
					</label>

					<label class="radio"  >
						<input type="radio" name="text7" value="User">
						User
					</label>

					<div class="control is-grouped">
						<p class="control">
							<button class="button is-primary" onClick='return confirmDelete()';>Submit</button>
						</p>
						<p class="control">
							<a class="button is-warning"  onClick='window.location="Formdataemployee.php";'>Cancel</a>
							<a class="button is-danger" onClick='window.history.back()'>Back</a>
						</p>
					</div>

				</p>
				
			</form>
		</article>
	</div>
</body>
</html>