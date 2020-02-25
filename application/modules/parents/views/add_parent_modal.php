<!-- Modal -->
<div id="addParentModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title text-center">ADD PARENT</h4>
        </div>
          <form id="add_parent_form" data-parsley-validate class="form-horizontal form-label-left" action="<?php echo base_url();?>parents/save" method="post" enctype="multipart/form-data" >

            <div class="modal-body">
              <div class="container">
                <div class="row">

                      <div class='col-md-4 col-sm-12 col-xs-12 form-group'>
                        Guardian Name *
                          <input type="text" id="parent_guardian_name" name='parent_guardian_name' class="form-control" >
                      </div>
                      <div class='col-md-4 col-sm-12 col-xs-12 form-group'>
                        Father's Name
                          <input type="text" id="parent_father_name" name="parent_father_name" class="form-control" >
                      </div>
                      <div class='col-md-4 col-sm-12 col-xs-12 form-group'>
                        Mother's Name
                          <input type='text' class="form-control" name="parent_mother_name" />
                      </div>
                      <div class='col-md-4 col-sm-12 col-xs-12 form-group'>
                        Father's Profession
                          <input type='text' class="form-control" name="parent_father_profession" />
                      </div>
                      
                      <div class='col-md-4 col-sm-12 col-xs-12 form-group'>
                        Mother's Profession
                          <input id="parent_mother_profession" class="form-control col-md-7 col-xs-12" type="text" name="parent_mother_profession" >
                      </div>
                      <div class='col-md-4 col-sm-12 col-xs-12 form-group'>
                        Email
                        <input id="email" class="form-control col-md-7 col-xs-12" type="text" name="email" value="<?php echo set_value('email'); ?>">
                        <span class="email_exists_error" style="display: none;color:red"></span>
                      </div>
                      <div class='col-md-4 col-sm-12 col-xs-12 form-group'>
                        Phone
                        <input id="phone" class="form-control col-md-7 col-xs-12" type="text" name="phone" value="<?php echo set_value('phone'); ?>">
                      </div>
                      <div class='col-md-4 col-sm-12 col-xs-12 form-group'>
                        Address
                        <input id="address" class="form-control col-md-7 col-xs-12" type="text" name="address" value="<?php echo set_value('address'); ?>">
                      </div>
                      
                      <div class='col-md-4 col-sm-12 col-xs-12 form-group'>
                        Photo
                        <input id="photo" class="form-control col-md-7 col-xs-12" type="file" name="photo" value="<?php echo set_value('photo'); ?>">
                      </div>
                      
                      <div class='col-md-4 col-sm-12 col-xs-12 form-group'>
                        Username *
                          <input id="username" class="form-control col-md-7 col-xs-12" type="text" name="username" value="<?php echo set_value('username'); ?>">
                          <span class="username_exists_error" style="display: none;color:red"></span>
                      </div>
                      <div class='col-md-4 col-sm-12 col-xs-12 form-group'>
                        Password *
                          <input id="password" class="form-control col-md-7 col-xs-12" type="password" name="password">
                      </div>

                        <!-- <input id="role_id" type="hidden" name="role_id" value="2"> -->

                        <!-- <div class="ln_solid"></div> -->

                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <input type="submit" class="btn btn-success add_parent_btn" value="Submit">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </form>
          </div>
        </div>
      </div>