<?php //echo "<pre>"; print_r($prods); echo "</pre>"; die(); ?>
</head>
<body>
    <div class="container">
        <div class="table-wrapper">
        	<div class="table-title">
                <div class="row">
                    <div class="col-sm-12">
				    	<h3 style="color: #01ac01; background: #fff; text-align: center;" class='hide-it-msg'> <?php echo $this->session->flashdata('msg_cat_pass'); ?> </h3>
				    	<h3 style="color: #01ac01; background: #fff; text-align: center;" class='hide-it-msg'> <?php echo $this->session->flashdata('msg_prod_pass'); ?></h3>
				    	<h3 style="color: #fd1200; background: #fff; text-align: center;" class='hide-it-msg'> <?php echo $this->session->flashdata('msg_cat_fail'); ?> </h3>
				    	<h3 style="color: #fd1200; background: #fff; text-align: center;" class='hide-it-msg'> <?php echo $this->session->flashdata('msg_prod_fail'); ?> </h3>
				    	<h3 style="color: #fd1200; background: #fff; text-align: center;" class='hide-it-msg'> <?php echo $this->session->flashdata('msg_exists'); ?> </h3>
					</div>
            	</div>
        	</div>
        	<!-- Test -->
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
						<h2>Product<b>&nbsp;List</b></h2>
					</div>
					<div class="col-sm-6">
						<a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add Product</span></a>
						<a href="#deleteEmployeeModal" class="btn btn-warning" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add Category</span></a>
					</div>
                </div>
            </div>
            <table class="table table-striped table-hover">
            	<?php if (is_array($prods) && !empty($prods)) { ?>
                <thead>
                    <tr>
						<!-- <th>
							<span class="custom-checkbox">
								<input type="checkbox" id="selectAll">
								<label for="selectAll"></label>
							</span>
						</th> -->
						<th>Sr.no</th>
                        <th>Category</th>
                        <th>Product Name</th>
						<th>Description</th>
                        <th>Quentity</th>
                        <th>Created</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
            		<?php $i = 1; 
            			foreach ($prods as $prod) { ?>
	                    <tr>
							<!-- <td>
								<span class="custom-checkbox">
									<input type="checkbox" id="checkbox1" name="options[]" value="1">
									<label for="checkbox1"></label>
								</span>
							</td> -->
							<?php if (!empty($prod->prod_name)): ?>
							<td><?= $i ?></td>
							<td><?= $prod->category_name ?></td>
	                        <td><?= $prod->prod_name ?></td>
	                        <td><?= $prod->prod_desc ?></td>
	                        <td><?= $prod->prod_quentity ?></td>
	                        <td><?php echo date("d-M-Y", strtotime($prod->created_at)); ?></td>
	                        <td>
	                            <a href="#editEmployeeModal" class="edit" id="<?= $prod->prod_id ?>" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
	                            <a href="#deleteEmployeeModal" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
	                        </td>
							<?php endif; ?>
	                    </tr>
		            <?php $i++; } } else { ?>
		            	<tr>
	            			<td>
	            				<h3>No records found !!! </h3>
	            			</td>
		            	</tr>
		            <?php } ?>
                </tbody>
            		
            </table>
			<div class="clearfix">
                <div class="hint-text">Showing <b>5</b> out of <b>25</b> entries</div>
                <ul class="pagination">
                    <li class="page-item disabled"><a href="#">Previous</a></li>
                    <li class="page-item"><a href="#" class="page-link">1</a></li>
                    <li class="page-item"><a href="#" class="page-link">2</a></li>
                    <li class="page-item active"><a href="#" class="page-link">3</a></li>
                    <li class="page-item"><a href="#" class="page-link">4</a></li>
                    <li class="page-item"><a href="#" class="page-link">5</a></li>
                    <li class="page-item"><a href="#" class="page-link">Next</a></li>
                </ul>
            </div>
        </div>
    </div>
	<!-- Edit Modal HTML -->
	<div id="addEmployeeModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<!-- <form action="<?= base_url(); ?>main/putData" method="post" enctype="multipart/form-data">  -->
				<form action="<?= base_url(); ?>main/putProd" method="post" class="addproduct" > 
					<div class="modal-header">						
						<h4 class="modal-title">Add Employee</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
						<div class="form-group">
							<label>Category&nbsp;: </label>
							<!-- <input type="text" name="category" class="form-control" > -->
								<select name="categorys" class="form-control">
								    <option selected>Choose...</option>
								<?php if (count($cates > 0)) { foreach ($cates as $cat) { ?>
								    <option value="<?= $cat->cat_id ?>"><?= $cat->category_name ?></option>
								<?php } } ?>
								</select>
						</div>
						<div class="form-group">
							<label>Product Name&nbsp;: </label>
							<input type="text" name="prodname" class="form-control" >
						</div>
						<div class="form-group">
							<label>Description&nbsp;: </label>
							<textarea class="form-control" name="description" ></textarea>
						</div>
						<div class="form-group">
							<label>Quentity&nbsp;: </label>
							<input type="text" name="quentity" class="form-control" >
						</div>				
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<input type="submit" name="submit" id="prodsubmit" class="btn btn-success" value="Add">
					</div>
				</form>
			</div>
		</div>
	</div>

	<!-- Edit Modal HTML -->
	<div id="editEmployeeModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form action="<?= base_url() ?>" method="post" class="editproduct">
					<div class="modal-header">						
						<h4 class="modal-title">Edit Employee</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
						<div class="form-group">
							<label>Category&nbsp;: </label>
							<!-- <input type="text" name="category" class="form-control" > -->
								<select name="categorys" class="form-control">
								    <option selected>Choose...</option>
								<?php if (count($cates > 0)) { foreach ($cates as $cat) { ?>
								    <option value="<?= $cat->cat_id ?>"><?= $cat->category_name ?></option>
								<?php } } ?>
								</select>
						</div>
						<div class="form-group">
							<label>Product Name&nbsp;: </label>
							<input type="text" name="prodname" class="form-control" >
						</div>
						<div class="form-group">
							<label>Description&nbsp;: </label>
							<textarea class="form-control" name="description" ></textarea>
						</div>
						<div class="form-group">
							<label>Quentity&nbsp;: </label>
							<input type="text" name="quentity" class="form-control" >
						</div>				
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<input type="submit" class="btn btn-info" value="Save">
					</div>
				</form>
			</div>
		</div>
	</div>

	<!-- Delete Modal HTML -->
	<div id="deleteEmployeeModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form action="<?= base_url() ?>main/putCat" method="post">
					<div class="modal-header">						
						<h4 class="modal-title">Category</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
						<!-- <p>Are you sure you want to delete these Records?</p>
						<p class="text-warning"><small>This action cannot be undone.</small></p> -->
						<div class="form-group">
							<label>Category Name&nbsp;: </label>
							<input type="text" name="catname" class="form-control" >
						</div>
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<input type="submit" name="submit" class="btn btn-success" value="Add">
					</div>
				</form>
			</div>
		</div>
	</div>

                                		                            