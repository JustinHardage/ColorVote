<!DOCTYPE html>
<!-- 
	Author:	Justin Hardage
	Date:	2013/05/24
-->
<html>
<head>
	<title>Foothold Color Votes</title>
	<link rel="stylesheet" href="../assets/colorvote.css" />
	<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
	<script src="../scripts/color_get_total.js" ></script>
	<script src="../scripts/votes_grand_total.js"></script>
</head>
<body>
	<h1>Foothold Color Votes</h1>
	<div id="container">
		<table id="colortable">
			<thead>
				<tr>
					<td>Color</td>
					<td>Votes</td>
				</tr>
			</thead>
			<tbody>
				<?php
					require_once('../../cv_config.php');
					require_once('../models/repository.php');
					$repo = new Repository(CVconfig::USERNAME, CVconfig::PASSWORD, CVconfig::DATABASE);
					$results = $repo->FindAllColors();

					$class = 'totalOnClick';
					$targetSuffix = '_votes';	
					$tClass = 'votesByColor';
					$grandTotalBtnID = 'grandTotalBtn';
					$grandTotalResultID = 'grandTotalResult';
					

					foreach($results as $color)
					{
						$name = htmlspecialchars($color->name);
						$target = $name . $targetSuffix;

				?>
				<tr>
					<td>
						<a class="<?php echo $class ?>" data-color="<?php echo $name ?>" data-target="<?php echo $target ?>">
							<?php echo $name ?>
						</a>
					</td>
					<td id="<?php echo $target ?>" class="<?php echo $tClass ?>"></td>
				</tr>
				<?php 
					} 
				?>
				<tr>
					<td>
						<a id="<?php echo $grandTotalBtnID ?>">Total:</a>
					</td>
					<td>
						<span id="<?php echo $grandTotalResultID ?>"></span>
					</td>
				</tr>
			</tbody>
		</table>

		
	</div>
	<p>Authored by <a href="mailto:justin@fiercepunchstudios.com">Justin Hardage</a></p>
</body>
</html>
