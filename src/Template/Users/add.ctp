<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        add 
    </h1>
</section>

<!-- Main content -->
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
                    <?= $this->Form->create($user) ?>
                          <?php
                        echo $this->Form->control('name', [
                            'templates' => [
                                'inputContainer' => '<div class="form-group">{{content}}</div>'
                            ],
                            'label' => 'Name',
                            'class' => 'form-control',
                            'placeholder' => 'Enter name'
                        ]);
                        ?>
                        <?php
                        echo $this->Form->control('email', [
                            'templates' => [
                                'inputContainer' => '<div class="form-group">{{content}}</div>'
                            ],
                            'label' => 'Email',
                            'class' => 'form-control',
                            'placeholder' => 'Enter email address'
                        ]);
                        ?>

                        <?php
                        echo $this->Form->control('password', [
                            'templates' => [
                                'inputContainer' => '<div class="form-group">{{content}}</div>'
                            ],
                            'label' => 'Password',
                            'class' => 'form-control',
                            'placeholder' => 'Enter password',
                            'type' => 'password'
                        ]);
                        ?>
						<?php echo $this->Form->control('role', [
						    'templates' => [
                                'inputContainer' => '<div class="form-group">{{content}}</div>'
                            ],
							'label' => 'Role',
							'class' => 'form-control',
                            'options' => ['subcontractor'=>'Subcontractor','apartmentmanager'=>'Apartment Manager']
                        ]) ?>
                    

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
