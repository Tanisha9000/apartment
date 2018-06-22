<section class="content-header">
    <h1>
        Dashboard
        <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
    </ol>
</section>

<section class="content">
    <div class="row">

        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="info-box">
                <a href="<?php echo $this->request->webroot; ?>users/list_apartment_manager/">  
                    <span class="info-box-icon bg-aqua"><i class="fa fa-users"></i></span>
                    <div class="info-box-content">

                        <span class="info-box-text">Property Managers</span>
                        <span class="info-box-number"><?php echo count($apartusers); ?><small></small></span> 
                    </div>
                </a>  
            </div>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="info-box">
                <a href="<?php echo $this->request->webroot; ?>users/list_office_user/">  
                    <span class="info-box-icon bg-aqua"><i class="fa fa-users"></i></span>
                    <div class="info-box-content">

                        <span class="info-box-text">Office Users</span>
                        <span class="info-box-number"><?php echo count($officeusers); ?><small></small></span> 
                    </div>
                </a>  
            </div>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="info-box">
                <a href="<?php echo $this->request->webroot; ?>users/list_sub_contractor/">  
                    <span class="info-box-icon bg-aqua"><i class="fa fa-users"></i></span>
                    <div class="info-box-content">

                        <span class="info-box-text">Sub Contractors</span>
                        <span class="info-box-number"><?php echo count($subusers); ?><small></small></span> 
                    </div>
                </a>  
            </div>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="info-box">
                <a href="<?php echo $this->request->webroot; ?>users/list_general_contractor/">  
                    <span class="info-box-icon bg-aqua"><i class="fa fa-users"></i></span>
                    <div class="info-box-content">

                        <span class="info-box-text">General Contractors</span> 
                        <span class="info-box-number"><?php echo count($genusers); ?><small></small></span> 
                    </div>
                </a>  
            </div>
        </div>  
        <div class="row">
            <div class="col-md-6">
                <div class="box box-danger">
                    <div class="box-header with-border">
                        <h3 class="box-title">Latest Properties</h3>
                    </div>

                    <div class="box-body no-padding">
                        <ul class="users-list clearfix">

                            <?php foreach ($properties as $property) { ?>
                            <li>   	
                                <?php echo $property['jobsitename']; ?>         

                                <a class="users-list-name" href="<?php echo $this->request->webroot . "properties/view/" . $property['id']; ?>"><?php echo ucwords($property['billingname']); ?></a>
                                <span class="users-list-date"><?php echo date('d M', strtotime($property['created'])); ?></span>
                            </li>
                            <?php } ?>

                        </ul>
                    </div>
                </div>
                <!--/.box -->
            </div>


            <div class="col-md-6">
                <!--SUB CONTRACTORS LIST--> 
                <div class="box box-danger">
                    <div class="box-header with-border">
                        <h3 class="box-title">Sub Contractors Assigned Task</h3>
                        <span class="info-box-number"><?php echo count($tasks); ?><small></small></span> 
                    </div>

                    <div class="box-body no-padding">
                        <ul class="users-list clearfix">
                            <?php foreach ($tasks as $tas) { ?>
                            <li>   
                                <a class="users-list-name" href="<?php echo $this->request->webroot . "users/list_sub_contractor/"; ?>"><?php echo ucwords($tas->user['name']); ?></a>
                                <a class="users-list-name"><?php echo ucwords($tas->task['name']); ?></a>
                                <span class="users-list-date"><?php echo date('d M', strtotime($tas['created'])); ?></span>
                            </li>
                            <?php } ?>    
                        </ul>
                    </div>


                </div>
            </div>
        </div>



    </div>
    <div class="box-footer text-center">
        <ul class="users-list clearfix">

            <?php foreach ($clients as $client) { ?>
            <li>
                <?php if ($client['image'] != '') { ?>
                <img src="<?php echo $this->request->webroot; ?>img/upload_dir/<?php echo $client['image']; ?>" style="height: 112px;">
                <?php } else { ?>
                <img src="<?php echo $this->request->webroot; ?>img/upload_dir/noimage.png" style="height: 112px;">
                <?php } ?>

                <?php echo $client['firstname'] . ' ' . $client['lastname']; ?>         

                <a class="users-list-name" href="<?php echo $this->request->webroot . "clients/"; ?>"><?php echo ucwords($client['location']); ?></a>
                <span class="users-list-date"><?php echo date('d M', strtotime($client['created'])); ?></span>
            </li>
            <?php } ?>

        </ul>
        <?php // echo $this->Html->link('View All Clients', ['controller' => 'clients', 'action' => 'index'], ['class' => 'uppercase']); ?>
    </div>

</section> 