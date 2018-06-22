<!-- Content Header (Page header) -->
<section class="test" >
<section class="content-header">
    <h1 >
       Login
    </h1>
  
</section>

<!-- Main content -->
<section class="content content2">
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Fill Details </h3>
                </div>
                <div class="box-body" style="padding-bottom:0px;">
                              <?php echo $this->Form->create('user') ?>

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
                            'placeholder' => 'Enter password'
                        ]);
                        ?>
                    

                </div>
                <!-- /.box-body -->
				<center style="text-align:right; padding:0px 10px 15px 10px;"> <a href="<?php echo $this->Url->build('/users/forgotpassword'); ?>" >Forgot Password?</a></center>

                <div class="box-footer">
                     <?php echo $this->Form->button(__('Submit')); ?>
                </div>
                <?php echo $this->Form->end(); ?>
                
                
                
<!--                <center style="width:100%; display:table; ">      
                    <a href="<?php // echo $this->Url->build('/users/add'); ?>" >Create a new Account?</a>
                </center>-->
   
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

</section>

<!-- Content Header (Page header) -->
<!--<section class="content-header">
    <h1>
        login
    </h1>
</section>-->


<script>
    setTimeout(function () {
        $("div.alert").remove();
    }, 5000); // 5 secs

</script>
<!-- /.content -->


<style>
.content-wrapper{
margin:0px;

}

.test{
width:34%; 
padding: 8% 0; 
margin: 0 auto;
}

h1{
text-align:center;
}

.box-footer{
text-align:center;
padding-top:24px
}

.box-footer button{
    padding: 7px 33px;
    color: #fff;
    background-color: #3c8dbc;
    border: none;
    border-radius: 5px;
	}
	
	.box.box-primary {
    padding: 40px 6px;
}

</style>


