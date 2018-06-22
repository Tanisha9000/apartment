<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Client $client
 */
?>
<section class="content-header">
    <h1>
        add client
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">add client</li>
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
                    <h3 class="box-title">Information </h3>
                </div>
                <div class="box-body">
                    <?=
                    $this->Form->create($client, array(
                        'type' => 'file'))
                    ?>

                    <?php
                    echo $this->Form->control('firstname', [
                        'templates' => [
                            'inputContainer' => '<div class="form-group">{{content}}</div>'
                        ],
                        'label' => 'First Name',
                        'class' => 'form-control',
                        'placeholder' => 'Enter First Name'
                    ]);
                    ?>
                    <?php
                    echo $this->Form->control('lastname', [
                        'templates' => [
                            'inputContainer' => '<div class="form-group">{{content}}</div>'
                        ],
                        'label' => 'Last Name',
                        'class' => 'form-control',
                        'placeholder' => 'Enter Last Name'
                    ]);
                    ?>
                    <?php
                    echo $this->Form->control('email', [
                        'templates' => [
                            'inputContainer' => '<div class="form-group">{{content}}</div>'
                        ],
                        'label' => 'Email Address',
                        'class' => 'form-control',
                        'placeholder' => 'Enter Address'
                    ]);
                    ?>
                    <?php
                    echo $this->Form->control('phone', [
                        'templates' => [
                            'inputContainer' => '<div class="form-group">{{content}}</div>'
                        ],
                        'label' => 'Business Phone',
                        'class' => 'form-control',
                        'placeholder' => 'Enter Business Phone'
                    ]);
                    ?>
                    <?php
                    echo $this->Form->control('location', [
                        'templates' => [
                            'inputContainer' => '<div class="form-group">{{content}}</div>'
                        ],
                        'label' => 'Current Location',
                        'class' => 'form-control',
                        'placeholder' => 'Enter Current Location'
                    ]);
                    ?>
                    <?php
                    echo $this->Form->control('address', [
                        'templates' => [
                            'inputContainer' => '<div class="form-group">{{content}}</div>'
                        ],
                        'label' => 'Current Address',
                        'class' => 'form-control',
                        'placeholder' => 'Enter Current Address',
                        'type' => 'textarea'
                    ]);
                    ?>
                    <?php
                    echo $this->Form->control('city', [
                        'templates' => [
                            'inputContainer' => '<div class="form-group">{{content}}</div>'
                        ],
                        'label' => 'City',
                        'class' => 'form-control',
                        'placeholder' => 'Enter City'
                    ]);
                    ?>
                    <?php
                    echo $this->Form->control('state', [
                        'templates' => [
                            'inputContainer' => '<div class="form-group">{{content}}</div>'
                        ],
                        'label' => 'State/Province/Region',
                        'class' => 'form-control',
                        'placeholder' => 'Enter State'
                    ]);
                    ?>
                    <?php
                    echo $this->Form->control('zipcode', [
                        'templates' => [
                            'inputContainer' => '<div class="form-group">{{content}}</div>'
                        ],
                        'label' => 'Postal/Zipcode',
                        'class' => 'form-control',
                        'placeholder' => 'Enter Zipcode'
                    ]);
                    ?>
                    <?php
                    echo $this->Form->control('country', [
                        'templates' => [
                            'inputContainer' => '<div class="form-group">{{content}}</div>'
                        ],
                        'label' => 'Country',
                        'class' => 'form-control',
                        'placeholder' => 'Enter Country'
                    ]);
                    ?>
                    <?php
                    echo $this->Form->control('image', [
                        'templates' => [
                            'inputContainer' => '<div class="form-group">{{content}}</div>'
                        ],
                        'label' => 'Upload',
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

