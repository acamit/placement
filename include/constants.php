<?php
		require_once('../server/connect.inc.php');
		$batch = "SELECT `current_batch` from `batches` where `id`=1";
		$result = mysqli_query($connect , $batch);
		$current_batch = mysqli_fetch_assoc($result)['current_batch'];
		define('CURRENT_BATCH', $current_batch);
?>