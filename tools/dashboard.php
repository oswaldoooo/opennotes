            <div class="border-end bg-white" id="sidebar-wrapper">
                <div class="sidebar-heading border-bottom bg-light">Documents</div>
                <div class="list-group list-group-flush">
                    <?php include "dbcon.php";?>
                    <?php
                    $db=new dbtools('sites');
                    $re=$db->selecttable('func');
                    while($rows=mysqli_fetch_assoc($re))
                    {
                        $name=$rows['fun_name'];
                        $url=$rows['fun_url'];
                        echo "<a class='list-group-item list-group-item-action list-group-item-light p-3' href='$url'>$name</a>";
                    }
                    if($_SERVER['PHP_SELF']=="/notes.php")
                    {
                    ?>
                    <button class="btn btn-dark" id="" type="submit" value="addlanguage" name="addlanguage" onclick="location.href='?addlanguage=true'">Add new language</button>
                    <?php
                    }
                    ?>
                </div>
            </div>
            