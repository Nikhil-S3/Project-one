<!-- Modal -->
<div id="addExamModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      	<div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	        <h4 class="modal-title text-center">Add Exam</h4>
      	</div>
        <form id="add_exam_form" class="form-horizontal form-label-left" action="<?php echo base_url();?>exams/add" method="post" enctype="multipart/form-data" >
	      <div class="modal-body">
	      	<div class="container">
	            <div class="row">

		              <div class='col-md-4 col-sm-12 col-xs-12 form-group'>
		                Exam Name *
		                <input type="text" id="exam_name" name='exam_name' class="form-control" >
		              </div>
		              <div class='col-md-4 col-sm-12 col-xs-12 form-group'>
	                    Date *
	                    <input id="exam_date" class="form-control col-md-7 col-xs-12" type="text" name="exam_date">
	                  </div>
		              <div class='col-md-4 col-sm-12 col-xs-12 form-group'>
	                    Note
	                    <textarea id="notes" class="form-control col-md-7 col-xs-12" type="text" name="notes"></textarea>
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