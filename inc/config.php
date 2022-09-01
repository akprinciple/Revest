<?php
			$server = "localhost";
			$user = "root";
			$pwd = "";
			$db = "revest";

			$connect = mysqli_connect($server, $user, $pwd, $db);

			// if ($connect) {
  	// echo "connected";
   //      }
		
                            $sss= mysqli_query($connect, "SELECT firstname FROM users WHERE level = 1");
                            $rrr = mysqli_fetch_array($sss);
                            $website = $rrr['firstname'];
                       
?>