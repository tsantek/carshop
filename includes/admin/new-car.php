<?php include "header.php"; ?>

<?php include "navigation.php"; ?>

<div class="container">

<?php 
ob_start();
?>

<form method="POST" enctype="multipart/form-data" >
	<div class="row">
		<div class="col-md-7">

		<div class="row">
		<div class="form-group">
			<label for="image" >Main image upload</label>
			<input type="file"  name="image" id="image"  accept=".jpg,.gif,.png , .jpeg">
			<small id="fileHelp" class="form-text text-muted">This will be your main car image</small>
		</div>
		
		</div>
		
		<div class="row">
			<div class="form-group">
				<label for="description">Description</label>
				<textarea name="description" class="form-control" id="description " rows="5" ></textarea>
			</div>
		</div>

		</div>

		<div class="col-md-5">
			<h3>Specification</h3>
 
			<div class="row">
				<div class="col-md-6">
					<p>Brand</p>
					<h2 class=""><input name="brand" type="text" class="form-control" id="brand"  placeholder="" ></h2>
					<p>Model</p>
					<h4 class=""><input name="model" type="text" class="form-control" id="model"  placeholder="" ></h4>
				</div>
				<div class="col-md-6">
					<p>Price</p>
					<h1 class=""><input name="price" type="text" class="form-control" id="price"  placeholder="" ></h1>
				</div>


			</div>
			
			<div class="row">
					<table class="table">
					
						<tr>
							<td>VIN Number</td>
							<td><input name="vin-number" type="text" class="form-control col-md-6"  id="vin-number"  placeholder=""  ></td>
							<td></td>
							
						</tr>
						<tr>
							<td>Cubic Capacity</td>
							<td><input name="cubic-capacity" type="text" class="form-control" id="cubic-capacity" placeholder="" ></td>
							<td>ccm</td>
						</tr>
						<tr>
							<td>Fuel</td>
							<td><input name="fuel" type="text" class="form-control" id="fuel" placeholder="" ></td>
							<td></td>
						</tr>
						<tr>
							<td>Fuel Consumption - combined</td>
							<td><input name="consumption-combined" type="text" class="form-control" id="consumption" ="" ></td>
							<td>l/ 100 km</td>
						</tr>
						<tr>
							<td>Fuel Consumption - urban</td>
							<td><input name="consumption-urban" type="text" class="form-control" id="consumption" ="" ></td>
							<td>l/ 100 km</td>
						</tr>
						<tr>
							<td>Fuel Consumption - extra-urban</td>
							<td><input name="consumption-extra-urban" type="text" class="form-control" id="consumption" ="" ></td>
							<td>l/ 100 km</td>
						</tr>
						<tr>
							<td>Number of seats</td>
							<td><input name="seats" type="text" class="form-control" id="seats" placeholder="" ></td>
							<td></td>
						</tr>
						<tr>
							<td>Doors Count</td>
							<td><input name="doors" type="text" class="form-control" id="doors" placeholder="" ></td>
							<td></td>
						</tr>
						<tr>
							<td>Gearbox</td>
							<td><input name="gearbox" type="text" class="form-control" id="gearbox" placeholder="" ></td>
							<td></td>
						</tr>
						<tr>
							<td>Color</td>
							<td><input name="color" type="text" class="form-control" id="color" placeholder="" ></td>
							<td></td>
						</tr>
						<tr>
							<td>Model Year</td>
							<td><input name="year" type="text" class="form-control" id="year" placeholder="" ></td>
							<td></td>
						</tr>
						<tr>
							<td>First Registration</td>
							<td><input name="registration" type="text" class="form-control" id="registration" placeholder="" ></td>
							<td></td>
						</tr>
						<tr>
							<td>CO2 Emission</td>
							<td><input name="emission" type="text" class="form-control" id="emission" placeholder="" ></td>
							<td></td>
						</tr>
						<tr>
							<td>Emission Class</td>
							<td><input name="emission-class" type="text" class="form-control" id="emission-class" placeholder="" ></td>
							<td></td>
						</tr>
						<tr>
							<td>Interior Design</td>
							<td><input name="interior" type="text" class="form-control" id="interior" placeholder="" ></td>
							<td></td>
						</tr>
				
					</table>
			</div>

				</div>

				<div class="modal-footer">
                                        <a href="cars.php" type="button" class="btn btn-secondary" >Cancel</a>
                                        <button type="submit"  name="submit" class="btn btn-primary">Save changes</button>
                                    </div>

   </form>                                    
</div>



<?php 
if(isset($_POST['submit'])){

	global $link;

	$brand = mysqli_real_escape_string($link, $_POST['brand']);
	$model = mysqli_real_escape_string($link, $_POST['model']);
	$vin = urldecode($_POST['vin-number']);
	$cubic = urldecode($_POST['cubic-capacity']);
	$fuel = mysqli_real_escape_string($link, $_POST['fuel']);
	$combined = urldecode($_POST['consumption-combined']);
	$urban = urldecode($_POST['consumption-urban']);
	$extra = urldecode($_POST['consumption-extra-urban']);
	$seats = urldecode($_POST['seats']);
	$doors = urldecode($_POST['doors']);
	$gearbox = mysqli_real_escape_string($link, $_POST['gearbox']);
	$color = mysqli_real_escape_string($link, $_POST['color']);
	$year = urldecode($_POST['year']);
	$registration = urldecode($_POST['registration']);
	$emission = urldecode($_POST['emission']);
	$emissionClass =  mysqli_real_escape_string($link, $_POST['emission-class']);
	$interior =  mysqli_real_escape_string($link, $_POST['interior']);
	$descripton =  mysqli_real_escape_string($link, $_POST['description']);
	$price = urldecode($_POST['price']);

	$query="INSERT INTO cars (brand , model , vinNumber ,cubicCapacity ,fuel ,consumptionCombined ,consumptionUrban ,consumptionExtraUrban , seats , doors , gearbox , color , modelYear , firstRegistration , emissinon , emmisionClass , interior , description , price ) VALUE
						 ('{$brand}' ,'{$model}' ,'{$vin}' ,'{$cubic}' ,'{$fuel}','{$combined}' ,'{$urban}' ,'{$extra}' ,'{$seats}' ,'{$doors}' ,'{$gearbox}' ,'{$color}' ,'{$year}' ,'{$registration}' ,'{$emission}' ,'{$emissionClass}','{$interior}','{$descripton}','{$price}'  )";

	$result = mysqli_query($link, $query);


	// PICTURE UPLOAD 
	if($result){

		$queryImage = "SELECT * FROM cars ORDER BY id DESC LIMIT 1";
		$resultImage =  mysqli_query($link, $queryImage);
		$row = mysqli_fetch_assoc($resultImage);

	

		mkdir("../../public/img-cars/".$row['id']);
		$target_dir = "../../public/img-cars/".$row['id']."/";
		$target_file = $target_dir."main".$row['id'].".jpg";
		$image = $_FILES["image"]["tmp_name"];

		move_uploaded_file($image, $target_file);

		header("Location: cars.php");
}else{
	echo "BAD";
}




}

?>

<!-- DISABLE ENTER SUBMIT-->
<script type="text/javascript">
    window.addEventListener('keydown', function(e) {
        if (e.keyIdentifier == 'U+000A' || e.keyIdentifier == 'Enter' || e.keyCode == 13) {
            if (e.target.nodeName == 'INPUT' && e.target.type == 'text') {
                e.preventDefault();
                return false;
            }
        }
    }, true);
</script>



  <?php include "footer.php"; ?>