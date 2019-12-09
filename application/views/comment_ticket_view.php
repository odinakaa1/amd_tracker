

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                
                    <h3 class="page-header">Comment Ticket Action</h3>
                   
                    <div class="box">
                        <div>
                        
                        <?php echo form_open();?>
                            <div></div>
                            <div data-row2>
                                <span data-row2col1>  You are commenting on Ticket:   <span ><span class="badge badge-secondary"><?php echo $actions->result_array()[0]['ticket_id'];?></span></span>
                            </div>
                            <div>
                            <h4>Action:</h4> <?php echo $actions->result_array()[0]['action'];?>
                            </span>
                            </div><hr>
                            
                                <textarea  class="form-control" rows="4" name="comment"> 
                               </textarea>    
                                <br>
                                <input type="hidden" name="action_id" value="<?php echo $actions->result_array()[0]['id'];?>">
                                <input type="submit" value="submit" class="form-control btn btn-primary">
                                <?php echo validation_errors();?><br>
                            <?php echo $this->session->flashdata('msg');?>
                            </div>
                        </div>
                        
                    </div>
        
                    </form>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
