[1mdiff --git a/application/views/employee/index.php b/application/views/employee/index.php[m
[1mindex c9628a9..02315bd 100755[m
[1m--- a/application/views/employee/index.php[m
[1m+++ b/application/views/employee/index.php[m
[36m@@ -6,10 +6,10 @@[m
         	<div class="table-title">[m
                 <div class="row">[m
                     <div class="col-sm-12">[m
[31m-				    	<h3 style="color: red; background: yellow; text-align: center;"> <?php echo $this->session->flashdata('msg_cat_pass'); ?> </h3>[m
[31m-				    	<h3 style="color: red; background: yellow; text-align: center;"> <?php echo $this->session->flashdata('msg_prod_pass'); ?> </h3>[m
[31m-				    	<h3 style="color: red; background: yellow; text-align: center;"> <?php echo $this->session->flashdata('msg_cat_fail'); ?> </h3>[m
[31m-				    	<h3 style="color: red; background: yellow; text-align: center;"> <?php echo $this->session->flashdata('msg_prod_fail'); ?> </h3>[m
[32m+[m				[41m    [m	[32m<h3 style="color: red; background: #fff; text-align: center;" class='hide-it-msg'> <?php echo $this->session->flashdata('msg_cat_pass'); ?> </h3>[m
[32m+[m				[41m    [m	[32m<h3 style="color: red; background: #fff; text-align: center;" class='hide-it-msg'> <?php echo $this->session->flashdata('msg_prod_pass'); ?> </h3>[m
[32m+[m				[41m    [m	[32m<h3 style="color: red; background: #fff; text-align: center;" class='hide-it-msg'> <?php echo $this->session->flashdata('msg_cat_fail'); ?> </h3>[m
[32m+[m				[41m    [m	[32m<h3 style="color: red; background: #fff; text-align: center;" class='hide-it-msg'> <?php echo $this->session->flashdata('msg_prod_fail'); ?> </h3>[m
 					</div>[m
             	</div>[m
         	</div>[m
[36m@@ -41,7 +41,7 @@[m
 						<th>Description</th>[m
                         <th>Quentity</th>[m
                         <th>Created</th>[m
[31m-                        <!-- <th>Actions</th> -->[m
[32m+[m[32m                        <th>Actions</th>[m
                     </tr>[m
                 </thead>[m
                 <tbody>[m
[36m@@ -54,16 +54,18 @@[m
 									<label for="checkbox1"></label>[m
 								</span>[m
 							</td> -->[m
[31m-							<td><?= $i; ?></td>[m
[32m+[m							[32m<?php if (!empty($prod->prod_name)): ?>[m
[32m+[m							[32m<td><?= $i ?></td>[m
 							<td><?= $prod->category_name ?></td>[m
 	                        <td><?= $prod->prod_name ?></td>[m
 	                        <td><?= $prod->prod_desc ?></td>[m
 	                        <td><?= $prod->prod_quentity ?></td>[m
[31m-	                        <td><?= $prod->created_at ?></td>[m
[31m-	                        <!-- <td>[m
[31m-	                            <a href="#editEmployeeModal" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>[m
[32m+[m	[32m                        <td><?php echo date("d-M-Y", strtotime($prod->created_at)); ?></td>[m
[32m+[m	[32m                        <td>[m
[32m+[m	[32m                            <a href="#editEmployeeModal" class="edit" id="<?= $prod->prod_id ?>" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>[m
 	                            <a href="#deleteEmployeeModal" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>[m
[31m-	                        </td> -->[m
[32m+[m	[32m                        </td>[m
[32m+[m							[32m<?php endif; ?>[m
 	                    </tr>[m
 		            <?php $i++; } } else { ?>[m
 		            	<tr>[m
[36m@@ -133,31 +135,37 @@[m
 	</div>[m
 [m
 	<!-- Edit Modal HTML -->[m
[31m-	<!-- <div id="editEmployeeModal" class="modal fade">[m
[32m+[m	[32m<div id="editEmployeeModal" class="modal fade">[m
 		<div class="modal-dialog">[m
 			<div class="modal-content">[m
[31m-				<form>[m
[32m+[m				[32m<form action="<?= base_url() ?>" method="post" class="editproduct">[m
 					<div class="modal-header">						[m
 	