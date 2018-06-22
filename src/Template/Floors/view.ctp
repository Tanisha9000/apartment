<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Floor $floor
 */
?>
<!--<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Floor'), ['action' => 'edit', $floor->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Floor'), ['action' => 'delete', $floor->id], ['confirm' => __('Are you sure you want to delete # {0}?', $floor->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Floors'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Floor'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Buildings'), ['controller' => 'Buildings', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Building'), ['controller' => 'Buildings', 'action' => 'add']) ?> </li>
    </ul>
</nav>-->
	<div class="col-md-12 col-sm-12">
	<div class="box box-primary">
		<div class="box">
			<div class="box-body">
				<!--h3><?= h($floor->name) ?></h3-->
				<div class="col-md-5 col-sm-5">
    <table class="table table-bordered">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($floor->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Floor belongs to Building') ?></th>
            <td><?= $floor->has('building') ? $this->Html->link($floor->building->name, ['controller' => 'Buildings', 'action' => 'view', $floor->building->id]) : '' ?></td>
        </tr>
    </table>
	<div class="btn-sec">
	<?php
	if (!empty($floor->apartments)) {
		echo $this->Html->link(__('List Apartments'), ['controller' => 'apartments', 'action' => 'index', $floor->id]);
	}else{
		echo $this->Html->link(__('Add Apartments'), ['controller' => 'apartments', 'action' => 'add', $floor->id]);
	}
	?>
 <?php echo $this->Html->link(__('Add Floor'), ['controller' => 'floors', 'action' => 'addfloor', $floor->building->id]); ?>
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
