<?php include "tools/head.php";?>
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
<?php $con=mysqli_connect('localhost','web','123456','sites');?>
    <body>
        <div class="d-flex" id="wrapper">
            <?php include "tools/knotesdashboard.php";?>
            <div id="page-content-wrapper">
                <?php include "tools/navpoint.php";?>
            <?php
            if(isset($_GET['select']))
            {
                global $select;
                $select=$_GET['select'];
                $sql="select * from func_notes where fun_name='$select'";
                $res=mysqli_query($con,$sql);
                $row=mysqli_fetch_assoc($res);
                $date=$row['date'];
                $artical=$row['artical'];

            ?>
                <div class="container-fluid">
                    <article>
                        <h3><?php echo $date;?></h3><input type="text" placeholder="Title" style="outline:none;border:0px; border-bottom: #787878 1px solid;margin:5px;font-size:18px;" name="title" value="<?php echo $select;?>">
                        <input type="hidden" name="date" value="<?php echo date("d M Y");?>">
                        <textarea name="artical" id="" cols="30" rows="10" style="resize: none; border:0px;width:100%;outline:0px;height:85vh;" required><?php echo $artical?></textarea>
                                 
                    </article>
                </div>

            <?php
            }
            else
            {
            ?>
                <div class="container-fluid">
                    <article>
                        <h3><?php echo date("d M Y");?></h3><input type="text" placeholder="Title" style="outline:none;border:0px; border-bottom: #787878 1px solid;margin:5px;font-size:18px;" name="title">
                        <input type="hidden" name="date" value="<?php echo date("d M Y");?>">
                        <textarea name="artical" id="" cols="30" rows="10" style="resize: none; border:0px;width:100%;outline:0px;height:85vh;" required></textarea>
                                 
                    </article>
                </div>
            </div>
        </div>
</form>
        <?php
            }
        if(isset($_POST['save']))
        {
            $title=$_POST['title'];
            $artical=$_POST['artical'];
            $date=$_POST['date'];
            $urle="?select=$title";
            if(isset($_GET['select']))
            {
                $sql="update func_notes set fun_name='$title',artical='$artical',date='$date',fun_url='$urle' where fun_name='$select'";
            }
            else
            {
                $sql="insert func_notes (fun_name,artical,date,fun_url)values('$title','$artical','$date','$urle')";
            }
            $res=mysqli_query($con,$sql);
            header("Location:knotes.php");
            
        }
        
        ?> 
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
	<script src="js/scripts.js"></script>
    </body>
<?php
    }
?>
</html>