<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Building $building
 */
?>
<!--<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Building'), ['action' => 'edit', $building->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Building'), ['action' => 'delete', $building->id], ['confirm' => __('Are you sure you want to delete # {0}?', $building->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Buildings'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Building'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Properties'), ['controller' => 'Properties', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Property'), ['controller' => 'Properties', 'action' => 'add']) ?> </li>
    </ul>
</nav>-->
<div class="col-md-12 col-sm-12">
	<div class="box box-primary">
		<div class="box">
			<div class="box-body">
				<!--h3><?= h($building->name) ?></h3-->
				<div class="col-md-5 col-sm-5">
					<table class="table table-bordered">
						<tr>
							<th scope="row"><?= __('Building Name') ?></th>
							<td><?= h($building->name) ?></td>
						</tr>
						<tr>
							<th scope="row"><?= __('Building belongs to Property') ?></th>
							<td><?= $building->has('property') ? $this->Html->link($building->property->jobsitename, ['controller' => 'Properties', 'action' => 'view', $building->property->id]) : '' ?></td>
						</tr>
					</table>
					<div class="btn-sec">
						<?php
						if (!empty($building->floors)) {
							echo $this->Html->link(__('List Floors'), ['controller' => 'floors', 'action' => 'index', $building->id]);
						}else{
							echo $this->Html->link(__('Add Floors'), ['controller' => 'floors', 'action' => 'addfloor',$building->id]);
						}
					   
						?>

					 <?php  echo $this->Html->link(__('Add Building'), ['controller' => 'buildings', 'action' => 'addbuilding',$building->property->id]);  ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
<style type="text/css">
table tr th,
table tr td{
	text-align:left !important;
}
.btn-sec a{
	margin-right:10px;
}
</style>
