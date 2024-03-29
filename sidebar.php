<nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0">
    <div class="container-fluid d-flex flex-column p-0">
        <a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="index.php">
            <div class="sidebar-brand-icon"><i class="fas fa-book"></i></div>
            <div class="sidebar-brand-text mx-3"><span>Rayes Reads</span></div>
        </a>
        <hr class="sidebar-divider my-0">
        <ul class="navbar-nav text-light" id="accordionSidebar">
            <?php if ($user["Is_Admin"] == 1): ?>
                <li class="nav-item">
                    <a class="nav-link" href="index.php"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a>
                </li>
            <?php endif; ?>

            <li class="nav-item">
                <a class="nav-link" href="profile.php"><i class="fas fa-user"></i><span>Profile</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="shelf.php"><i class="fas fa-book"></i><span>Shelf</span></a>
            </li>

            <?php if ($user["Is_Admin"] == 1): ?>
                <li class="nav-item">
                    <a class="nav-link" href="users.php"><i class="fas fa-users"></i><span>Users</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="books.php"><i class="fas fa-book"></i><span>Books</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Borrowers.php"><i class="fas fa-book-reader"></i><span>Borrowers</span></a>
                </li>
            <?php endif; ?>

        </ul>
        <div class="text-center d-none d-md-inline">
            <button title="#" class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button>
        </div>
    </div>
</nav>