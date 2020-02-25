<!-- Modal -->
<div id="addSubjectModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title text-center">ADD SUBJECT</h4>
      </div>
      <form id="add_subject_form" data-parsley-validate class="form-horizontal form-label-left" action="<?php echo base_url();?>subject/save" method="post" enctype="multipart/form-data" >

            <div class="modal-body">
                <div class="container">
                  <div class="row">

                      <div class='col-md-4 col-sm-12 col-xs-12 form-group'>
                        Class Name *
                          <select id="class_id" class="form-control" name="class_id">
                            <option value="">Choose..</option>
                            <?php 
                              if(!empty($all_classes)){
                            foreach($all_classes as $c_key=>$c_val){ ?>
                              <option value="<?php echo $c_val->id; ?>" ><?php echo $c_val->class; ?></option>
                            <?php } } ?>
                          </select>
                      </div>
                      <div class='col-md-4 col-sm-12 col-xs-12 form-group'>
                        Teacher Name *
                          <select id="teacher_id" class="form-control" name="teacher_id">
                            <option value="">Choose..</option>
                            <?php 
                              if(!empty($all_teachers)){
                            foreach($all_teachers as $t_key=>$t_val){ ?>
                              <option value="<?php echo $t_val->id; ?>" ><?php echo $t_val->preferred_name; ?></option>
                            <?php } } ?>
                            
                          </select>
                      </div> 
                      <div class='col-md-4 col-sm-12 col-xs-12 form-group'>
                        Type *
                          <select id="subject_type" class="form-control" name="subject_type">
                            <option value="">Choose..</option>
                            <option value="0">Optional</option>
                            <option value="1">Mandatory</option>
                          </select>
                      </div>
                      <div class='col-md-4 col-sm-12 col-xs-12 form-group'>
                        Pass Mark *
                          <input type="text" id="pass_mark" name="pass_mark" class="form-control">
                      </div>
                      <div class='col-md-4 col-sm-12 col-xs-12 form-group'>
                        Final Mark *
                          <input type="text" id="final_mark" name="final_mark" class="form-control">
                      </div>
                      <div class='col-md-4 col-sm-12 col-xs-12 form-group'>
                        Subject Name *
                          <input type="text" id="subject_name" name="subject_name" class="form-control">
                      </div>
                      <div class='col-md-4 col-sm-12 col-xs-12 form-group'>
                        Subject Author
                          <input type="text" id="subject_author" name="subject_author" class="form-control">
                      </div>
                      <div class='col-md-4 col-sm-12 col-xs-12 form-group'>
                        Subject Code *
                        <input type="text" id="subject_code" name="subject_code" class="form-control">
                      </div>
                      
                  </div>

                  <div class="notes notes-danger">
                    <p><strong>NOTE:</strong> Create a teacher & class before create a new subject.</p>
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

