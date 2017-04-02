<?php include "header.php"; ?>

<?php include "navigation.php"; ?>


<div class="container">
	<div class="row">
		<div class="col-md-3">
			<a href="cars.php" class="btn btn-secondary" type="button"> <i class="fa fa-undo" aria-hidden="true"></i> BACK </a>
		</div>
	</div>


	<div class="row">
	
	
		<form method="POST" >

		<div class="col-md-3">
			<p>Sales Person</p>
			<input name="salesPerson" type="text" class="form-control"  id="salesPerson">
		</div>
			<div class="col-md-2">
			<p>Sales Price</p>
			<input name="salesPrice" type="text" class="form-control"  id="salesPrice">
		</div>

		<div class="col-md-2">
			<p>Sales Time</p>
			<input name="salesTime" type="text" class="form-control"  id="salesTime" value="<?php echo date("m/d/y")." ".date("h:ia"); ?>" disabled >
		</div>
		<div class="col-md-3">
			<p>Customer</p>
			<input name="customer" type="text" class="form-control"  id="customer">
		</div>
	
		
		<div class="col-md-2">
		<input name="submit" id="submit"  type="submit"  class="btn btn-success" value="SOLD">
		</div>
		
</form>


	</div>


<?php

if(isset($_POST['submit'])){
	global $link;
	$id = $_GET["id"];
	$salePerson =  mysqli_real_escape_string($link, $_POST['salesPerson']);
	$dateOfSale =  date("m/d/y")." ".date("h:ia");
	$salePrice = urldecode($_POST['salesPrice']);
	$customer =  mysqli_real_escape_string($link, $_POST['customer']);
	$sold = 1;

	 $query1 = " UPDATE cars   SET  salesPerson  = '{$salePerson}' , salePrice = '{$salePrice}' , dateOfSale  = '{$dateOfSale}' , sold = '{$sold}', customer = '{$customer}' WHERE id = {$id}  ";
	 $result1 = mysqli_query($link , $query1);

	 print_r($query1);	

	 if($result1){
		 header("Location: cars.php");
	}else{
		echo "BAD";
	}
}


?>



<?php   
global $link;
$id = $_GET["id"];

	$query = "SELECT * FROM cars WHERE id = {$id}";
	$result = mysqli_query($link , $query);													
	$row = mysqli_fetch_assoc($result);

?>


	<div class="row">
		<div class="col-md-7">

		<div class="row"></div>
		
		<div class="row">
			<div class="description-admin">
				<?php echo $row['description'];?>
			</div>
		</div>

		</div>

		<div class="col-md-5">
			<h3>Specification</h3>

			<div class="row">
				<div class="col-md-6">
					<h2 class=""><?php echo $row['brand'];?></h2>
					<h4 class=""><?php echo $row['model'];?></h4>
				</div>
				<div class="col-md-6">
					<h1 class=""><?php echo $row['price'];?>$</h1>
				</div>


			</div>
			
			<div class="row">
					<table class="table">
					
						<tr>
							<td>VIN Number</td>
							<td><?php echo $row['vinNumber'];?></td>
						</tr>
						<tr>
							<td>Cubic Capacity</td>
							<td><?php echo $row['cubicCapacity'];?></td>
						</tr>
						<tr>
							<td>Fuel</td>
							<td><?php echo $row['fuel'];?></td>
						</tr>
						<tr>
							<td>Fuel Consumption - combined</td>
							<td><?php echo $row['consumptionCombined'];?>l/100km</td>
						</tr>
						<tr>
							<td>Fuel Consumption - urban</td>
							<td><?php echo $row['consumptionUrban'];?>l/100km</td>
						</tr>
						<tr>
							<td>Fuel Consumption - extra-urban</td>
							<td><?php echo $row['consumptionExtraUrban'];?>l/100km</td>
						</tr>
						<tr>
							<td>Number of seats</td>
							<td><?php echo $row['seats'];?></td>
						</tr>
						<tr>
							<td>Doors Count</td>
							<td><?php echo $row['doors'];?></td>
						</tr>
						<tr>
							<td>Gearbox</td>
							<td><?php echo $row['gearbox'];?></td>
						</tr>
						<tr>
							<td>Color</td>
							<td><?php echo $row['color'];?></td>
						</tr>
						<tr>
							<td>Model Year</td>
							<td><?php echo $row['modelYear'];?></td>
						</tr>
						<tr>
							<td>First Registration</td>
							<td><?php echo $row['firstRegistration'];?></td>
						</tr>
						<tr>
							<td>CO2 Emission</td>
							<td><?php echo $row['emissinon'];?></td>
						</tr>
						<tr>
							<td>Emission Class</td>
							<td><?php echo $row['emmisionClass'];?></td>
						</tr>
						<tr>
							<td>Interior Design</td>
							<td><?php echo $row['interior'];?></td>
						</tr>
				
					</table>
			</div>

				</div>
                                      
</div>






  <?php include "footer.php"; ?>