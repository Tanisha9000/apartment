<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Property[]|\Cake\Collection\CollectionInterface $properties
 */
?>
<section class="content-header">
    <h1>
        List Properties
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Properties</a></li>
        <li class="active"> List Properties  </li>
    </ol>
</section>
<!-- Main content -->

<section class="content content2">
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <!--<h3 class="box-title">Details</h3>-->
<!--					<form method="POST" action="index" style="width:25%; float:right;">
						<div class="input-group"> 
							<input type="text" name="q" id="searchinput" class="form-control" placeholder="Search...">
							<span class="input-group-btn">
								<button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
								</button>
							</span>
						</div>
					</form>-->
                </div>
                <!-- /.box-header -->
                    <!-- /.box-body -->
                    <div class="box">
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table style="font-size:12px;" id="example11c" class="table table-bordered table-hover" cellspacing="0" width="100%">
                               
                                <thead>
                                    <tr>
                                        <th style="width:10px;">S.No</th>
                                        <th style="width:120px;">Job Site Name</th>
                                        <th>Job Site Address</th>
                                        <th style="width:120px;">Billing Name</th>
                                        <th>Billing Address</th>
                                         <th class="actions"><?= __('Actions') ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (isset($_GET['page'])) {
                                        $i = ($_GET['page'] * 10) + 1;
                                    } else {
                                        $i = 1;
                                    }
                                    foreach ($properties as $property):
                                        ?>
                                         <tr>
                                            <td><?php echo $i; ?></td> 
                                            <td><?= h($property->jobsitename) ?></td>
                                            <td><?= h($property->jobsiteaddress) ?></td>
                                            <td><?= h($property->billingname) ?></td>
                                            <td><?= h($property->billingaddress) ?></td>       
                                            <td class="actions" style="width:200px;">
                                            <?= $this->Html->link(__('View'), ['action' => 'view', $property->id],['class' => 'btn btn-block btn-success']) ?>
                                            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $property->id],['class' => 'btn btn-block btn-primary']) ?>
                                   <?= $this->Form->postLink(
                                                __('Delete'),
                                                ['action' => 'delete', $property->id],
                                                ['class' => 'btn btn-block btn-danger', 
                                                'confirm' => __('Are you sure you want to delete # {0}?', $property->id)]
                                            )
                                        ?> 
                                                  <?= $this->Html->link(__('Add Task'), ['controller'=>'addtasks', 'action' => 'taskdetails', $property->id],['class' => 'btn btn-block btn-primary']) ?>
                             

 <?//= $this->Form->postLink(__('Delete'), ['action' => 'delete', $property->id],['class' => 'btn btn-block btn-danger'], ['confirm' => __('Are you sure you want to delete # {0}?', $property->id)]) ?>
                                        </td>
                                        </tr>
                                        <?php
                                        $i++;
                                        ?>
                                    <?php endforeach; ?>

                                </tbody></table>
                        </div>
                    </div>
            </div>
         </div>
    </div>

</section>


    <!-- <table cellpadding="0" cellspacing="0">

        <tbody>
<?php // foreach ($properties as $property): ?>
            <tr>
                <td><?//= $this->Number->format($property->id) ?></td>
                <td><?//= h($property->jobsitename) ?></td>
                <td><?//= h($property->jobsiteaddress) ?></td>
                <td><?//= h($property->billingname) ?></td>
                <td><?//= h($property->billingaddress) ?></td>
                <td class="actions">
                    <?//= $this->Html->link(__('View'), ['action' => 'view', $property->id]) ?>
                    <?//= $this->Html->link(__('Edit'), ['action' => 'edit', $property->id]) ?>
                    <?//= $this->Form->postLink(__('Delete'), ['action' => 'delete', $property->id], ['confirm' => __('Are you sure you want to delete # {0}?', $property->id)]) ?>
                </td>
            </tr>
            <?php// endforeach; ?>
        </tbody>
    </table> -->
<!--	<div class="users index large-9 medium-8 columns content">
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
	</div>-->
<script>
// function myFunction() {
// //    alert('hiii')
//     var name= $("#searchinput").val();
//     $.ajax({
//             method: 'POST',
//             data: {inputname : name},
//             url: 'http://babita.gangtask.com/apartment/properties/getsearch',
//     }).then(function successCallback(response) { 
//             console.log(response)

//         }, function errorCallback(error) {
//             console.log(error)
//         }); 
// }
</script>
<style type="text/css">
	table.table.table-bordered tr td.actions a.btn{
		width:49%;
		float:left;
		margin:0px;
		margin-bottom:5px;
	}
	table.table.table-bordered tr td.actions a.btn:nth-child(even){
		float:right;
	}
	#example11c_filter label{
		text-align:right;
	}
</style>
 <script type="text/javascript" charset="utf-8">
    $(document).ready(function() {
        $('#example11c').DataTable();
    } );
</script> 
