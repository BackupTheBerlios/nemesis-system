<?php
$toReq = array('kernel/kernel.php',
               'kernel/user.php',
               'kernel/parserini.php',
               'kernel/router.php',
               'kernel/authmanager.php',
               'kernel/errorprocessor.php',
               'kernel/viewmanager.php',
               );

foreach($toReq as $v) {
    require($v);
}
?>
