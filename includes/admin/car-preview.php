<?php include "header.php"; ?>

<?php include "navigation.php"; ?>

<?php    
global $link;
$id = $_GET["id"];

	$query = "SELECT * FROM cars WHERE id = {$id}";
	$result = mysqli_query($link , $query);													
	$row = mysqli_fetch_assoc($result);
?>

<div class="container">
	<div class="row">
		<div class="col-md-3">
			<a href="cars.php" class="btn btn-secondary" type="button"> <i class="fa fa-undo" aria-hidden="true"></i> BACK </a>
		</div>
		
		<div class="col-md-3">
			<a class="btn btn-primary"  href="car-edit.php?id=<?php echo $row['id']?>"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</a>
		</div>
		
		<div class="col-md-3">
			<!--SOLD CAR-->
				<a href="sold.php?id=<?php echo $row['id']?>" class="btn btn-success" type="button"><i class="fa fa-check" aria-hidden="true"></i> SOLD </a>



		</div>
		
		<div class="col-md-3">
			<a  onclick="return confirm('Are you sure?');" href="car-delete.php?id=<?php echo $row['id']?>" class="btn btn-warning"  ><i class="fa fa-trash-o" aria-hidden="true"></i> Remove</a>
		</div>
	</div>


	<div class="row">
		<div class="col-md-7">

		<div class="row">
			<div class="col-md-12">
				<img class="main-img-cars" src="../../public/img-cars/<?php echo $row['id']?>/main<?php echo $row['id']?>.jpg">
			</div>
		</div>
		
		<div class="row">
			<div class="description-admin col-md-12">
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