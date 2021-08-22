<?php include('config.inc.php'); ?>
<div class="main-content">
    <div class="wrapper">
        <h1>Update student</h1>

        <br><br>

        <?php 
            //1. Get the ID of Selected Admin
            $roll=$_GET['roll'];

            //2. Create SQL Query to Get the Details
            $sql="SELECT * FROM users WHERE roll=$roll";

            //Execute the Query
            $res=mysqli_query($db, $sql);

            //Check whether the query is executed or not
            if($res==true)
            {
                // Check whether the data is available or not
                $count = mysqli_num_rows($res);
                //Check whether we have admin data or not
                if($count==1)
                {
                    // Get the Details
                    //echo "Admin Available";
                    $row=mysqli_fetch_assoc($res);

                    $roll=$row['roll'];
                    $username=$row['username'];
                    $email=$row['email'];
                    $department=$row['department'];
                    $gender=$row['gender'];
                }
                else
                {
                    //Redirect to Manage Admin PAge
                    header('location:'.SITEURL.'manage_users.php');
                }
            }
        
        ?>


        <form action="" method="POST">

            <table class="tbl-30">
                <tr>
                    <td>Roll number: </td>
                    <td>
                        <input type="text" name="roll" value="<?php echo $roll; ?>">
                    </td>
                </tr>

                <tr>
                    <td>username: </td>
                    <td>
                        <input type="text" name="username" value="<?php echo $username; ?>">
                    </td>
                </tr>
                <tr>
                    <td>email: </td>
                    <td>
                        <input type="text" name="email" value="<?php echo $email; ?>">
                    </td>
                </tr>
                <tr>
                    <td>department: </td>
                    <td>
                        <input type="text" name="department" value="<?php echo $department; ?>">
                    </td>
                </tr>
                <tr>
                    <td>Gender: </td>
                    <td>
                        <input type="text" name="gender" value="<?php echo $gender; ?>">
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="hidden" name="roll" value="<?php echo $roll; ?>">
                        <input type="submit" name="submit" value="Update student" class="btn-secondary">
                    </td>
                </tr>

            </table>

        </form>
    </div>
</div>

<?php 

    //Check whether the Submit Button is Clicked or not
    if(isset($_POST['submit']))
    {
        //echo "Button CLicked";
        //Get all the values from form to update
        $roll=$_POST['roll'];
        $username=$_POST['username'];
        $email=$_POST['email'];
        $department=$_POST['department'];
        $gender=$_POST['gender'];

        //Create a SQL Query to Update Admin
        $sql = "UPDATE users SET
        roll='$roll',
        username = '$username',
        email= '$email',
        department= '$department',
        gender= '$gender'
        WHERE roll='$roll'
        ";
        //Execute the Query
        $res = mysqli_query($db, $sql);

        //Check whether the query executed successfully or not
        if($res==true)
        {
            //Query Executed and Admin Updated
            $_SESSION['update'] = "<div class='success'>student Updated Successfully.</div>";
            //Redirect to Manage Admin Page
            header('location:'.SITEURL.'manage_users.php');
        }
        else
        {
            //Failed to Update Admin
            $_SESSION['update'] = "<div class='error'>Failed to Update Student.</div>";
            //Redirect to Manage Admin Page
            header('location:'.SITEURL.'manage_users.php');
        }
    }

?>
