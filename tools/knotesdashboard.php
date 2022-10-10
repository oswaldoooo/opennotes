            <div class="border-end bg-white" id="sidebar-wrapper" style="padding: 3px;">
                <div class="sidebar-heading border-bottom bg-light">Documents</div>
                <div class="list-group list-group-flush">
                    <?php include "dbcon.php";?>
                    <?php
                    $db=new dbtools('sites');
                    $re=$db->selecttable('func_notes');
                    while($rows=mysqli_fetch_assoc($re))
                    {
                        $name=$rows['fun_name'];
                        $url=$rows['fun_url'];
                        echo "<a class='list-group-item list-group-item-action list-group-item-light p-3' href='$url'>$name</a>";
                    }
                    ?>
                    <!-- <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#!">Dashboard</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#!">Shortcuts</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#!">Overview</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#!">Events</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#!">Profile</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#!">Status</a> -->
                </div>
            </div>