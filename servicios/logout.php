<?php
	session_start();

	if (isset($_SESSION['id_usuario'])) {
		session_destroy();
		
		//header("location: ../login"); 
	echo '<script>

  location.replace("../login")

</script>';	
				
		
	} else {
		
			echo '<script>

  location.replace("../login")

</script>';	
		
		
	}

?>