<section class="content-header">
<h1>
add tasks 
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
        <h3 class="box-title">Fill Details</h3>
      </div>
        <div class="box-body">
                 <?= $this->Form->create($task) ?>
                 <?php
                 echo $this->Form->control('name', [
                     'templates' => [
                         'inputContainer' => '<div class="form-group">{{content}}</div>'
                     ],
                     'label' => 'Task Name',
                     'class' => 'form-control',
                     'placeholder' => 'Enter Task'
                 ]);
                 ?>
       
         </div>
        <!-- /.box-body -->
   
        <div class="box-footer">
        <?php echo $this->Form->button(__('Submit')); ?>
        </div>
        <?php echo $this->Form->end(); ?>
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
