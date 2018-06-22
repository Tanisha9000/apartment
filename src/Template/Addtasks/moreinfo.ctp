<?php
//echo "<pre>";
//print_r($checktask);
//echo "</pre>";
?>
  <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Add more Information
       
      </h1>
      <ol class="breadcrumb">
<!--        <li><a href="index.html"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Properties</a></li>-->
        <li class="active">Add more Information </li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content content2">
      <div class="row">
        <!-- left column -->
        <div class="col-md-10">
          <!-- general form elements -->
          
      <div class="box box-primary">
            
            <!-- /.box-header -->
            <!-- form start -->
             <?php echo $this->Form->create($checktask,['id' => 'moreinfo',
            'type' => 'file']);
        
         ?>
            
            <div class="box-header with-border">
              <h3 class="box-title">  Add details </h3>
            </div>
            
            <div class="box-body col-md-4" style="float:none;">
                           <?php
               foreach ($image as $addtaskinfos){
     ?>
<div id="filediv" style="display: block;"><div id="abcd2" class="abcd"><div class="abcd2img"><img id="previewimg2" src="<?php echo $this->request->getAttribute("webroot").'task_dir'.'/'.$addtaskinfos['image'];  ?>">
        </div>
    </div></div>
<?php
 } ?>
                
                
                <?php
                    echo $this->Form->control('how_many', [
                        'templates' => [
                            'inputContainer' => '<div class="form-group fullinput">{{content}}</div>'
                        ],
                        'label' => 'How Many',
                        'class' => 'form-control',
                        'type' => 'Number'
                    ]);
                    ?>
                
                
<!--                <div class="form-group fullinput">
                  <label for="inputBuilding" class="col-sm-4 control-label" style="padding-top:7px; margin-bottom:0;">How Many</label>
                  <div class="col-sm-8">
                    <input type="number" class="form-control" id="inputBuilding" value="1">
                  </div>
                </div>-->
                <?php
                    echo $this->Form->control('file[]', [
                        'templates' => [
                            'inputContainer' => '<div class="form-group">{{content}}</div>'
                        ],
                        'class' => 'form-control',
                        'type' => 'file',
                        'id' => 'file', 
                        'label' => 'Add Image',
                        'multiple' => true,
                         'required' => true
                        
                    ]);
                    ?>
               
                
<!--                <div class="form-group">
                  <label for="exampleInputFile" class="col-sm-4 control-label" style="padding-top:7px; margin-bottom:0;">Add Photos</label>
                   <div class="col-sm-8">
                  <input type="file" id="exampleInputFile" style="margin: 2px 0 15px 0;" >
                  </div>-->

                 
                </div>
                      <?php
                    echo $this->Form->control('comments', [
                        'templates' => [
                            'inputContainer' => '<div class="form-group col-md-4" style="float:none;">{{content}}</div>'
                        ],
                        'label' => 'Comments',
                        'class' => 'form-control',
                        'type' => 'textarea'
                    ]);
                    ?>
<!--                <div class="form-group fullinput">
                  <label for="inputFloor" class="col-sm-4 control-label" style="padding-top:7px; margin-bottom:0;">Comments</label>
                  <div class="col-sm-8">
                    <textarea class="form-control" rows="3" placeholder="Comments"></textarea>
                  </div>
                </div>-->
               
               
             	<div class="col-md-4" style="float:none;">
                <!--<input type="button" id="add_more" class="upload" value="Add More Files"/>-->
            <div class="box-footer">
                  <?php
                   
                    echo $this->Form->button(__('Submit', array(
                        'class' => 'btn btn-primary',
                        'id' => 'upload',
                        'name' => 'submit'
                    )));
                    ?>
                <!--<button type="submit" class="btn btn-primary">Submit</button>-->
              </div>
                </div>
              
               </div>
         
           
                    <!-- /.box-body -->

<?php echo $this->Form->end(); ?>  
      </div>    
          
          
          
          <!-- /.box -->

          <!-- Form Element sizes -->
          
        


        </div>
        <!--/.col (left) -->
        <!-- right column -->
        
        <!--/.col (right) -->
     
      <!-- /.row -->
    </section>

<script> 
//    alert("check");
  //  var abc = 0;      // Declaring and defining global increment variable.
//    $(document).ready(function () {
      //  alert("h");
//        alert("ffh");
//  To add new input file field dynamically, on click of "Add More Files" button below function will be executed.
       $('#add_more').click(function () {
//            alert("here");
            $(this).before($("<div/>", {
            }).fadeIn('slow').append($("<input/>", {
                name: 'file[]',
                type: 'file'
            }), $("<br/><br/>")));
        });

//        }
        </script>
       

