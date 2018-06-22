<section class="content-header">
    <h1>
     Change password

    </h1>

</section>
<section class="content content2">
    <div class="row">
        <!-- left column -->
        <div class="col-md-10">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Fill Details </h3>
                </div>
                <div class="box-body">
                <?= $this->Form->create() ?>
                     <fieldset>
       <?php
                        echo $this->Form->control('old_password', [
                            'templates' => [
                                'inputContainer' => '<div class="form-group">{{content}}</div>'
                            ],
                            'label' => 'Old password',
                            'class' => 'form-control',
                            'placeholder' => 'Enter Old password',
                            'type' => 'password' 
                            
                        ]);
                        ?>
                           <?php
                        echo $this->Form->control('password1', [
                            'templates' => [
                                'inputContainer' => '<div class="form-group">{{content}}</div>'
                            ],
                            'label' => 'New password',
                            'class' => 'form-control',
                            'placeholder' => 'Enter New password',
                            'type' => 'password' 
                            
                        ]);
                        ?>
                               <?php
                        echo $this->Form->control('password2', [
                            'templates' => [
                                'inputContainer' => '<div class="form-group">{{content}}</div>'
                            ],
                            'label' => 'Confirm New password',
                            'class' => 'form-control',
                            'placeholder' => 'Confirm New password',
                            'type' => 'password' 
                            
                        ]);
                        ?>
                      

</fieldset>
                   
		
                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                    <?= $this->Form->button(__('Save')) ?>
                </div>
<?= $this->Form->end() ?>
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