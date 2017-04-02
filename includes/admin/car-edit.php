<?php include "header.php"; ?>

<?php include "navigation.php"; ?>

<div class="container">

<?php
ob_start();

global $link;
$id = $_GET['id'];

$query = "SELECT * FROM cars WHERE id = {$id}";
$result =  mysqli_query($link, $query);
$row = mysqli_fetch_assoc($result);


?>



<form method="POST"  enctype="multipart/form-data" >
	<div class="row">
		<div class="col-md-7">

		<div class="row">
			<div class="col-md-12">
				<img class="main-img-cars" src="../../public/img-cars/<?php echo $row['id']?>/main<?php echo $row['id']?>.jpg">
			</div>

			<div class="form-group">
			<label for="image" >Change Main picture</label>
			<input type="file"  name="image" id="image"  accept=".jpg,.gif,.png">
		</div>


		</div>
		
		<div class="row">
			<div class="form-group">
				<label for="description">Description</label>
                <textarea name="description" class="form-control" id="description " rows="5" ><?php echo htmlentities($row['description']);?></textarea>
			</div>
		</div>

		</div>

		<div class="col-md-5">
			<h3>Specification</h3>
 
			<div class="row">
				<div class="col-md-6">
					<p>Brand</p>
					<h2 class=""><input  name="brand" type="text" class="form-control" id="brand"  value="<?php echo htmlentities($row['brand']);?>" ></h2>
					<p>Model</p>
					<h4 class=""><input name="model" type="text" class="form-control" id="model"  value="<?php echo htmlentities($row['model']);?>"  ></h4>
				</div>
				<div class="col-md-6">
					<p>Price</p>
					<h1 class=""><input name="price" type="text" class="form-control" id="price"  value="<?php echo htmlentities($row['price']);?>"  ></h1>
				</div>


			</div>
			
			<div class="row">
					<table class="table">
					
						<tr>
							<td>VIN Number</td>
							<td><input name="vin-number" type="text" class="form-control col-md-6"  id="vin-number" value="<?php echo htmlentities($row['vinNumber']);?>"  ></td>
							<td></td>
							
						</tr>
						<tr>
							<td>Cubic Capacity</td>
							<td><input name="cubic-capacity" type="text" class="form-control" id="cubic-capacity" value="<?php echo htmlentities($row['cubicCapacity']);?>"  ></td>
							<td>ccm</td>
						</tr>
						<tr>
							<td>Fuel</td>
							<td><input name="fuel" type="text" class="form-control" id="fuel"  value="<?php echo htmlentities($row['fuel']);?>" ></td>
							<td></td>
						</tr>
						<tr>
							<td>Fuel Consumption - combined</td>
							<td><input name="consumption-combined" type="text" class="form-control" id="consumption"  value="<?php echo htmlentities($row['consumptionCombined']);?>" ></td>
							<td>l/ 100 km</td>
						</tr>
						<tr>
							<td>Fuel Consumption - urban</td>
							<td><input name="consumption-urban" type="text" class="form-control" id="consumption"  value="<?php echo htmlentities($row['consumptionUrban']);?>" ></td>
							<td>l/ 100 km</td>
						</tr>
						<tr>
							<td>Fuel Consumption - extra-urban</td>
							<td><input name="consumption-extra-urban" type="text" class="form-control" id="consumption" value="<?php echo htmlentities($row['consumptionExtraUrban']);?>" ></td>
							<td>l/ 100 km</td>
						</tr>
						<tr>
							<td>Number of seats</td>
							<td><input name="seats" type="text" class="form-control" id="seats"value="<?php echo htmlentities($row['seats']);?>"  ></td>
							<td></td>
						</tr>
						<tr>
							<td>Doors Count</td>
							<td><input name="doors" type="text" class="form-control" id="doors" value="<?php echo htmlentities($row['doors']);?>"  ></td>
							<td></td>
						</tr>
						<tr>
							<td>Gearbox</td>
							<td><input name="gearbox" type="text" class="form-control" id="gearbox" value="<?php echo htmlentities($row['gearbox']);?>"  ></td>
							<td></td>
						</tr>
						<tr>
							<td>Color</td>
							<td><input name="color" type="text" class="form-control" id="color" value="<?php echo htmlentities($row['color']);?>"  ></td>
							<td></td>
						</tr>
						<tr>
							<td>Model Year</td>
							<td><input name="year" type="text" class="form-control" id="year"value="<?php echo htmlentities($row['modelYear']);?>" ></td>
							<td></td>
						</tr>
						<tr>
							<td>First Registration</td>
							<td><input name="registration" type="text" class="form-control" id="registration" value="<?php echo htmlentities($row['firstRegistration']);?>"  ></td>
							<td></td>
						</tr>
						<tr>
							<td>CO2 Emission</td>
							<td><input name="emission" type="text" class="form-control" id="emission" value="<?php echo htmlentities($row['emissinon']);?>" ></td>
							<td></td>
						</tr>
						<tr>
							<td>Emission Class</td>
							<td><input name="emission-class" type="text" class="form-control" id="emission-class"  value="<?php echo htmlentities($row['emmisionClass']);?>"></td>
							<td></td>
						</tr>
						<tr>
							<td>Interior Design</td>
							<td><input name="interior" type="text" class="form-control" id="interior"  value="<?php echo htmlentities($row['interior']);?>" ></td>
							<td></td>
						</tr>
				
					</table>
			</div>

				</div>

				<div class="modal-footer">
                                        <a href="car-preview.php?id=<?php echo htmlentities( $row['id']);?>" type="button" class="btn btn-secondary" >Cancel</a>
                                        <button type="submit"  name="submit" class="btn btn-primary" >Save changes</button>
                                    </div>

   </form>                                    
</div>




<?php 
if(isset($_POST['submit'])){

	global $link;

    $id = $_GET['id'];

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


    $query = "UPDATE cars  SET brand = '{$brand}', model = '{$model}' , vinNumber = '{$vin}'   , cubicCapacity = '{$fuel}'   , fuel = '{$fuel}'   , consumptionCombined = '{$combined}'   , consumptionUrban = '{$urban}'   , consumptionExtraUrban = '{$extra}' , seats = '{$seats}'   ,doors = '{$doors}'    ,gearbox = '{$gearbox}'    ,color = '{$color}'    ,modelYear = '{$year}'    ,firstRegistration = '{$registration}' ,emissinon = '{$emission}' ,emmisionClass = '{$emissionClass}' ,interior = '{$interior}' ,description = '{$descripton}'    ,price = '{$price}'  WHERE id = '{$id}' LIMIT 1 ";
       
	$result = mysqli_query($link, $query);


		// PICTURE UPLOAD 
	if($result){
		


		if (!empty($_FILES['image']['name'])) {
		
		$target_dir = "../../public/img-cars/".$row['id']."/";
		$target_file = $target_dir."main".$row['id'].".jpg";
		$image = $_FILES["image"]["tmp_name"];
		chown($target_file, 666);
		unlink($target_file);
		move_uploaded_file($image, $target_file);
		}

         header("Location: car-preview.php?id=$id ");
	}else{
		echo "PROBLEM WITH UPDATE";
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