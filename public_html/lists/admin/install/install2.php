<?php
require('configvars.php');

if ($bouncesTest == TRUE) {
  printf('<p class="explain">'.$GLOBALS["popAccountOk"].'</p>');
}
else {
  printf('<p class="allwrong explain">%s%s</p>', $GLOBALS["popAccountKo"], $_SESSION["bounce_mailbox_host"]);
}

$test_connection2 = Sql_Connect_Install($_SESSION["database_host"], $_SESSION["database_user"],$_SESSION["database_password"], $_SESSION["database_name"]);

if ($test_connection2 == FALSE) {
  printf('<div class="wrong">%s</div><br>',$GLOBALS["strStillNoConnection"]);
  $canNotConnect = 1;
  willNotContinue();
}

print editVariable($securityVars,'name', 'text');

$bouncesTest = processPopTest($_SESSION["bounce_mailbox_host"], $_SESSION["bounce_mailbox_user"], $_SESSION["bounce_mailbox_password"]);



?>