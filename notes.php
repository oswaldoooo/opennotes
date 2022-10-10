<?php include "tools/head.php";?>
    <body>
    <?php
    $redis=new Redis();
    $redis->connect('localhost',6379);
    if(!isset($_COOKIE['status_code']) || $redis->exists($_COOKIE['status_code'])==0)
    {
        header("Location:login/index.php");
    }
    else
    {
    ?>
        <div class="d-flex" id="wrapper">
            <!-- Sidebar-->
            <?php include "tools/dashboard.php";?>
            <!-- Page content wrapper-->
            <div id="page-content-wrapper">
                <!-- Top navigation-->
                <?php include "tools/navpoint.php";?>

                <!-- Page content-->
                <div class="container-fluid">
                    <?php
                    if(isset($_GET['language']))
                    {
                        $language=$_GET['language'];
                    ?>
                    <h1 class="mt-4"><?php echo strtoupper($language);?></h1>
                    <div class="input-group">
                        <form action="" method="get">
                            <div class="row" style="width: 300px;padding:20px;">
                                <label for="effect">Effect</label>
                                <input type="text" name="effect" style="width: 300px;font-size:20px;">
                                <hr style="border: 0px;border-width:10px;">
                                <textarea name="code" id="" cols="30" rows="10" style="width: 300px;font-size:20px;"></textarea>
                                <input type="hidden" name="language" value="<?php echo $language?>">
                                <hr style="border: 0px;border-width:10px;">
                                <input type="submit" value="Submit" name="submit" class="btn btn-success">
                                <?php
                                if(isset($_GET['submit']))
                                {
                                    $language .='use';
                                    $effect=$_GET['effect'];
                                    $code=$_GET['code'];
                                    $esql="select * from {$language} where effects='{$effect}'";
                                    $re=mysqli_query($db->con,$esql);
                                    if(!$re)
                                    {
                                        die("con failed" . mysqli_errno($db->con));
                                        $db->con->close();
                                    }
                                    $co=mysqli_num_rows($re);
                                    if($co==0)
                                    {
                                        $sql="insert {$language} (effects,code)values('$effect','$code')";
                                    }
                                    else
                                    {
                                        $sql="update {$language} set code='$code' where effects='$effect'";
                                    }
                                    $res=mysqli_query($db->con,$sql);
                                    // echo $sql;
                                    // header("Location:notes.php?language=shell");
                                }            
                                ?>
                            </div>
                        </form>
                    </div>
                        
                        
                    <?php
                        
                    }
                    elseif(isset($_GET['addlanguage']))
                    {
                    ?>
                    <center>
                        <div class="input-group" style="display:block">
                            <form action="" method="get">
                                <hr style="border:0px;height:0px">
                                <h3><strong>Language</strong> name</h3>
                                <hr style="border:0px;height:0px">
                                <input type="text" name="authkey" id="" style="min-width: 300px;width:15%%;text-align: center;" required>
                                <hr style="width: 100%;border:none;background:none;height:1px;margin:8px 0;">
                                <input type="submit" value="addlanguage" name="submit" class="input-btn btn-primary">
                            </form>
                        </div>
                    </center>
                    
                    <?php
                        
                    }
                    elseif(isset($_GET['submit']))
                        {
                            $authkey=$_GET['authkey'];
                            $csql="insert func (fun_name,fun_url)values('$authkey','?language=$authkey')";
                            $ree=mysqli_query($db->con,$csql);
                            if(!$ree)
                            {
                                die("con failed stepone" . mysqli_errno($db->con));
                                $db->con->close();
                            }
                            $authkey .="use";
                            $csql="create table $authkey (effects varchar(30),code varchar(255))";
                            $ree=mysqli_query($db->con,$csql);
                            if(!$ree)
                            {
                                die("con failed steptwo" . mysqli_errno($db->con));
                                $db->con->close();
                            }
                            header("Location:/notes.php");
                            
                        }
                    else
                    { 
                    ?>
                    
                        <h1 class="mt-4">Description</h1>
                        <p>Choose the function that you wanna use,and find your answers</p>
                        <p>
                            If you think the function is good to use,please collect it.
                            Thanks for support
                        </p>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    <?php
    }
    ?>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
