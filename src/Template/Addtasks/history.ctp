<?php 
//echo "<pre>";
// print_r($taskdetail[0]);
//echo "</pre>";
//echo "<pre>";
// print_r($image);
//echo "</pre>";
?>
     


<section class="content content2">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"> Details</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form">
        	 <!-- /.box-body -->
              <div class="box">
        	<!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">
                <tbody><tr>
                  <th style="width:10px;">S.No</th>
                  <th style="width:120px;">Task</th>
                  <th style="width:170px;">Assign (Sub Contractor)</th>
                
                  <th>Photos</th>
                  <th> Comments </th>
                </tr>
                    <?php
                                    if (isset($_GET['page'])) {
                                        $i = ($_GET['page'] * 10) + 1;
                                    } else {
                                        $i = 1;
                                    }
                                    foreach ($taskdetail as $task):
                                        ?>
                <tr>
                  <td><?php echo $i; ?></td>
                  <td><?php echo $task['task']['name']; ?></td>
                  
                  <td>
                  <p class="text-center"><?php echo $task['user']['name']; ?></p>
                 </td>
                 <td style="width:200px;">  <?php foreach ($task['addtaskinfos'] as $addtaskinfos){   ?>
                  <p class="text-center"><img style="width:150px;" src="<?php echo $this->request->getAttribute("webroot").'task_dir'.'/'.$addtaskinfos['image'];  ?>">  </p>
                  <?php } ?>
                 </td>
                 <td>
                  <p class="text-left"> <?php echo $task['comments']; ?></p>
                 </td>
                </tr>
                  <?php
                                        $i++;
                                        ?>
                                    <?php endforeach; ?>
<!--                <tr>
                  <td>2.</td>
                  <td>Transfer Unit</td>                 
                  <td><p class="text-center"> Subcontractor 1</p> </td>
                  <td class="text-center">
                   <p class="text-success"> Yes</p>
                  </td>
                 <td class="text-center">
                    <p class="text-success"> Yes</p>
                  </td>
                 <td class="text-center">
                 Red
                  </td>
                   <td>
                  <p class="text-center"> pic1  </p>
                 </td>
                 <td>
                  <p class="text-left">  It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. </p>
                 </td>
                </tr>-->
<!--                <tr>
                  <td>3.</td>
                  <td>Repairs Needed</td>                 
                  <td><p class="text-center"> Subcontractor 1</p> </td>
                  <td class="text-center">
<p class="text-success"> Yes</p>
                  </td>
                 <td class="text-center">
                    <p class="text-warning"> - </p>
                  </td>
                 <td class="text-center">
                6 sq foot
                  </td>
                   <td>
                  <p class="text-center"> pic1  </p>
                 </td>
                 <td>
                  <p class="text-left">  It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. </p>
                 </td>
                </tr>-->
<!--                <tr>
                  <td>4.</td>
                  <td>Carpet Clean</td>                  
                  <td><p class="text-center"> Subcontractor 1</p>

 </td>
                  <td class="text-center">
<p class="text-danger	"> -</p>
                  </td>
                 <td class="text-center">
                    <p class="text-success"> Yes</p>
                  </td>
                 <td class="text-center">
                 Red
                  </td>
                   <td>
                  <p class="text-center"> pic1  </p>
                 </td>
                 <td>
                  <p class="text-left">  It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. </p>
                 </td>
                </tr>-->
                
<!--                <tr>
                  <td>5.</td>
                  <td>Full / Partial Paint</td>
                  <td><p class="text-center"> Subcontractor 1</p> </td>
                  <td class="text-center">
                   <p class="text-warning">-</p>
                  </td>
                 <td class="text-center">
                   <p class="text-success"> Yes</p>
                  </td>
                 <td class="text-center">
            10 sq foot
                  </td>
                   <td>
                  <p class="text-center"> pic1  </p>
                 </td>
                 <td>
                  <p class="text-left">  It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. </p>
                 </td>
                </tr>-->
                
              
                
              </tbody></table>
            </div>
            <!-- /.box-body -->
            
          </div>
          
              
         
            </form>
          </div>
          <!-- /.box -->

          <!-- Form Element sizes -->
          
        


        </div>
        <!--/.col (left) -->
        <!-- right column -->
        
        <!--/.col (right) -->
      </div>
      <!-- /.row -->

      <!-- /.row -->
    </section>