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
                    <h3 class="box-title"> Property Details</h3>
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
                                        <th style="width:150px;">Property Details</th>
                                        <th style="width:140px;"> Status </th>
                                        <th> Add/Upload</th>
                                        <th> Signature Approval</th> 
                                    </tr>
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

                                            <td class="text-center">
                                                <p class=""><?php echo $property['jobsitename'] ?></p>
                                            </td>
                                            <td>
                                                <p class="text-left"> <?php echo $property['jobsiteaddress'] ?> 
                                                    <!--It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.--> 
                                                </p>
                                            </td>
                                            <td>
                                                <?= $this->Html->link(__('View'), ['action' => 'view', $property['id']], ['class' => 'btn btn-block btn-success']) ?>

                                            </td>
                                            <td> <div class="btn-group" >
                                                    <?php if ($property->apartmentstatus == '1') { ?>
                                                        <p class="">Accepted</p>
                                                        <!--<button  type="button" class="btn btn-danger btn-sm accept">Accepted</button>-->
                                                    <?php } else if ($property->apartmentstatus == '0') { ?> 
                                                        <p class="">Declined</p>
                                                        <!--<button  type="button" class="btn btn-danger btn-sm accept">Declined</button>-->
                                                    <?php } else if ($property->apartmentstatus == '') { ?>
                                                        <?php
                                                        echo $this->Html->link(
                                                                'Accept', '/properties/propertiesstaus/' . $property->id . '/' . $property->apartmanagerid . '/1', ['class' => 'btn btn-default btn-sm']
                                                        );
                                                        ?>
                                                        <?php
                                                        echo $this->Html->link(
                                                                'Decline', '/properties/propertiesstaus/' . $property->id . '/' . $property->apartmanagerid . '/0', ['class' => 'btn btn-danger btn-sm']
                                                        );
                                                    }
                                                    ?>
                                                    <!--<button  type="button" class="btn btn-default btn-sm accept">Accept</button>-->
                                                    <!--<button  type="button" class="btn btn-danger btn-sm accepted">Accepted</button>-->
                                                    <!--<button type="button" class="btn btn-danger btn-sm decline">Decline</button>-->
                                                </div></td>

                                            <td> 
    <?php if ($property->apartmentstatus == '1') { ?> 
                                                    <a href="<?php echo $this->Url->build('/properties/addNotes/' . $property->id . '/' . $property->apartmanagerid); ?>" class="btn btn-primary btn-sm">Add Notes / Photos</a>

    <?php } ?></td>

                                            <td><?php if ($property->apartmentstatus == '1') {
        if ($property->approval_status == '1') {
            ?>  <div class="btn-group">
                                                            <button type="button" class="btn btn-success btn-sm" id="approved" datas-id="<?php echo $property->id; ?>">Approved</button>

                                                        </div><?php } else { ?>
                                                        <button type="button" class="btn btn-success btn-sm" id="approved" datas-id="<?php echo $property->id; ?>">Approval</button>
        <?php }
    } ?>
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

    <!-- <table cellpadding="0" cellspacing="0">

        <tbody>
<?php // foreach ($properties as $property):  ?>
            <tr>
                <td><? //= $this->Number->format($property->id)  ?></td>
                <td><? //= h($property->jobsitename)  ?></td>
                <td><? //= h($property->jobsiteaddress)  ?></td>
                <td><? //= h($property->billingname) ?></td>
                <td><? //= h($property->billingaddress) ?></td>
                <td class="actions">
<? //= $this->Html->link(__('View'), ['action' => 'view', $property->id])  ?>
<? //= $this->Html->link(__('Edit'), ['action' => 'edit', $property->id])  ?>
<? //= $this->Form->postLink(__('Delete'), ['action' => 'delete', $property->id], ['confirm' => __('Are you sure you want to delete # {0}?', $property->id)]) ?>
                </td>
            </tr>
<?php // endforeach;  ?>
        </tbody>
    </table> -->
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
    $('#approved').click(function () {
        //alert("hey")
        $(this).html('Approved');
        var ids = $(this).attr("datas-id");
        $.ajax({
            method: 'POST',
            data: {approved_status: 1,
                id: ids},
            url: 'http://babita.gangtask.com/apartment/properties/approvedstatus',
        }).then(function successCallback(response) {
            console.log("babita");
            console.log(response);
            console.log(JSON.parse(response));
            var res = JSON.parse(response);

        }, function errorCallback(error) {
            console.log(error);
        });
    })

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

<!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.js" ></script>
<script type="text/javascript">

$(document).ready(function(){ alert("hey");
  $(".accepted").hide();
 
//        $(".productDescription").hide();


    $('.accept').click(function(){ alert("click");
         var id = this.id;
        alert(id);
         $("#accept").hide();
        $("#decline").hide();
         $("#accepted").show();
         
    //$(".productDescription").slideToggle();
    //return false;
    });

});

</script>-->