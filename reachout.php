<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>LinkedIn Reachout Messages</title>
</head>
<body>
<?php
$templates = [];

$templates[] = [
	'title'=>"Friendly & casual",
	'text'=>"Hey [Name], hope you’re doing well! I'm currently looking for new roles in software engineering / full-stack dev. If you hear of any openings or can introduce me to someone hiring, I’d really appreciate it."
];

$templates[] = [
	'title'=>"Polite & professional",
	'text'=>"Hi [Name], I’m exploring new opportunities in software engineering and wanted to ask if there are any openings or referrals you could recommend at your company. Thanks in advance for any leads!"
];

$templates[] = [
	'title'=>"Direct & confident",
	'text'=>"Hey [Name], I’m looking for my next role in software engineering (Laravel, React, Python). If your company or someone in your network is hiring, could you point me their way? Appreciate it!"
];
?>

	<form>
		<input type="text" name="person_name" id="person_name">
	</form>

	<div id="templates">

		<?php foreach($templates as $_i => $_template): ?>
			<div id="template_<?= $_i; ?>">
				<h4><?= $_template['title']; ?></h4>
			</div>
		<?php endforeach; ?>
		
	</div>

</body>
</html>