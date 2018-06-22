<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Property $property
 */
?>
<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Property[]|\Cake\Collection\CollectionInterface $properties
 */
?>
<section class="content-header">
    <h1>
        Add Notes/Photos
        <small>Fill Information</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Properties</a></li>
        <li class="active">Add Notes/Photos </li>
    </ol>
</section>

<!-- Main content  <a href=<?php //echo $this->Url->build(['controller'=>'salons','action'=>'deletesalonpics',$salonpic->id]);  ?> ><img src="/salon/img/close.jpg" alt="delete"></a> -->
<section class="content content2">
    <div class="row">
        <!-- left column -->
        <div class="col-md-10">
            <?php
            foreach ($image as $salonpic) {
                ?>
                <div id="filediv" style="display: inline-block; width:150px; height:150px;"><div id="abcd2" class="abcd"><div class="abcd2img"><img id="previewimg2" style="width:100%; min-height:150px;" src="<?php echo $this->request->getAttribute("webroot") . 'upload_dir' . '/' . $salonpic['image']; ?>">
                        <!--<a href=<?php //echo $this->Url->build(['controller'=>'images','action'=>'delete/'.$salonpic->id.'/'.$salonpic->user_id]);  ?> >-->
                            <?=
                            $this->Form->postLink(
                                    __('X'), ['controller' => 'images', 'action' => 'delete/', $salonpic->id], ['confirm' => __('Are you sure you want to delete # {0}?', $salonpic->id)]
                            )
                            ?></div>
                                <!--<img src="<?php /// echo $this->request->getAttribute("webroot").'upload_dir'.'/download.png'?>">-->
                        <!--</a>-->
                    </div></div>
                <?php
            }
            echo $this->Form->create($properties, ['id' => 'add_pics',
                'type' => 'file', 'required' => true]);
            ?>
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-body" id="container">

<?php
echo $this->Form->control('apartmentnotes', [
    'templates' => [
        'inputContainer' => '<div class="form-group">{{content}}</div>'
    ],
    'label' => 'Add Notes',
    'class' => 'form-control',
    'type' => 'textarea'
]);
?>
                    <?php
//                    echo $this->Form->control('image', [
//                        'templates' => [
//                            'inputContainer' => '<div class="form-group">{{content}}</div>'
//                        ],
//                        'label' => 'Image',
//                        'class' => 'form-control',
//                        'type' => 'file'
//                    ]);
                    ?>
                    <?php
                    echo $this->Form->control('file[]', [
                        'templates' => [
                            'inputContainer' => '<div class="form-group">{{content}}</div>'
                        ],
                        'class' => 'form-control',
                        'type' => 'file',
                        'id' => 'file',
                        'label' => 'Add Photos',
                        'multiple' => true,
                    ]);
                    ?>
                    <!--<input type="button" id="add_more" class="upload" value="Add More Files"/>-->

<? //= $this->Form->button(__('Submit'));   ?>
                    <?php
                    echo $this->Form->button(__('Submit', array(
                        'class' => 'upload',
                        'id' => 'upload',
                        'name' => 'submit'
                    )));
                    ?>
                    <!-- /.box-body -->

                    <?php echo $this->Form->end(); ?>

                </div>
           <!--<a  id="add" type="button" class="btn btn-primary pull-right"> <i class="fa fa-plus"></i> &nbsp; Add New</a>-->
            </div>
            <!-- /.box-body -->

            <!-- /.box-body -->
<? //= $this->Form->button(__('Submit'));   ?>
<? //= $this->Form->end()   ?>

        </div>

    </div>

</div>
<!--box-body -->

<!-- Form Element sizes -->

</div>
<!--col (left) -->
<!-- right column -->

<!--col (right) -->
</div>
<!--row -->
</section>

<?php //$this->start('scriptBottom');   ?>
<script>
//    alert("check");
    var abc = 0;      // Declaring and defining global increment variable.
    $(document).ready(function () {
//        alert("ffh");
//  To add new input file field dynamically, on click of "Add More Files" button below function will be executed.
        $('#add_more').click(function () {
//            alert("here");
            $(this).before($("<div/>", {
                id: 'filediv'
            }).fadeIn('slow').append($("<input/>", {
                name: 'file[]',
                type: 'file',
            }), $("<br/><br/>")));
        });
// Following function will executes on change event of file input to select different file.
//$("#file").change(function(){
//    alert("The text has been changed.");
//                if (this.files && this.files[0]) {
//                abc += 1; // Incrementing global variable by 1.
//                var z = abc - 1;
//                var x = $(this).parent().find('#previewimg' + z).remove();
//                $(this).before("<div id='abcd" + abc + "' class='abcd'><img id='previewimg" + abc + "' src=''/></div>");
//                var reader = new FileReader();
//                reader.onload = imageIsLoaded;
//                reader.readAsDataURL(this.files[0]);
//                $(this).hide();
//                $("#abcd" + abc).append($("<img/>", {
//                    id: 'img',
//                    src: '<?php //echo $this->request->webroot . 'img' . '/'  ?> close.jpg',
//                    alt: 'delete'
//                }).click(function () {
//                    $(this).parent().parent().remove();
//                }));
//            }
//});
        //   $('body').on('change', '#file', function () { alert("ii");
//            if (this.files && this.files[0]) {
//                abc += 1; // Incrementing global variable by 1.
//                var z = abc - 1;
//                var x = $(this).parent().find('#previewimg' + z).remove();
//                $(this).before("<div id='abcd" + abc + "' class='abcd'><img id='previewimg" + abc + "' src=''/></div>");
//                var reader = new FileReader();
//                reader.onload = imageIsLoaded;
//                reader.readAsDataURL(this.files[0]);
//                $(this).hide();
//                $("#abcd" + abc).append($("<img/>", {
//                    id: 'img',
//                    src: '<?php //echo $this->request->webroot . 'img' . '/'  ?> close.jpg',
//                    alt: 'delete'
//                }).click(function () {
//                    $(this).parent().parent().remove();
//                }));
//            }
        // });
//// To Preview Image
//        function imageIsLoaded(e) {
//            $('#previewimg' + abc).attr('src', e.target.result);
//        }
//        ;
//        $('#upload').click(function (e) {
//            var name = $(":file").val();
//            if (!name) {
//                alert("First Image Must Be Selected");
//                e.preventDefault();
//            }
//        });
    });
</script>
<style type="text/css">
    .abcd2img a {
        position: absolute;
        left: auto;
        top: 0px;
        color: #fff;
        background-color: #e80202f0;
        padding: 1px 5px;
        border-radius: 5px;
        right: 0;
    }
</style>
<script>
    setTimeout(function () {
        $("div.alert").remove();
    }, 5000); // 5 secs

</script>
<?php //$this->end();   ?>
<!--content -->

