

        <div id="page-wrapper"><br>
            <div class="row" id="filter">
            </div><br>
            <!-- /.row -->
            <div class="row">
                
                
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           All countries
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                        <button class="btn btn-primary" > <i class="fa fa-plus fa-2x"></i> <a href="<?php echo base_url('location/addcountry')?>" class="btn btn-primary">Add Country</a></button><br><br>
                            
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>S/N</th>
                                            <th>Name</th>
                                            <th>Name</th>                                          
                                        </tr>
                                    </thead>
                                    <?php
                                    $i= 0;
                                    foreach($countries->result_array() as $row){
                                    $i++;
                                       ?>
                                    <tbody>
                                        <tr class="">
                                            <td><?php echo $i;?></td>
                                            <td><a href="tickets_more_info/<?php echo $row["id"]?>"><?php echo $row["country_name"]?></a></td> 
                                            
                                            <td>
                                            <div class="dropdown">
                                                <button id="dLabel" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    Action
                                                    <span class="caret"></span>
                                                </button>
                                                <ul class="dropdown-menu" aria-labelledby="dLabel">
                                               
                                                  
                                                 <li><i class="fa fa-pencil" ><a href="" >Edit</a></i></li>
                                                 <li><i class="fa fa-minus"><a href="">Delete</a></i></li>
                                                </ul>
                                            </div>
                                            </td>                                           
                                        </tr>                                      
                                        <?php  }?>
                                      
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                            
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            
            
           
          
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
