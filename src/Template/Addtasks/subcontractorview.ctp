<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Addtask[]|\Cake\Collection\CollectionInterface $addtasks
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
                    <h3 class="box-title"> property Details</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form>
                    <!-- /.box-body -->
                    <div class="box">
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table class="table table-bordered">
                                <tbody><tr>
                                        <th style="width:10px;">S.No</th>
                                        <th style="width:100px;">Property Name</th>
                                        <th>Address</th>
                                        <th>Tasks</th>
                                        <th style="width:150px;">Property Details</th>
                                        <th style="width:140px;">Status</th>
                                        <th>Add/Upload</th> 
                                    </tr>
                                    <?php
                                    if (isset($_GET['page'])) {
                                        $i = ($_GET['page'] * 10) + 1;
                                    } else {
                                        $i = 1;
                                    }
                                    foreach ($addtask as $add):
                                        ?>
                                        <tr>
                                            <td><?php echo $i; ?></td>

                                            <td class="text-center">
                                                <p class=""><?php echo $add->property->jobsitename ?></p>
                                            </td>
                                            <td>
                                                <p class="text-left"><?php echo $add->property->jobsiteaddress ?> 
                                                </p>
                                            </td>
                                            <td>
                                                <p class="text-left"><?php echo $add->task->name ?>            
                                                </p>
                                            </td>
                                            <td>
                                                <?= $this->Html->link(__('View'), ['controller' => 'properties','action' => 'view', $add->property->id], ['class' => 'btn btn-block btn-success']) ?>
                                            </td>
                                            <td><div class="btn-group" >
                                                <?php if ($add->subcontstatus == '1') { ?>
                                                    <p class="text-center text-green"><b>Done</b></p>
                                                <?php } else if ($add->subcontstatus == '0') { ?> 
                                                    <p class="text-center text-danger"><b>Pending</b></p>
                                                <?php } else if ($add->subcontstatus == '') { ?>
                                                    <?php
                                                    echo $this->Html->link(
                                                            'Done', '/addtasks/subcontractorstatus/' . $add->task->id . '/' . $add->users_id .'/' .$add->properties_id.'/1', ['class' => 'btn btn-default btn-sm']
                                                    );
                                                    ?>
                                                    <?php
                                                    echo $this->Html->link(
                                                            'Pending', '/addtasks/subcontractorstatus/' . $add->task->id . '/' . $add->users_id .'/' .$add->properties_id. '/0', ['class' => 'btn btn-danger btn-sm']
                                                    );
                                                }
                                                ?>
                                                </div>
                                            </td>

                                            <td> 
                                                <?php if ($add->subcontstatus == '1') { ?> 
                                                <a href="<?php echo $this->Url->build('/addtasks/addnotes/' . $add->id . '/' . $add->users_id); ?>" class="btn btn-success btn-sm" style="margin-bottom: 4px;">Addnotes</a></button>
                                                <a href="<?php echo $this->Url->build('/addtasks/addimages/' . $add->id . '/' . $add->users_id); ?>" class="btn btn-primary btn-sm">Upload Photos</a>
                                                <?php } ?>
                                            </td>
                                        </tr>

                                        <?php
                                        $i++;
                                        ?>
                                    <?php endforeach; ?>

                                </tbody></table>
                        </div>
                        <!-- /.box-body -->
                    </div>
                </form>
            </div>
            <!-- /.box -->
            <!-- Form Element sizes -->
        </div>
        <!--/.col (left) -->
        <!-- right column -->
        <!--/.col (right) -->
    </div>
    <!-- /.row -->
    <!-- /.row -->
</section>

<style>.modal {
        display: none; /* Hidden by default */
        position: fixed; /* Stay in place */
        z-index: 1; /* Sit on top */
        left: 0;
        top: 0;
        width: 100%; /* Full width */
        height: 100%; /* Full height */
        overflow: auto; /* Enable scroll if needed */
        background-color: rgb(0,0,0); /* Fallback color */
        background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
    }

    /* Modal Content/Box */
    .modal-content {
        background-color: #fefefe;
        margin: 15% auto; /* 15% from the top and centered */
        padding: 20px;
        border: 1px solid #888;
        width: 80%; /* Could be more or less, depending on screen size */
    }

    /* The Close Button */
    .close {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .close:hover,
    .close:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
    }</style>

<div class="users index large-9 medium-8 columns content">
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
</div>

<script>
    var modal = document.getElementById('myModal');

// Get the button that opens the modal
    var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

// When the user clicks on the button, open the modal 
    btn.onclick = function () {
        modal.style.display = "block";
    }

// When the user clicks on <span> (x), close the modal
    span.onclick = function () {
        modal.style.display = "none";
    }

// When the user clicks anywhere outside of the modal, close it
    window.onclick = function (event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>
