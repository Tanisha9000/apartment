<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Addtask $addtask
 */
?>
<section class="forgot contract viewprofile-wraper">
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-sm-12 col-md-7 center">
                <div class="outer">
                    <div class="edit text-center">
                        <h3 class="text-white border-bottom-0 m-0">Task Assigned</h3>
                    </div>

                    <div class="formbox">
                        <?= $this->Form->create($task) ?>	
                        <h4>The Tasks are :</h4>

                        <?= $this->Flash->render() ?>

                        <div class="row">
                            <div class="col-md-5 col-sm-5 center-col">
                                <div class="form-group">
                                    <label for="inputPassword">Hi <?php echo $task->user->name ; ?></label>
                                    <h4>You are assigned this task :<?php echo $task->task->name; ?> for the property named <?php echo $task->property->name; ?></h4>
                                    <h4>Kindly respond to the same and check your profile</h4>
                                </div>
                                
                            </div>
                        </div>

                        <div class="btn-group">
                            <button type="button" class="btn btn-success btn-sm" id="accept">Accept</button>
                            <button type="button" class="btn btn-default btn-sm" id="decline">Decline</button>
                        </div>
                        <?= $this->Form->end() ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
        $("#accept").click(function () {
        $.ajax({
                method: 'POST',
                data: {status : 1,data : <?php $task->id ?>},
                url: 'http://babita.gangtask.com/apartment/addtasks/updatestatus',
        }).then(function successCallback(response) {
            response = JSON.parse(response);
            console.log(response);
            response = JSON.parse(response)
                window.location.href = "http://babita.gangtask.com/apartment/";
  
        }, function errorCallback(error) {
            console.log(error)
        });

    });
</script>
