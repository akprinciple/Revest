
<?php 
					require '../inc/config.php';
					if (isset($_GET['q'])) {
						$id = $_GET['q'];
               $query = mysqli_query($connect, "SELECT * FROM gallery WHERE id = '{$id}'");
               $rw = mysqli_fetch_array($query);

                        unlink('../assets/images/gallery/'.$rw['name']);
                        $del = mysqli_query($connect, "DELETE FROM gallery WHERE id = '{$rw['id']}'");
                        if ($del) {
                        	echo "d-none";
                        }
                    }elseif (isset($_GET['f'])) {
						$id = $_GET['f'];
               $query = mysqli_query($connect, "SELECT * FROM files WHERE id = '{$id}'");
               $rw = mysqli_fetch_array($query);

                        unlink('../assets/files/'.$rw['name']);
                        $del = mysqli_query($connect, "DELETE FROM files WHERE id = '{$rw['id']}'");
                        if ($del) {
                        	echo "d-none";
                        }
                    }

                         ?>