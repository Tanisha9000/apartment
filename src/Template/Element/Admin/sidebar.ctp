<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <?php
                if (!empty($loggeduser)) {
                    if (!empty($loggeduser['image'])) {
                        ?>
                        <img  src="<?php echo $this->request->getAttribute("webroot") . 'img/upload_dir' . '/' . $loggeduser['image']; ?>" class="img-circle" >
                    <!--<img src="<?php //echo $this->request->webroot.'upload_dir'.'/'.$loggeduser['image'];   ?>" class="img-circle" alt="..." class="margin">-->
                        <?php
                    } else {
                        ?>

                        <?=
                        $this->html->image('user2-160x160.jpg', [
                            "alt" => "User Image",
                            'class' => "img-circle"
                        ]);
                        ?>
                        <!--<img src="<?php // echo $this->request->webroot.'img/avatar.png'   ?>" class="img-circle" alt="..." class="margin">-->
                        <?php
                    }
                    ?>
                    <?php
                } else {
                    ?>
                    <?=
                    $this->html->image('user2-160x160.jpg', [
                        "alt" => "User Image",
                        'class' => "img-circle"
                    ]);
                    ?>     <?php }
                ?>    
            </div>
            <div class="pull-left info">
                <p><?php echo $loggeduser['name']; ?></p>
                <!--<a href="#"><i class="fa fa-circle text-success"></i> Online</a>-->
            </div>
        </div>
        <!-- search form -->
        <!--      <form action="#" method="get" class="sidebar-form">
                <div class="input-group">
                  <input type="text" name="q" class="form-control" placeholder="Search...">
                  <span class="input-group-btn">
                        <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                        </button>
                      </span>
                </div>
              </form>-->
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <?php if ($loggeduser['role'] == 'admin') { ?>
            <li class="">
                    <a href="<?php echo $this->Url->build('/dashboard/index/'); ?>">
                        <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                    </a>
                </li>

                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-files-o"></i>
                        <span>Properties</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">

                        <li ><a href="<?php echo $this->Url->build('/properties/add/'); ?>"><i class="fa fa-circle-o"></i> Set up Properties  </a></li>
                        <li><a href="<?php echo $this->Url->build('/properties/index/'); ?>"><i class="fa fa-circle-o"></i> List all Properties  </a></li>
                        <li><a href="<?php echo $this->Url->build('/addtasks/addtasklist/'); ?>"><i class="fa fa-circle-o"></i> Task Details</a></li>
                        <!--<li><a href="<?php //echo $this->Url->build('/properties/taskdetails/');    ?>"><i class="fa fa-circle-o"></i> History</a></li>-->       
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-user"></i>
                        <span>Users</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">            
                        <li><a href="<?php echo $this->Url->build('/users/list_office_user/'); ?>"><i class="fa fa-circle-o"></i>List Office Users</a></li>
                        <li><a href="<?php echo $this->Url->build('/users/add_office_user/'); ?>"><i class="fa fa-circle-o"></i>Add Office User</a></li>      
                        <li><a href="<?php echo $this->Url->build('/users/list_sub_contractor/'); ?>"><i class="fa fa-circle-o"></i>List Sub Contractors</a></li>
                        <li><a href="<?php echo $this->Url->build('/users/add_sub_contractor/'); ?>"><i class="fa fa-circle-o"></i>Add Sub Contractor</a></li>     
                        <li><a href="<?php echo $this->Url->build('/users/list_apartment_manager/'); ?>"><i class="fa fa-circle-o"></i>List Apartment Managers </a></li> 
                        <li><a href="<?php echo $this->Url->build('/users/add_apartment_manager/'); ?>"><i class="fa fa-circle-o"></i>Add Apartment Manager </a></li>
                        <li><a href="<?php echo $this->Url->build('/users/list_general_contractor/'); ?>"><i class="fa fa-circle-o"></i>List General Contractors</a></li>
                        <li><a href="<?php echo $this->Url->build('/users/add_general_contractor/'); ?>"><i class="fa fa-circle-o"></i>Add General Contractor</a></li>
                    </ul>
                </li>
                <?php if ($loggeduser['role'] == 'admin') { ?>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-laptop"></i>
                            <span>Master Task List</span>            
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>


                        <ul class="treeview-menu">            
                            <li><a href="<?php echo $this->Url->build('/tasks/index/'); ?>"><i class="fa fa-circle-o"></i>List Tasks</a></li>
                            <li><a href="<?php echo $this->Url->build('/tasks/add/'); ?>"><i class="fa fa-circle-o"></i>Add Tasks</a></li>

                        </ul>
                    </li>
                <?php } ?>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-laptop"></i>
                        <span>Master Stages</span>            
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">            
                        <li><a href="<?php echo $this->Url->build('/stages/'); ?>"><i class="fa fa-circle-o"></i>List Stages</a></li>
                        <li><a href="<?php echo $this->Url->build('/stages/add'); ?>"><i class="fa fa-circle-o"></i>Add Stage</a></li>      

                    </ul>
                </li>

                <li class="">
                    <a href="#">
                        <i class="fa fa-edit"></i>
                        <span>Billing/Paying Pricing</span>
                    </a>

                </li>

                <!--         <li class="">
                          <a href="">
                            <i class="fa fa-eye"></i>
                            <span>Sub Contractor View</span>
                          </a>
                        </li>     -->
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-user"></i>
                        <span>Client</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">        
                        <li><a href="<?php echo $this->Url->build('/clients/'); ?>"><i class="fa fa-circle-o"></i>List Client</a></li>
                        <li><a href="<?php echo $this->Url->build('/clients/add'); ?>"><i class="fa fa-circle-o"></i>Add Client</a></li>      

                    </ul>
                </li>

            <?php } ?>
            <?php if ($loggeduser['role'] == 'apartmentmanager') { ?>
                <li class="">
                    <a href="<?php echo $this->Url->build('/properties/listApartmentmanager/' . $loggeduser['id']); ?>">
                        <i class="fa fa-eye"></i>
                        <span>List Properties</span>
                    </a>
                </li>  

            <?php } ?> 
            <?php if ($loggeduser['role'] == 'subcontractor') { ?>
                <li class="">
                    <a href="<?php echo $this->Url->build('/addtasks/subcontractorview/' . $loggeduser['id']); ?>">
                        <i class="fa fa-eye"></i>
                        <span>List Tasks</span>
                    </a>
                </li>  

            <?php } ?>
            <?php if ($loggeduser['role'] == 'officeuser') { ?>
                <li class="">
                    <a href="<?php echo $this->Url->build('/properties/officeuserview/'); ?>">
                        <i class="fa fa-eye"></i>
                        <span>List Properties</span>
                    </a>
                </li>  
                <li class="">
                    <a href="<?php echo $this->Url->build('/users/list_sub_contractor/'); ?>">
                        <i class="fa fa-eye"></i>
                        <span>List Sub Contractors</span>
                    </a>
                </li>
                <li class="">
                    <a href="<?php echo $this->Url->build('/users/list_general_contractor/'); ?>">
                        <i class="fa fa-eye"></i>
                        <span>List General Contractors</span>
                    </a>
                </li> 

            <?php } ?> 

        </ul>
    </section>
    <!-- /.sidebar -->
</aside>


