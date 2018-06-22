<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        add apartment manager
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">apartment manager</li>
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
                        echo $this->Form->control('phone', [
                            'templates' => [
                                'inputContainer' => '<div class="form-group">{{content}}</div>'
                            ],
                            'label' => 'Phone',
                            'class' => 'form-control',
                            'placeholder' => 'Enter phone number'
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
                            'placeholder' => 'Create password',
                            'type' => 'password'
                        ]);
                        ?>

                        <?php
                        echo $this->Form->control('address', [
                            'templates' => [
                                'inputContainer' => '<div class="form-group">{{content}}</div>'
                            ],
                            'label' => 'Address',
                            'class' => 'form-control',
                            'placeholder' => 'Enter address',
                            'type' => 'textarea'
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

