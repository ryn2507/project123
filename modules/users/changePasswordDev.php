<?php
// print_r($_SESSION);
// die;
?>
<div class="content-wrapper">
    <!-- Content -->
    <div class="container-fluid flex-grow-1 container-p-y">
        <div class="card-body">
            <div class="row">
                <div class="box col-md-12">
                    <div class="box-inner">
                        <div class="box-header well" data-original-title="">
                            <h2><i class="glyphicon glyphicon-edit"></i> Change Password</h2>

                            <div class="box-icon">
                                <!--a href="#" class="btn btn-setting btn-round btn-default"><i
                                        class="glyphicon glyphicon-cog"></i></a-->
                                <a href="#" class="btn btn-minimize btn-round btn-default"><i
                                        class="glyphicon glyphicon-chevron-up"></i></a>
                                <!--a href="#" class="btn btn-close btn-round btn-default"><i
                                        class="glyphicon glyphicon-remove"></i></a-->
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                            </div>
                            <div class="col-md-4">
                                <div class="box-content">
                                    <form method="post" action="">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Username (No Space)</label>
                                            <input type="text" class="form-control" name="userid" value="<?=$_SESSION['USER_NAME']?>" id="exampleInputEmail1" placeholder="Enter User Name" readonly >
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Input Full Name</label>
                                            <input type="text" value="<?=$_SESSION['CUST_NAME']?>" class="form-control" name="username" id="exampleInputEmail1" placeholder="Enter Your Full Name" required >
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Your Email</label>
                                            <input type="email" value="<?=$_SESSION['EMAIL']?>" class="form-control" name="email" id="exampleInputEmail1" placeholder="Enter Your Email">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Password</label>
                                            <input type="password" class="form-control" value="" name="password" id="Password1" placeholder="Password" required >
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Re-Confirm Password</label>
                                            <input type="password" value="" class="form-control" id="Password2" placeholder="Re-Confirm Password" required>
                                        </div>

                                        <center>
                                            <input type="submit" name="submit" value="UPDATE" class="btn btn-info">
                                        </center>
                                    </form>
                                </div>
                            </div>
                            <div class="col-md-4">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php

if (isset($_POST['submit'])){

    $update = "update propUsers set userName='".$_POST['username']."', userPassword='".$_POST['password']."',userEmail='".$_POST['email']."' where userId='".$_SESSION['USER_NAME']."'";
    // echo $insert;
    try {
        $stmt = $conn->prepare($update);
        $stmt->execute([$_POST['username'], $_POST['password'], $_POST['email']]);
    } catch (PDOException $e) {
        $e->getMessage();
    }

    echo "<script>alert('Update Data berhasil');window.location.href='logout';</script>";
}

?>

<script>
    $("#Password2").change(function(){
        if($(this).val() != $("#Password1").val()){
            alert("Password do not match");
            $("input[name=submit]").prop("disabled", true);
        }if($(this).val() == $("#Password1").val()){
            $("input[name=submit]").prop("disabled", false);
        }
    });
</script>