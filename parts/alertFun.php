<?php
function showAlert($isSuccess,$title,$about){
    $type=$isSuccess?"success":"danger";
    echo '<div class="alert mt-2 alert-'.$type.' alert-dismissible fade show" role="alert">
    <strong>'.$title.'!</strong> '.$about.'.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}

?>