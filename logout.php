<?php

require_once(dirname(__FILE__).'/core/class.session.php');

$session= new session();
$session->stop();
header("Location: index.php");

?>