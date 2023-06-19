<?php

namespace App\Core;
?>

<style>
	.text-error {
		font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
		padding: 25% 0;
		text-align: center;
		font-size: 20px;
		font-weight: bold;
		color: grey;
	}
</style>


<?php
class Error
{

	public function fileNotFound()
	{
		// echo "Ini file app/controllers/Error.php - fileNotFound()";
		echo "<p class='text-error'>404 - FILE TIDAK DITEMUKAN</p>";
	}
}
 ?>