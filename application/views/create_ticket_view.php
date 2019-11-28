<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">Create A Ticket</h3>
            <?php echo validation_errors();?>
            <?php echo $this->session->flashdata('msg');?>
            
        </div>  
        <!-- /.col-lg-12 -->
    </div>
    
     <div class="col-lg-4">
     <?php echo form_open()?>
    
    <label for="facility">Facility</label>
    <select name="facility" id="facility" class="form-control">
    <option value="">Select ...</option>
    <?php foreach($facility->result_array() as $row){
      ?><option value="<?php echo $row["facility_code"];?>"><?php  echo $row["facility_name"];?></option>
   <?php  }?>
    
    </select><br>
    <label for="analyser">Analyser</label>
    <select name="analyser" id="analyser" class="form-control">
    <option >Select ...</option>
    <?php foreach($analysers->result_array() as $row){
      ?><option><?php  echo $row["model_number"];?></option>
   <?php  }?>    
  </select><br>
  
    <label for="complaint">Client Complains</label>
    <textarea  id="complaint" class="form-control" placeholder="please enter clients complains" name="complaint">
    </textarea><br>

    <label for="comments">Special Notes</label>
    <textarea  id="comments" class="form-control" placeholder="please enter a Special note" name="comment">
    </textarea><br>
    <input type="submit" class="form-control btn-primary" value="Submit">
     </div>
    
            <!-- /.row -->
    </form> 
       <!-- /#page-wrapper -->
</div>
    <!-- /#wrapper -->
   
