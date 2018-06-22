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
