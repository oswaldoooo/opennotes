<?php include "tools/head.php";?>
    <body>
        <div class="d-flex" id="wrapper">
            <!-- Sidebar-->
            <?php include "tools/dashboard.php";?>
            <!-- Page content wrapper-->
            <div id="page-content-wrapper">
                <!-- Top navigation-->
                <?php include "tools/navpoint.php";?>

                <!-- Page content-->
                <div class="container-fluid" style="width: 50%;min-width:400px;">
                    <?php
                    if(isset($_GET['language']))
                    {
                        $language=$_GET['language'];
                    ?>
                    <h1 class="mt-4"><?php echo strtoupper($language);?></h1>
                    <?php
                        $language .='use';
                        $ree=$db->selecttable($language);
                        while($row=mysqli_fetch_assoc($ree))
                        {
                            $eff=$row['effects'];
                            $cod=$row['code'];
                    ?>
                        
                        <h4><em><?php echo $eff;?></em></h4>
                        <p>
                            <code><?php echo $cod;?></code>
                        </p>
                    <?php
                        }
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
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
	<script src="js/scripts.js"></script>
    </body>
</html>
