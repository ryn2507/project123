<?php
$nama = $_SESSION['userName'];
?>
<div class="content-wrapper">
    <div class="container-fluid flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <form method="post" action="">
                    <h5 class="card-header"><center>Change Password</center></h5>
                    <div class="card-body demo-vertical-spacing demo-only-element">

                        <div class="input-group">
                            <div class="col-md-3">
                            </div>
                            <div class="col-md-3">
                                <label for="basic-default-company">Username (No Space)</label>
                            </div>
                            <div class="col-md-3">
                                <input type="text" class="form-control" name="userid" value="<?=$_SESSION['userId']?>" id="exampleInputEmail1" placeholder="Enter User Name" readonly >
                            </div>
                            <div class="col-md-3">
                            </div>
                        </div>

                        <div class="input-group">
                            <div class="col-md-3">
                            </div>
                            <div class="col-md-3">
                                <label for="basic-default-company">Input Full Name</label>
                            </div>
                            <div class="col-md-3">
                                <input type="text" value="<?=$_SESSION['userName']?>" class="form-control" name="username" id="exampleInputEmail1" placeholder="Enter Your Full Name" readonly />
                            </div>
                            <div class="col-md-3">
                            </div>
                        </div>

                        <div class="input-group">
                            <div class="col-md-3">
                            </div>
                            <div class="col-md-3">
                                <label for="basic-default-company">Your Email</label>
                            </div>
                            <div class="col-md-3">
                                <input type="email" value="<?=$_SESSION['email']?>" class="form-control" name="email" id="exampleInputEmail1" placeholder="Enter Your Email" readonly />
                            </div>
                            <div class="col-md-3">
                            </div>
                        </div>

                        <div class="input-group">
                            <div class="col-md-3">
                            </div>
                            <div class="col-md-3">
                                <label for="basic-default-company">Password</label>
                            </div>
                            <div class="col-md-3">
                                <input type="password" class="form-control" value="" name="password" id="Password1" placeholder="Password" required >
                            </div>
                            <div class="col-md-3">
                            </div>
                        </div>

                        <div class="input-group">
                            <div class="col-md-3">
                            </div>
                            <div class="col-md-3">
                                <label for="basic-default-company">Re-Confirm Password</label>
                            </div>
                            <div class="col-md-3">
                                <input type="password" value="" class="form-control" id="Password2" placeholder="Re-Confirm Password" required>
                            </div>
                            <div class="col-md-3">
                            </div>
                        </div>
                        <br>
                        <div class="input-group">
                            <div class="col-md-12">
                                <center><button type="submit" class="btn btn-primary" name="submit">Save</button></center>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript"></script>
<?php

if (isset($_POST['submit'])){

    $update = "update smartUsers set userPassword='".$_POST['password']."',lastChangePassword=getdate() where userId='".$_SESSION['userId']."'";
    #echo $update;die;
    try {
        $stmt = $conn->prepare($update);
        $stmt->execute([$_POST['username'], $_POST['password'], $_POST['email']]);
    } catch (PDOException $e) {
        $e->getMessage();
    }

    $insert = "insert into smartLog(id,subsid,categoryLog,descriptionLog,insertBy,insertDate)values(next value for smartLogSeq,'','Change Password','Change Password','".$_SESSION['userId']."',getdate())";
    #echo $insert;die;
    try {
        $stmt = $conn->prepare($insert);
        $stmt->execute([$_POST['username'], $_POST['password'], $_POST['email']]);
    } catch (PDOException $e) {
        $e->getMessage();
    }

    echo "<script>alert('Your password has been reset ! ');window.location.href='../logout.php';</script>";
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