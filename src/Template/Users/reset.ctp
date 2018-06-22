<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<!--forgot password -->
<section class="forgot contract viewprofile-wraper">
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-sm-12 col-md-7 center">
                <div class="outer">
                    <div class="edit text-center">
                        <h3 class="text-white border-bottom-0 m-0">Reset password</h3>
                    </div>

                    <div class="formbox">
                        <?= $this->Flash->render() ?>
                        <?= $this->Form->create($user,['type' => 'file','class'=>'contractfrm p-0']) ?>							
                            <div class="row">
                                <div class="col-md-5 col-sm-5 center-col">
                                <div class="form-group">
                                        <label for="inputPassword">New Password</label>
                                            <?= $this->Form->control('password',['type'=>'password','class'=>'form-control','label'=>false,'required'=>true]) ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPassword">Confirm Password</label>
                                        
                                            <?= $this->Form->control('confirm_password',['type'=>'password','class'=>'form-control','required'=>true,'label'=>false]) ?>
                                    </div>

                                            <?= $this->Form->button(__('Reset Password'),['class'=>'btn submitbtn mt-4']); ?>

                                </div>
                            </div>
                         <?= $this->Form->end() ?>
                    </div>
                </div>
            </div>
        </div>
        </div>
</section>
<!--forgot password -->
<style type="text/css">
	html,
	body,
	.wrapper{
		height:auto !important;
		min-height:auto !important;
	}
	body{
		background-color:#ecf0f5;
	}
	.content-wrapper{
		margin:0px;
	}
	.forgot.contract.viewprofile-wraper{
		padding:100px 0px;
	}
	.center-col,
        .center{
		float:none;
		margin:0  auto;
	}
	.forgot .outer{
		padding: 30px 30px;
		background-color: #fff;
		border-radius: 5px;
		box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
	}
	.forgot .outer .edit.text-center{
		margin-bottom:45px;
	}
	.forgot .outer .edit.text-center h3{
		font-size: 23px;
		font-weight: bold;
		text-transform: uppercase;
		margin-top: 0px;
	}
	.forgot .outer .edit.text-center p{
		font-size: 16px;
		color: rgba(0, 0, 0, 0.6);
		letter-spacing: 1px;
		font-style: italic;
	}
	.formbox .btn.submitbtn{
		display:block;
		width:70%;
		margin:auto;
	}
</style>