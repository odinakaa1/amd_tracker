

        <div id="page-wrapper"><br>
            <div class="row" id="filter">
            </div><br>
            <!-- /.row -->
            <div class="row">
                
                
                <div class="col-lg-12">
                    <h3>Add Facility</h3>
                    <?php echo validation_errors();?>
                    <?php echo $this->session->flashdata('msg');?>
                </div>
               <?php echo form_open();?>
                <div class="col-lg-4">
                <label for="facility_name">Facility Name</label>
                    <input type="text" name="facility_name" id="facility_name" class="form-control" placeholder="please enter facility name" value="<?php echo set_value('facility_name');?>" ><br>
                    <select name="country" id="" class="form-control">
                       
                        <option value="" selected="">select country</option>
                        <?php foreach ($countries->result_array() as $row)
                        {?>
                        <option value="<?php echo $row['id']; ?>"><?php  echo country_name_from_id($row['id']);
                        }?></option>          
                    </select><br>

                    <select name="state" id="" class="form-control">
                       
                        <option value="" selected="">Select State</option>
                        <?php foreach ($states->result_array() as $row)
                        {?>
                        <option value="<?php echo $row['id']; ?>"><?php  echo state_name_from_id($row['id']);
                        }?></option>          
                    </select><br>

                    <select name="lga" id="" class="form-control">
                       
                       <option value="" selected="">Select LGA</option>
                       <?php foreach ($lga->result_array() as $row)
                       {?>
                       <option value="<?php echo $row['id']; ?>"><?php  echo lga_name_from_id($row['id']);
                       }?></option>          
                   </select><br>
                    <label for="contact_person">Contact Person Name</label>
                    <input type="text" id="contact_person"   value="<?php echo set_value("contact_person_name")?>"placeholder="Please contact person name" class="form-control" name="contact_person_name"><br>
                    <label for="contact_person_email">Contact Person Email</label>
                    <input type="email" id="contact_person_email" value="<?php echo set_value("contact_person_email")?>" placeholder="Please enter contact person email" class="form-control" name="contact_person_email"><br>
                    <label for="contact_person_phone">Contact Person Phone</label>
                    <input type="text" id="contact_person_phone" value="<?php echo set_value("contact_person_phone")?>" placeholder="Please enter contact person phone" class="form-control" name="contact_person_phone"><br>
                    <label for="contact_person_phone">Street Name & Number</label>
                    <input type="text" id="address" value="<?php echo set_value("address")?>" placeholder="Please enter facility street & number" class="form-control" name="address"><br>
                    <label for="facility_prefix">Facility Prefix</label>
                    <input type="text" id="facility_prefix"  value="<?php echo set_value("facility_prefix")?>" placeholder="eg state_code/MM/YY LAG/12/17" class="form-control" name="facility_prefix"><br>
                    <input type="submit" class="form-control btn-primary" value="Submit">
                </div>
                </form>
                <!-- /.col-lg-12 -->
            </div>
            
            
           
          
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
