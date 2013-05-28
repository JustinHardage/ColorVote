<?php

require_once('../../cv_config.php');
require_once('repository.php');

$repo = new Repository(CVconfig::USERNAME, CVconfig::PASSWORD, CVconfig::DATABASE);

$color = htmlspecialchars($_GET['color']);

echo htmlspecialchars($repo->TotalVotesByColor($color));
