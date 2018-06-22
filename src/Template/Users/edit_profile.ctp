<?php
//echo "<pre>";
//print_r($user);
//echo "</pre>";
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<style>
.prfl-dtl {
    float: left;
	width:100%;
}
.prfl-dtl h1{
    float: left;
    margin: 0;
}

.prfl-dtl a{
    float: right;
    width: auto;
}
.abcd{
	width: 150px;
    height: 150px;
    overflow: hidden;
    border: 5px solid #f2f2f2;
    border-radius: 5px;
    margin-bottom: 14px;
}
.abcd img{
	height:100% !important;
	width:100% !important;
} 
</style>

<section class="content-header">
	<div class="row">
		<div class="col-md-10">
			<div class="prfl-dtl">
    <h1>
      Edit Profile

    </h1>
    
           <?php echo $this->Html->link(
                            'Change Password',
                            '/users/changepassword/'.$user->id,
                            ['class' => 'btn btn-block btn-primary', 'target' => '_blank']
                        ); ?>
<!--        <li><button href="#">Change Password</button></li>-->
    </div>
	</div>
</div>
</section>
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
                    <?= $this->Form->create($user, array(
                        'type' => 'file')) ?>
                    
                    <div class="abcd">
                           <?php  if(!empty($loggeduser)){
                           if(!empty($loggeduser['image'])){
                               ?>
                             <img  src="<?php echo $this->request->getAttribute("webroot").'img/upload_dir'.'/'.$loggeduser['image'];  ?>" >
                        <!--<img src="<?php //echo $this->request->webroot.'upload_dir'.'/'.$loggeduser['image']; ?>" class="img-circle" alt="..." class="margin">-->
                        <?php
                           }else{
                               ?>
                        
                                                       <?= $this->html->image('user2-160x160.jpg', [
                                                                            "alt" => "User Image",
                                                                           
                                                                        ]);?>
                        <!--<img src="<?php// echo $this->request->webroot.'img/avatar.png' ?>" class="img-circle" alt="..." class="margin">-->
                        <?php
                           }
                           ?>
                           <?php
                       }else{ 
                           ?>
                         <?= $this->html->image('user2-160x160.jpg', [
                                                                            "alt" => "User Image",
                                                                            
                                                                        ]);?>     <?php  }
                       ?>  
<!--            <div id="abcd2" class="abcd"><div class="abcd2img"><img id="previewimg2" src="<?php//echo $this->request->getAttribute("webroot").'img/upload_dir'.'/'.$user->image;  ?>">
        </div>
    </div>-->
                    </div>
                      <?php echo $this->Form->control('id',[
				  'templates' => [
        'inputContainer' => '<div class="form-group">{{content}}</div>'
    ],
                        'label' => 'Task Name',
                    'class' => 'form-control',
                    'type' => 'hidden',
		    'value' => $user->id,
	]); ?>
               
                          <?php
                        echo $this->Form->control('name', [
                            'templates' => [
                                'inputContainer' => '<div class="form-group">{{content}}</div>'
                            ],
                            'label' => 'Name',
                            'class' => 'form-control',
                            'placeholder' => 'Enter Name',
                            
                        ]);
                        ?>
                      
                        <?php
                        echo $this->Form->control('phone', [
                            'templates' => [
                                'inputContainer' => '<div class="form-group">{{content}}</div>'
                            ],
                            'label' => 'Phone Number',
                            'class' => 'form-control',
                            'placeholder' => 'Enter Phone Number',
                            
                        ]);
                        ?>
                      <?php if($user['role']=='admin'){
                        echo $this->Form->control('email', [
                            'templates' => [
                                'inputContainer' => '<div class="form-group">{{content}}</div>'
                            ],
                            'label' => 'Email',
                            'class' => 'form-control',
                            'placeholder' => 'Enter email address',
                            'disabled' =>'disabled'
                      ]); }
                        ?>
                     <?php
                    echo $this->Form->control('image', [
                        'templates' => [
                            'inputContainer' => '<div class="form-group">{{content}}</div>'
                        ],
                        'label' => 'Image',
                        'class' => 'form-control',
                        'type' => 'file',
//                        'required' => true
                    // 'value'=>"dfsf",
//                        '_input' =>  $user->image
//                       'value' => $user->image
                    ]); ?>

                    <?php
                       /* echo $this->Form->control('address', [
                            'templates' => [
                                'inputContainer' => '<div class="form-group">{{content}}</div>'
                            ],
                            'label' => 'Address',
                            'class' => 'form-control',
                            'placeholder' => 'Enter Address',
                            
                        ]);
                        */?>
                    
		
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
