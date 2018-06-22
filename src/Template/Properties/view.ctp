<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Property $property
 */
?>
<!-- <nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?//= __('Actions') ?></li>
        <li><?//= $this->Html->link(__('Edit Property'), ['action' => 'edit', $property->id]) ?> </li>
        <li><?//= $this->Form->postLink(__('Delete Property'), ['action' => 'delete', $property->id], ['confirm' => __('Are you sure you want to delete # {0}?', $property->id)]) ?> </li>
        <li><?//= $this->Html->link(__('List Properties'), ['action' => 'index']) ?> </li>
        <li><?//= $this->Html->link(__('New Property'), ['action' => 'add']) ?> </li>
    </ul>
</nav> -->
<div class="content">
	<section class="content">
        <div class="row">
            <div class="col-sm-6">
                <div class="box box-primary">
                    <div class="box-body">
                        <table class="table table-bordered">
                        <tr>
                                <th scope="row"><?= __('Jobsite Name') ?></th>
                                <td><?= h($property->jobsitename) ?></td>
                            </tr>
                            <tr>
                                <th scope="row"><?= __('Jobsite Address') ?></th>
                                <td><?= h($property->jobsiteaddress) ?></td>
                            </tr>
                              <?php  if($loggeduser['role']!='apartmentmanager') {?>
                            <tr>
                                <th scope="row"><?= __('Billing Name') ?></th>
                                <td><?= h($property->billingname) ?></td>
                            </tr>
                            <tr>
                                <th scope="row"><?= __('Billing Address') ?></th>
                                <td><?= h($property->billingaddress) ?></td>
                            </tr>
                              <?php }?>
                        </table>
                      
                        <table class="vertical-table vrt">
                            <tr>
								<ul style="padding:8px;">
                                  <?php 
                            if (!empty($property->buildings)) {
                            ?> 
                            <?php  if (!empty($property->buildings)) { ?>
                             <li><strong><?= __('Buildings') ?></strong></li>
                           <?php }?>                  
                            <?php foreach ($property->buildings as $build) { ?>
                                <li><?= h($build->name) ?> 
                                <?php   if(!empty($build->floors)){   ?>
                                <ul>  
                                <?php    foreach ($build->floors as $floor) { 
                                ?>
                                    <li><?= h($floor->name) ?>
                                    <?php
                                        if(!empty($floor->apartments)){ ?>
                                        <ul>
                                         <?php foreach ($floor->apartments as $apart) {   
                                         ?>
                                        <li><?= h($apart->name) ?>
                                        <?php
                                         if(!empty($apart->rooms)){  ?>
                                         <ul>
                                         <?php   foreach ($apart->rooms as $room) {
                                        ?>
                                           <li><?= h($room->name) ?></li>
                                        <?php } ?>
                                        </ul>
                                     <?php   } ?>
                                        </li>
                                    <?php  } ?>
                                    </ul>
                                <?php    } ?>
                                   </li>  
                            <?php    } ?>
                            </ul>
                            <?php  } ?>
                              </li> 
                        <?php    }   ?>
                      
                     
                        <?php      } ?>
						<ul>
                            </tr>
                          
                    
                        </table>
						                <?php if(!empty($addtask)){ ?>
											<h3 style="font-size:14px; font-weight:bold;">Task</h3>
                <?php   foreach ($addtask as $tas) { ?>
                <ul><?= h($tas->task->name) ?></ul>
                    
             <?php   }
                }
                ?>
                        </div>
    				</div>
    			</div>
    	</div>
    </section>
</div>
<style type="text/css">
	table.table.table-bordered tr th,
	table.table.table-bordered tr td{
		text-align:left;
	}
	table.table.table-bordered{
		margin-bottom:15px;
	}
	.box-body ul{
		width:100%;
		display:table;
		padding:0px;
	}
	.box-body li{
		list-style-type:none;
		line-height: 30px;
	}
	.box-body li ul{
		margin-left: 20px;
		border-left: 1px solid #ccc;
	}
	.box-body li ul li{
		list-style-type: none;
		padding-left: 20px;
		position: relative;
	}
	.box-body li ul li::before{
		content: "";
		width: 15px;
		height: 1px;
		background: #ccc;
		position: absolute;
		top: 14px;
		left: 0;
	}
</style>
