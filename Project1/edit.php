<!DOCTYPE html>
<html>
<head>
	<title></title>
	<?php include_once('header.php') ?>

</head>
<body>
	
	<div class="tile is-parent">
		<article class="tile is-child notification is-info">
			<p class="title">Edit</p>
			<?php
			$con=mysqli_connect("localhost","root","","database");
				/*if($con!=null) 
				echo"Sucess";*/

				$result=mysqli_query($con,'SELECT *  FROM  employee WHERE IDEmployee="'.$_POST['id'].'"');
			/* if(!$result)
        				die("connot");
        				else*/

        					$data=array("IDEmployee","Name","LastName","Position","Address","Telephone","Education","Birthdate","Passport/ID","Gender","Status","Access","Blood","Email");


        				$data1=array("text1","text2","text3","text4","text5","text6","text7","text8","text9","text10","text11","text12","text13","text14");
        				
        				while($row=mysqli_fetch_array($result,MYSQLI_NUM))
        				{
        					echo "<form name='form' method='post' action='update.php'>";
        					
        					for ($i=0; $i < 14 ; $i++)
        					{	
        						echo "<p class='control has-icon has-icon-right'>";
        						echo "<td>".$data[$i]."<td>";
        						if($i==0)
        							echo"<input type='text' class='input is-success' value='".$row[$i]."' name='$data1[$i]' disabled>";
        						else
        							echo"<td><input type='text' class='input is-success' value='".$row[$i]."' name='$data1[$i]' 	></td>";
        						echo '<input type="hidden" name="id" value="'.$row[0].'">';
        						echo "</p>";
        					}
        					
        				


        				}

        				
        			
        				echo"<input type='submit'  class='button is-warning' name='submit' value='Update'> &nbsp; ";
        				echo"<input  type='button'   class='button is-danger'  onClick='window.history.back()' value='Back'>";
        				echo "</form>";  
        		

        				?>	
        			</p>
        		</article>
        	</div>
        </div>
    </body>
    </html>