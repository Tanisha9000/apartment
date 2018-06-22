<section class="content-header">
    <h1>
        General Contractors
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"> General Contractors </li>
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
                <?= $this->Form->create($user, array(
                        'type' => 'file',
                        'enctype' => 'multipart/form-data'))
                    ?>

                    <?php
                    echo $this->Form->control('name', [
                        'templates' => [
                            'inputContainer' => '<div class="form-group">{{content}}</div>'
                        ],
                        'label' => 'Name',
                        'class' => 'form-control',
                        'placeholder' => 'Enter Name'
                    ]);
                    ?>
                    <?php
                    echo $this->Form->control('phone', [
                        'templates' => [
                            'inputContainer' => '<div class="form-group">{{content}}</div>'
                        ],
                        'label' => 'Phone',
                        'class' => 'form-control',
                        'placeholder' => 'Enter Phone Number'
                    ]);
                    ?>
                    <?php
                    echo $this->Form->control('email', [
                        'templates' => [
                            'inputContainer' => '<div class="form-group">{{content}}</div>'
                        ],
                        'label' => 'Email',
                        'class' => 'form-control',
                        'placeholder' => 'Enter Email Address'
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
                    echo $this->Form->control('taxid', [
                        'templates' => [
                            'inputContainer' => '<div class="form-group">{{content}}</div>'
                        ],
                        'label' => 'Tax-ID',
                        'class' => 'form-control',
                        'type' => 'text',
                        'placeholder' => 'Enter Tax-ID'
                    ]);
                    ?>
                    <?php
                    echo $this->Form->control('image', [
                        'templates' => [
                            'inputContainer' => '<div class="form-group">{{content}}</div>'
                        ],
                        'label' => 'Logo',
                        'class' => 'form-control',
                        'type' => 'file'
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
<!-- /.content -->
