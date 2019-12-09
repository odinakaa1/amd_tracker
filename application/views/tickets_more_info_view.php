

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header">Ticket Summary</h3>
                    <div class="box">
                        <div>                      
                            <div data-row1>
                            <span data-row1col1> <?php echo $tickets->result_array()[0]["date_time"];?> | </span>
                            <span data-row1col2><span> <?php echo $tickets->result_array()[0]["analyser"];?> </span>
                            </div>
                            <div></div>
                            <div data-row2>
                                <span data-row2col1>  Ticket No. <span ><span class="badge badge-secondary"><?php echo $tickets->result_array()[0]["code"];?></span></span><br>
                                <span data-row2col1>  Status <span ><span class="badge badge-secondary"><?php echo $tickets->result_array()[0]["status"];?></span></span><br>
                                <span data-row2col1>  Facility <span ><span class="badge badge-secondary"><?php echo facility_name_from_code($tickets->result_array()[0]["facility_id"])?></span></span><br>
                        
                            </div>
                            <div>
                            <h6>DT<span class="badge badge-secondary"><?php echo date_difference($tickets->result_array()[0]["id"]);?></span></span></h6>
                            </span>
                            </div>
                            <i class="fa fa-plus" style="margin-left: 2%;"></i>
                            
                            <a href="<?php echo base_url('ticket/add_action/'.$tickets->result_array()[0]["id"])?>">Add Action</a>
                            <hr>
                            <div>
                            <?php foreach($ticket_actions->result_array() as $row){
                                $sum[] =  $row["over_time"];
                               

                                ?>
                                <ul>
                                    <li> <?php echo $row["action"]?><br><span class="badge badge-secondary"><?php echo $row["start_date"]." ".$row["start_time"]?>; </span> Over Time; <span class="badge badge-secondary"><?php echo $row["over_time"]?> hours</span> </i></li>
                            <?php if(user_level_from_id($this->session->user_id)==0){ ?>
                                <a href="<?php echo site_url('ticket/comment_ticket/'.$row["id"]);?>" class="btn btn-primary"><i class="fa fa-pencil fa-fw"></i></a>
                            <?php }else{?>
                                
                                
                                <a href="<?php echo site_url('ticket/edit_ticket_action/'.$row["id"]);?>" class="btn btn-primary"><i class="fa fa-pencil fa-fw"></i></a>
                            
                            <?php }?>
                                    <hr>
                                    <!-- <li>Changed RV sensor <span class="badge badge-secondary">15/06/2019; 2:45PM</span> Over Time; <span class="badge badge-secondary">2 hours</span>
                                       <ul>
                                            <li class="reply"> Please adjust the over time<span class="badge badge-secondary">15/06/2019; 2:45PM</span> </li>
                                            <li class="reply"> Please adjust the over time<span class="badge badge-secondary">15/06/2019; 2:45PM</span> </li>
                                            <li class="reply"> Please adjust the over time<span class="badge badge-secondary">15/06/2019; 2:45PM</span> </li>
                                       </ul>
                                    </li><a href="comment_ticket" class="btn btn-primary"><i class="fa fa-pencil fa-fw"></i></a> <hr>
                                    <li>Changed water <span class="badge badge-secondary">16/06/2019; 2:45PM</span> Over Time; <span class="badge badge-secondary">0 hours</span></li><a href="comment_ticket" class="btn btn-primary"><i class="fa fa-pencil fa-fw"></i></a> <hr>                               -->
                                   <?php foreach(action_remarks($row["id"])->result_array() as $remarks)
                                        {?>
                 
                                            <li class="reply"> <?php echo $remarks["remarks"]; ?><span class="badge badge-secondary"> <?php echo $remarks["date_time"];} ?></span> </li>   
                                
                                </ul>
                                <?php }?>
                                <?php if(user_level_from_id($this->session->user_id)==0){?>
                                    <?php echo validation_errors();?>
                                    <?php echo form_open();?>
                                    <?php echo $this->session->flashdata('msg');?>
                                    <label for="sum">Total Over Time</label>
                                    <input type="text" id="sum" class="form-control" name="over_time" value="<?php  if(empty($sum)){echo 0;}else{echo array_sum($sum);}?>"><br>
                                    <label for="status">Status</label>
                                    <select name="status" id="status" class="form-control col-sm">
                                    <option> <?php echo $tickets->result_array()[0]["status"];?></option>
                                   <option >Approve</option>
                                    <option>Rejected</option>
                                </select> <br>
                                <input type="submit" value="submit" class="form-control btn btn-primary">
                                </form>
                               <?php }?> 
                            </div>
                           
                        </div>
                        
                    </div>
    
                    
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div><br>
    <!-- /#wrapper -->
