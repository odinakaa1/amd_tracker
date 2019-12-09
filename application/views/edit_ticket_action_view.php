<div id="page-wrapper">

    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">Add Action to Ticket</h3>
            <?php echo validation_errors();?>
            <?php echo $this->session->flashdata('msg');?>
            
        </div>  
        <!-- /.col-lg-12 -->
    </div>
    
     <div class="col-lg-4">
     <?php echo form_open()?>
    
   
   <label for="ticket">Ticket Number</label>
   <input type="text" class="form-control" id="ticket"readonly="" value="<?php echo $ticket->result_array()[0]['ticket_id'];?>" name="code" >
    </select><br>
    <label for="start_date">Start Date</label>
   <input type="date" id="start_date" class="form-control" name="start_date" value="<?php echo $ticket->result_array()[0]['start_date']?>" placeholde="dd/mm/yyyy">
   <br>
   <label for="start_time">Start Time</label>
   <input type="time" id="start_time" class="form-control" name="start_time" value="<?php echo $ticket->result_array()[0]['start_time']?>">
   <br>

    <label for="end_date">End Date</label>
   <input type="date" id="end_date" class="form-control" name="end_date" value="<?php echo $ticket->result_array()[0]['end_date']?>">
   <br>
   <label for="end_time">End Time</label>
   <input type="time" id="end_time" class="form-control" name="end_time" value="<?php echo $ticket->result_array()[0]['end_time']?>"> 
   <br>
  
    <label for="action">Action Taken</label>
    <input type="text" name="action" id="action"  class="form-control" value="<?php echo $ticket->result_array()[0]['action']?>"><br>
   

    <label for="over_time">Over Time</label>
    <input type="text" class="form-control" name="over_time" value="<?php echo $ticket->result_array()[0]['over_time']?>" ><br>
    <input type="submit" class="form-control btn-primary" value="Submit">
     </div>
    
            <!-- /.row -->
    </form> 
       <!-- /#page-wrapper -->
</div>
    <!-- /#wrapper -->
   
