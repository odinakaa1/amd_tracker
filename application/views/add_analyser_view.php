<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">Add Analyser to Facility</h3>
            <?php echo validation_errors();?>
            <?php echo $this->session->flashdata('msg');?>
            
        </div>  
        <!-- /.col-lg-12 -->
    </div>
    
     <div class="col-lg-4">
     <?php echo form_open()?>    
    <select name="facility" id="" class="form-control"><br>
   <option value="">Facility ...</option>
   <?php foreach($facility->result_array() as $row){?>
  
   <option value="<?php echo $row["facility_code"];?>"><?php echo $row["facility_name"]." - ".$row["facility_code"] ; ?></option>
   <?php }?>
   </select><br>

   <select name="brands" id="" class="form-control"><br>
   <option value="">Brand ...</option>
   <?php foreach($brands->result_array() as $row){?>
  
   <option><?php echo $row["brand_name"]; ?></option>
   <?php }?>
   </select><br>

   <select name="model" id="" class="form-control"><br>
   <option value="">Select Model...</option>
   <?php foreach($models->result_array() as $row){?>
   <option ><?php echo $row["model_name"]; ?></option>
   <?php }?>
   </select><br>

   <label for="serial">Serial No.</label>
  <input type="text"  class="form-control" id="serial"  name="serial" placeholder="Enter serial number"><br>

  <label for="mac">Mac Address</label>
  <input type="text"  class="form-control" id="mac" name="mac" placeholder="Enter MAC Address"><br>

  <label for="installer">Installer</label>
  <select name="installer" id="" class="form-control"><br>
   <option value="">Select Engr...</option>
   <?php foreach($users->result_array() as $row){?>
  
   <option ><?php echo $row["lname"] ." ".$row["fname"]; ?></option>
   <?php }?>
   </select><br>

  <label for="date">Date</label>
  <input type="date"  class="form-control" id="date" name="date"><br>

  <label for="price">Price</label>
  <input type="price"  class="form-control" id="date" name="date" placeholder="Please Enter selling price"><br>

  <label for="comment">Comment</label>
  <textarea type="comment"  class="form-control" id="comment" name="comment">
</textarea><br>
    <input type="submit" class="form-control btn-primary" value="Submit">
     </div>
            <!-- /.row -->
    </form>    <!-- /#page-wrapper -->
</div>
    <!-- /#wrapper -->
   
