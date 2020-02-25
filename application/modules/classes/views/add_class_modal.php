<!-- Modal -->
<div id="addClassModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      	<div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	        <h4 class="modal-title text-center">ADD CLASS</h4>
      	</div>
        <form id="add_class_form" class="form-horizontal form-label-left" action="<?php echo base_url();?>classes/save" method="post" enctype="multipart/form-data" >
	      <div class="modal-body">
	      	<div class="container">
	            <div class="row">

		              <div class='col-md-4 col-sm-12 col-xs-12 form-group'>
		                Class *
		                <input type="text" id="class_of_student" name='class_of_student' class="form-control" >
		              </div>
		              <div class='col-md-4 col-sm-12 col-xs-12 form-group'>
	                    Class Numeric
	                    <input id="class_numeric" class="form-control col-md-7 col-xs-12" type="text" name="class_numeric">
	                  </div>
		              <div class='col-md-4 col-sm-12 col-xs-12 form-group'>
		                Teacher Name
	                    <select id="teacher_id" name="teacher_id" class="form-control">
	                      <option value="">Select Teacher..</option>
	                      <?php 
	                      if(!empty($all_teachers)){
	                      	foreach($all_teachers as $t_key=>$t_val){
	                      ?>
	                      <option value="<?php echo $t_val->id;?>" ><?php echo $t_val->preferred_name ?></option>
	                      <?php } } ?>
	                    </select>
		              </div>
	                  <div class='col-md-4 col-sm-12 col-xs-12 form-group'>
	                    Note
	                    <textarea id="notes" class="form-control col-md-7 col-xs-12" type="text" name="notes"></textarea>
	                  </div>
	            </div>

	            <div class="notes notes-danger">
		      		<p><strong>NOTE:</strong> Create a teacher before create a new class.</p>
		      	</div>
	            
	         </div>

	      	</div>
			<div class="modal-footer">
				<input type="submit" class="btn btn-success" value="Submit">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
        </form>
    </div>

  </div>
</div>