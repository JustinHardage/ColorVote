<?php

error_log('gettotal1');

require_once('../../cv_config.php');
require_once('repository.php');

$repo = new Repository(CVconfig::USERNAME, CVconfig::PASSWORD, CVconfig::DATABASE);

$cleanColor = htmlspecialchars($_GET['color']);

echo $repo->TotalVotesByColor($cleanColor);
