<?php

// login.php

require_once('connection.php');


if(isset($_POST)) {
    
    $ename = $_POST['emp'];
    $salary = $_POST['discount'];
    $bonus= $_POST['ctype'];
    
    
   



    $sql="UPDATE customer SET discount='$salary' , customer_type= '$bonus' WHERE customer_name='$ename' ";
    
$res=oci_parse($conn,$sql);
if(!$res)
echo "error";
else
{


}
$objExecute=oci_execute($res);
if($objExecute)
{

    oci_commit($conn); 
    
    header("Location:../customer_table.php?success=customer_updated");
}

else

{
    oci_rollback($conn); 

    
    echo "commit unsuccessful";

    
}
}
oci_free_statement($res);
oci_close($conn);


?>