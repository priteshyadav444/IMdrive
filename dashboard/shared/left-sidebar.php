<?php
require_once "../Config/Privilege.php";
require_once "../Config/SessionConfig.php";
@session_start();
// var_dump($_SESSION[SessionConfig::PRIVILAGS]);

// var_dump($_SESSION[SessionConfig::PRIVILAGS]);
// if (!isset($_SESSION[SessionConfig::PRIVILAGS][Privilege::VIEW_DRIVE])) {
//     $URL = "login.php";
//     header('Location: ' . $URL);
// }
?>


<div class="left-sidebar-pro">
    <nav id="sidebar" class="">
        <div class="sidebar-header">
            <a href="index.php"><img class="main-logo" src="img/logo/logo.png" alt="" /></a>
            <strong><a href="index.php"><img src="img/logo/logosn.png" alt="" /></a></strong>
        </div>
        <div class="left-custom-menu-adp-wrap comment-scrollbar">
            <nav class="sidebar-nav left-sidebar-menu-pro">
                <ul class="metismenu" id="menu1">
                    <?php

                    if (isset($_SESSION[SessionConfig::PRIVILAGS][Privilege::VIEW_DASHBOARD]) && $_SESSION[SessionConfig::PRIVILAGS][Privilege::VIEW_DASHBOARD]) {
                        echo ' <li>
                        <a class="has-arrow" href="home/index.php" aria-expanded="false">
                            <span class="glyphicon glyphicon-stats" aria-hidden="true"></span>
                            <span class="mini-click-non">Dashboard</span></a>
                        <ul class="submenu-angle" aria-expanded="false">
                            <li><a title="Dashboard View" href="../home/index.php"><span class="mini-sub-pro">View
                                        Dashboard </span></a></li>

                        </ul>
                    </li>';
                    }

                    if (isset($_SESSION[SessionConfig::PRIVILAGS][Privilege::VIEW_DRIVE]) && $_SESSION[SessionConfig::PRIVILAGS][Privilege::VIEW_DRIVE]) {
                        echo '<li>
                            <a class="has-arrow" href="all-courses.php" aria-expanded="false">
                                <span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span>
                                <span class="mini-click-non"> Drive </span>
                            </a>
                            <ul class="submenu-angle" aria-expanded="false">
                                <li>
                                    <a title="User List" href="../drive/projects.php">
                                        <span class="mini-sub-pro">
                                            View Project
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a title="User List" href="../drive/add-project.php">
                                        <span class="mini-sub-pro">
                                            Add Project
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a title="User List" href="../drive/archive.php">
                                        <span class="glyphicon glyphicon-folder-close" aria-hidden="true"></span>
                                        <span class="mini-sub-pro">
                                            Archive
                                        </span>
                                    </a>
                                </li>
                            </ul>
                        </li>';
                    }

                    if (isset($_SESSION[SessionConfig::PRIVILAGS][Privilege::VIEW_MASTER]) && $_SESSION[SessionConfig::PRIVILAGS][Privilege::VIEW_MASTER]) {
                        echo '
                        <li>
                        <a class="has-arrow" href="master.php" aria-expanded="false">
                            <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                            <span class="mini-click-non">Master</span>
                        </a>
                        <ul class="submenu-angle" aria-expanded="false">
                            <li>
                                <a title="master List" href="../master/index.php">
                                <span class="mini-sub-pro"> Master Lists </span>
                                </a>
                            </li>
                            <li>
                                <a title="Add Master List" href="../master/add-master.php">
                                    <span class="mini-sub-pro"> Add Master List</span>
                                </a>
                            </li>
                        </ul>
                        </li>';
                    }

                    if (isset($_SESSION[SessionConfig::PRIVILAGS][Privilege::VIEW_USER]) && $_SESSION[SessionConfig::PRIVILAGS][Privilege::VIEW_USER]) {
                        echo ' <li>
                        <a class="has-arrow" href="../user/users.php" aria-expanded="false">
                            <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                            <span class="mini-click-non">Users</span>
                        </a>
                        <ul class="submenu-angle" aria-expanded="false">
                            <li>
                                    <a title="User List" href="../user/users.php">
                                        <span class="mini-sub-pro">User List
                                        </span>
                                    </a>
                            </li>
                            <li>
                                <a title="Add User" href="../user/add-user.php">
                                    <span class="mini-sub-pro">Add
                                        User
                                    </span>
                                </a>
                            </li>
                        </ul>
                        </li>';
                    }

                    if (isset($_SESSION[SessionConfig::PRIVILAGS][Privilege::VIEW_TASK]) && $_SESSION[SessionConfig::PRIVILAGS][Privilege::VIEW_TASK_LOG]) {
                        echo '<li>
                        <a class="has-arrow" href="../task/log.php" aria-expanded="false">
                            <span class="glyphicon glyphicon-check" aria-hidden="true"></span>
                            <span class="mini-click-non">Tasks Log</span>
                        </a>
                        <ul class="submenu-angle" aria-expanded="false">
                            <li>
                                <a title="Task Log" href="../task/log.php">
                                    <span class="mini-sub-pro">
                                        View Task
                                 </span>
                                </a>
                            </li>
                        </ul>
                    </li>';
                    }

                    if (isset($_SESSION[SessionConfig::PRIVILAGS][Privilege::VIEW_TICKET]) && $_SESSION[SessionConfig::PRIVILAGS][Privilege::VIEW_TICKET]) {
                        echo ' <li>
                        <a class="has-arrow" href="../ticket" aria-expanded="false">
                            <span class="glyphicon glyphicon-comment" aria-hidden="true"></span>
                            <span class="mini-click-non">Tickets</span>
                        </a>
                        <ul class="submenu-angle" aria-expanded="false">
                            <li>
                                <a href="../ticket/" title="View Tickets" href="">
                                    <span class="mini-sub-pro">View Tickets</span>
                                </a>
                            </li>
                            <li>
                                <a title="Add Ticket" href="../ticket/add-ticket.php">
                                    <span class="mini-sub-pro"> Add Ticket
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </li>';
                    }



                    if (isset($_SESSION[SessionConfig::PRIVILAGS][Privilege::VIEW_ROLES_PERMISSION]) && $_SESSION[SessionConfig::PRIVILAGS][Privilege::VIEW_ROLES_PERMISSION]) {
                        echo '<li>
                        <a class="has-arrow" href="../privilege/" aria-expanded="false">
                            <span class="glyphicon glyphicon-lock" aria-hidden="true"></span>
                            <span class="mini-click-non">Roles</span>
                        </a>
                        <ul class="submenu-angle" aria-expanded="false">
                            <li><a title="View Roles" href="../privilege/index.php"><span class="mini-sub-pro">View All</span></a></li>
                        </ul>
                        <ul class="submenu-angle" aria-expanded="false">
                            <li><a title="Add Roles" href="../privilege/add-role.php"><span class="mini-sub-pro">Add New Role</span></a></li>
                        </ul>
                    </li>';
                    }

                    echo ' <li>
                        <a class="has-arrow" href="all-courses.php" aria-expanded="false">
                            <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                            <span class="mini-click-non">Profile</span>
                        </a>
                        <ul class="submenu-angle" aria-expanded="false">
                            <li><a title="Add User" href="../profile/profile.php"><span class="mini-sub-pro">View Profile</span></a></li>
                        </ul>
                        <ul class="submenu-angle" aria-expanded="false">
                            <li><a title="Add User" href="../profile/login.php"><span class="mini-sub-pro">Login</span></a></li>
                        </ul>
                        <ul class="submenu-angle" aria-expanded="false">
                            <li><a title="Add User" href="../profile/password-recovery.php"><span class="mini-sub-pro">Password Recovery</span></a></li>
                        </ul>
                    </li>';

                    if (isset($_SESSION[SessionConfig::PRIVILAGS][Privilege::VIEW_SETTING]) && $_SESSION[SessionConfig::PRIVILAGS][Privilege::VIEW_SETTING]) {
                        echo '<li>
                        <a class="has-arrow" href="../setting" aria-expanded="false">
                            <span class="glyphicon glyphicon-cog    " aria-hidden="true"></span>
                            <span class="mini-click-non">Settings</span>
                        </a>
                        <ul class="submenu-angle" aria-expanded="false">
                            <li>
                                <a title="Add Emails" href="../setting">
                                    <span class="mini-sub-pro">Add Email</span>
                                </a>
                            </li>
                        </ul>
                    </li>';
                    }
                    ?>

                </ul>
            </nav>
        </div>
    </nav>
</div>