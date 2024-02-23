<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<?php $this->load->view('partials/head.php'); ?>
</head>
<body>
	<?php $this->load->view('partials/navbar.php'); ?>

		<div id="container">
			<h1>
				Welcome <?= $user === 'admin' ? 'Admin' : 'Guest' ?>!
			</h1>
		</div>

	<?php $this->load->view('partials/footer.php'); ?>

</body>
</html>
