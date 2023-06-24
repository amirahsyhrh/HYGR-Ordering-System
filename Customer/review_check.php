<?php
    // assign data from customer form into variable
    $reviewID= $_GET["id"];
    $cartID= $_GET["p_id"];
    $purchased_date = $_POST['purchased_date'];
    $rating = $_POST['rating'];
    $review_description = $_POST['review_description'];

    // Connection to the server and datbase
    $dbc = mysqli_connect ("localhost","root","","hygr");
    if (mysqli_connect_errno())
    {
        echo "Failed to connect to MySQL: ".mysqli_connect_error();
    }

    // SQL statement to insert data from form into table MENU
    $sql="INSERT INTO review (purchased_date,rating, review_description, cart_id) VALUES ('$purchased_date','$rating', '$review_description', '$cartID')";
    $results= mysqli_query($dbc,$sql);

    if ($results)
    {
        mysqli_commit($dbc);
        //display message box Record Been Added
        echo ("<script language='JavaScript' type='text/javascript'>
                        window.location.href='order.php?id=$reviewID';
                        window.alert('Your Review Has Been Submitted!')
                        </script>");
    }

    else
    { 
        mysqli_rollback($dbc);
        print '<script>window.location.assign("addMenu.php");</script>';
        echo ("<script language='JavaScript' type='text/javascript'>
                        window.location.href='order.php?id=$reviewID';
                        window.alert('Data Is Invalid , No Review Been Added!')
                        </script>");
    }
?>