<?php
    $firstname = $_POST['firstname'];
    $lastname  = $_POST['lastname'];
    $email     = $_POST['email'];
    $gender    = $_POST['gender'];
    $feedback  = $_POST['feedback'];

    $conn = new mysqli('localhost','root','','dannydatabase');
              if($conn->connect_error){
		        echo "$conn->connect_error";
		        die("Connection Failed : ". $conn->connect_error);
			  } else {
		      $stmt = $conn->prepare("insert into feedbackstage(firstname, lastname, email, gender, feedback) values(?, ?, ?, ?, ?)");
		      $stmt->bind_param("sssss", $firstname, $lastname, $email, $gender, $feedback);
		      $execval = $stmt->execute();
		      echo "Feedback reported successfully...";
		      $stmt->close();
		      $conn->close();
	          }
?>