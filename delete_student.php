<?php 

    //Include constants.php file here
    include('server.php'); 

    // 1. get the ID of Admin to be deleted
    $roll = $_GET['roll'];

    //2. Create SQL Query to Delete Admin
    $sql = "DELETE FROM users WHERE roll=$roll";

    //Execute the Query
    $res = mysqli_query($db, $sql);

    // Check whether the query executed successfully or not
    if($res==true)
    {
        //Query Executed Successully and Admin Deleted
        //echo "Admin Deleted";
        //Create SEssion Variable to Display Message
        $_SESSION['delete'] = "<div class='success'>Student Deleted Successfully.</div>";
        //Redirect to Manage Admin Page
        header('location:'.SITEURL.'manage_users.php');
    }
    else
    {
        //Failed to Delete Admin
        //echo "Failed to Delete Admin";

        $_SESSION['delete'] = "<div class='error'>Failed to Delete student. Try Again Later.</div>";
        header('location:'.SITEURL.'manage_users.php');
    }

    //3. Redirect to Manage Admin page with message (success/error)

?>