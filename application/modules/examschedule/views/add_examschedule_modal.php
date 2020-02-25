<!-- Modal -->
<div id="addExamScheduleModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      	<div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	        <h4 class="modal-title text-center">Add Exam Schedule</h4>
      	</div>
        <form id="add_examschedule_form" class="form-horizontal form-label-left" action="<?php echo base_url();?>examschedule/add" method="post" enctype="multipart/form-data" >
	      <div class="modal-body">
	      	<div class="container">
	            <div class="row">

	            	<div class='col-md-4 col-sm-12 col-xs-12 form-group'>
	                    Exam Schedule Title
	                    <input id="exam_schedule_title" class="form-control col-md-7 col-xs-12" type="text" name="exam_schedule_title">
	                </div>

		              <div class='col-md-4 col-sm-12 col-xs-12 form-group'>
		                Exam Name *
		                <select id="exam_id" name="exam_id" class="form-control">
	                      <option value="">Select Exam</option>
	                      <?php 
                              if(!empty($all_exams)){
                            foreach($all_exams as $e_key=>$e_val){ ?>
                              <option value="<?php echo $e_val->id; ?>" ><?php echo $e_val->exam_name; ?></option>
                            <?php } } ?>
	                    </select>
		              </div>
		              <div class='col-md-4 col-sm-12 col-xs-12 form-group'>
	                    Class *
	                    <select id="class_id" name="class_id" class="form-control">
	                      <option value="">Select Class</option>
	                      <?php 
                              if(!empty($all_classes)){
                            foreach($all_classes as $c_key=>$c_val){ ?>
                              <option value="<?php echo $c_val->id; ?>" ><?php echo $c_val->class; ?></option>
                            <?php } } ?>
	                    </select>
	                  </div>
	                  <div class='col-md-4 col-sm-12 col-xs-12 form-group'>
	                    Section *
	                    <select id="section_id" name="section_id" class="form-control">
	                      <option value="">Select Section</option>
	                      
	                    </select>
	                  </div>
	                  <div class='col-md-4 col-sm-12 col-xs-12 form-group'>
	                    Subject *
	                        <select id="subject_id" name="subject_id" class="form-control">
	                          <option value="">Select Subject</option>
	                        </select>
	                  </div>
		              <div class='col-md-4 col-sm-12 col-xs-12 form-group'>
	                    Date *
	                    <input id="e_schedule_date" class="form-control col-md-7 col-xs-12" type="text" name="e_schedule_date">
	                  </div>
		              <div class='col-md-4 col-sm-12 col-xs-12 form-group'>
	                    Time From *
	                    <input id="time_from" class="form-control col-md-7 col-xs-12" type="text" name="time_from">
	                  </div>
	                  <div class='col-md-4 col-sm-12 col-xs-12 form-group'>
	                    Time To *
	                    <input id="time_to" class="form-control col-md-7 col-xs-12" type="text" name="time_to">
	                  </div>
	                  <div class='col-md-4 col-sm-12 col-xs-12 form-group'>
	                    Room
	                    <input id="room_no" class="form-control col-md-7 col-xs-12" type="text" name="room_no">
	                  </div>
	            </div>

	         </div>

	      	</div>
			<div class="modal-footer">
				<input type="submit" name="submit" class="btn btn-success" value="Submit">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
        </form>
    </div>

  </div>
</div>