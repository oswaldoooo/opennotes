<?php
            if($_SERVER['PHP_SELF']=='/' || $_SERVER['PHP_SELF']=='/index.php' || $_SERVER['PHP_SELF']=='/notes.php')
            {
            ?>
                <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                    <div class="container-fluid">
                        <button class="btn btn-primary" id="sidebarToggle">Language Menu</button>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
                                <li class="nav-item active"><a class="nav-link" href="index.php">Home</a></li>
                                <li class="nav-item"><a class="nav-link" href="knotes.php">Keep Notes</a></li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Edit</a>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="notes.php">Take notes</a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            <?php
            }
            elseif($_SERVER['PHP_SELF']=='/knotes.php')
            {
            ?>
<form method="post">
                <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                    <div class="container-fluid">
                        <button class="btn btn-primary" id="sidebarToggle" style="margin-right: 7px;">Language Menu</button>

                        <button class="btn btn-success" id="" type="submit" value="save" name="save">Save</button>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
                                <li class="nav-item active"><a class="nav-link" href="index.php">Home</a></li>
                                <li class="nav-item"><a class="nav-link" href="knotes.php">Flush</a></li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Edit</a>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="notes.php">Take notes</a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>

            <?php
            }
            ?>