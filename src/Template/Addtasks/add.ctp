<section class="content-header">
<h1>
add tasks to property
</h1>
<ol class="breadcrumb">
  <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
  <li class="active"> add tasks</li>
</ol>
</section>

<!-- Main content -->
<section class="content content2">
<div class="row">
  <!-- left column -->
  <div class="col-md-10">
    <!-- general form elements -->
    <div class="box box-primary">
     <div class="box-header with-border">
        <h3 class="box-title">Select tasks</h3>
      </div>
        <div class="box-body">
                 <?= $this->Form->create($task) ?>

                 <div class="form-group">
                 <form>
                 <?php foreach ($task as $tas) { ?> 
                     <div class="checkbox">
                     <label>
                      <input type="checkbox" name="tasks[]" value="<?php echo $tas->id; ?>"> <?php echo $tas->name; ?>
                      </label>
                      </div>
                      <?php } ?>
                      
                      <?php echo $this->Form->button(__('Submit')); ?>
                      <?php echo $this->Form->end(); ?>
                  </div>
       
         </div>
        <!-- /.box-body -->
   
     <div class="box-footer">
           
        </div>
     
    </div>
    <!-- /.box -->

    <!-- Form Element sizes -->

  </div>
  <!--/.col (left) -->
  <!-- right column -->
  
  <!--/.col (right) -->
</div>
<!-- /.row -->
</section>
