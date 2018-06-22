<?php
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
?>
<div class="message error" id='msg' style="
color: #8B0000;
background-color: #dff0d8;
border-color: #d6e9c6;
border: 1px;
width: 50%;
text-align: center;
margin-left: 25%;
padding: 10px;
border: 1px solid transparent;
border-radius: 4px; "

onclick="this.classList.add('hidden');"><?= $message ?>
</div>

<script>
 setTimeout(function(){
//     alert('entered')
        $("#msg").addClass('hidden');
    }, 5000 ); // 5 secs

</script>
