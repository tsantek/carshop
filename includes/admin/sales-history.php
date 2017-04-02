<?php include "header.php"; ?>

<?php include "navigation.php"; ?>
    
  

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    
                </div>

                <div class="row">
                    <div class="col-lg-12">
                       <table class="table">
                            <thead>
                                <tr>
                                <th>#</th>
                                <th>Brand</th>
                                <th>Model</th>
                                <th>VIN Number</th>
                                <th>Sale Price</th>
                                <th>Sales Person</th>
                                 <th>Customer</th>
                                 <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>

														<?php
															global $link;
															$query = "SELECT * FROM cars WHERE sold = 1 ORDER BY brand";
															$result = mysqli_query($link , $query);
															
															while($row = mysqli_fetch_assoc($result)){
														?>
                                <tr>
																
                                <th scope="row"><?php echo $row['id']; ?></th>
                                <td><?php echo $row['brand']; ?></td>
                                <td><?php echo $row['model']; ?></td>
                                <td><?php echo $row['vinNumber']; ?></td>
                                <td><?php echo $row['salePrice']; ?></td>
                                <td><?php echo $row['salesPerson']; ?></td>
                                <td><?php echo $row['customer']; ?></td>
                                <td><?php echo $row['dateOfSale']; ?></td>
                                <td>
																	<a href="sold-car-preview.php?id=<?php echo $row['id']; ?>">Preview</a>
															 </td>
															 

																
																
                                </tr>
                               
															 <?php 
															}
																?>


                            </tbody>
                        </table>
												
														
                    </div>
                </div>
            </div>
        </div>


				





        <!-- /#page-content-wrapper -->

  <?php include "footer.php"; ?>