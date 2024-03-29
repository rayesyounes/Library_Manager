<?php
if (isset($user) && !isset($_SESSION['welcome_message'])) {
    // Set a session variable to track that the welcome message has been shown
    $_SESSION['welcome_message'] = true;
    ?>
    <div class="alert alert-success alert-dismissible custom-alert right-5 top-0 fade show position-fixed mt-3 start-50 col-8 px-5 translate-middle-x" role="alert">
        <em><strong>
            Hello Mr <?php echo htmlspecialchars($user["Last_Name"]); ?>, Welcome back!
            </strong></em>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php
}
?>

<?php if (isset($user)): ?>
    <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
        <div class="container-fluid"><button title="#" class="btn btn-link d-md-none rounded-circle me-3"
                id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button>
            <form class="d-none d-sm-inline-block me-auto ms-md-3 my-2 my-md-0 mw-100 navbar-search">
                <div class="input-group"><input class="bg-light form-control border-0 small" disabled type="text"
                        placeholder="Search for ..."><button title="#" class="btn btn-primary py-0" type="button"><i
                            class="fas fa-search"></i></button></div>
            </form>
            <ul class="navbar-nav flex-nowrap ms-auto">
                
                <li class="nav-item dropdown no-arrow mx-1">
                    <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" aria-expanded="false"
                            data-bs-toggle="dropdown" href="#"><span class="badge bg-danger badge-counter">3+</span><i
                                class="fas fa-bell fa-fw"></i></a>
                        <div class="dropdown-menu dropdown-menu-end dropdown-list animated--grow-in">
                            <h6 class="dropdown-header">alerts center</h6>


                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <div class="me-3">
                                    <div class="bg-primary icon-circle"><i class="fas fa-file-alt text-white"></i></div>
                                </div>
                                <div><span class="small text-gray-500">December 12, 2023</span>
                                    <p>alert</p>
                                </div>
                            </a>


                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <div class="me-3">
                                    <div class="bg-warning icon-circle"><i
                                            class="fas fa-exclamation-triangle text-white"></i></div>
                                </div>
                                <div><span class="small text-gray-500">December 2, 2023</span>
                                    <p>alert</p>
                                </div>
                            </a>


                            <a class="dropdown-item text-center small text-gray-500" href="#">Show All
                                Alerts</a>
                        </div>
                    </div>
                </li>
                <li class="nav-item dropdown no-arrow mx-1">
                    <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" aria-expanded="false"
                            data-bs-toggle="dropdown" href="#"><span class="badge bg-danger badge-counter">7</span><i
                                class="fas fa-envelope fa-fw"></i></a>
                        <div class="dropdown-menu dropdown-menu-end dropdown-list animated--grow-in">
                            <h6 class="dropdown-header">alerts center</h6>


                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <div class="dropdown-list-image me-3"><img title="#" class="rounded-circle"
                                        src="assets/img/avatars/profile-default.png">
                                    <div class="bg-warning status-indicator"></div>
                                </div>
                                <div class="fw-bold">
                                    <div class="text-truncate"><span>Last month's report looks great, I am
                                            very happy with the progress so far, keep up the good
                                            work!</span></div>
                                    <p class="small text-gray-500 mb-0">Rayes Younes - 2d</p>
                                </div>
                            </a>

                            <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                        </div>
                    </div>
                    <div class="shadow dropdown-list dropdown-menu dropdown-menu-end" aria-labelledby="alertsDropdown">
                    </div>
                </li>
                <div class="d-none d-sm-block topbar-divider"></div>
                <li class="nav-item dropdown no-arrow">
                    <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" aria-expanded="false"
                            data-bs-toggle="dropdown" href="#"><span
                                class="d-none d-lg-inline me-2 text-gray-600 small"><?php echo htmlspecialchars($user["Last_Name"] . " " . $user["First_Name"]); ?></span><img
                                id="nav_profileImage" title="<?php echo htmlspecialchars($user["Last_Name"] . " " . $user["First_Name"]); ?>"
                                class="border rounded-circle img-profile" src="<?php echo htmlspecialchars($user["Avatar"]);?>"></a>
                        <div class="dropdown-menu shadow dropdown-menu-end animated--grow-in"><a class="dropdown-item"
                                href="profile.php"><i
                                    class="fas fa-user fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Profile</a><a
                                class="dropdown-item" href="#"><i
                                    class="fas fa-cogs fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Settings</a><a
                                class="dropdown-item" href="#"><i
                                    class="fas fa-list fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Activity log</a>
                            <div class="dropdown-divider"></div><a class="dropdown-item" href="logout.php"><i
                                    class="fas fa-sign-out-alt fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Logout</a>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
<?php endif; ?>