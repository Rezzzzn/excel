<?php
// Mengambil data dari URL
$id = $_GET['id'] ?? '';
$name = $_GET['name'] ?? '';
$number = $_GET['number'] ?? '';
?>

<!doctype html>
<html lang="en">
<!--begin::Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>AdminLTE 4 | Simple Tables</title>
    <!--begin::Primary Meta Tags-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="title" content="AdminLTE 4 | Simple Tables" />
    <meta name="author" content="ColorlibHQ" />
    <meta
        name="description"
        content="AdminLTE is a Free Bootstrap 5 Admin Dashboard, 30 example pages using Vanilla JS." />
    <meta
        name="keywords"
        content="bootstrap 5, bootstrap, bootstrap 5 admin dashboard, bootstrap 5 dashboard, bootstrap 5 charts, bootstrap 5 calendar, bootstrap 5 datepicker, bootstrap 5 tables, bootstrap 5 datatable, vanilla js datatable, colorlibhq, colorlibhq dashboard, colorlibhq admin dashboard" />
    <!--end::Primary Meta Tags-->
    <!--begin::Fonts-->
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css"
        integrity="sha256-tXJfXfp6Ewt1ilPzLDtQnJV4hclT9XuaZUKyUvmyr+Q="
        crossorigin="anonymous" />
    <!--end::Fonts-->
    <!--begin::Third Party Plugin(OverlayScrollbars)-->
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.10.1/styles/overlayscrollbars.min.css"
        integrity="sha256-tZHrRjVqNSRyWg2wbppGnT833E/Ys0DHWGwT04GiqQg="
        crossorigin="anonymous" />
    <!--end::Third Party Plugin(OverlayScrollbars)-->
    <!--begin::Third Party Plugin(Bootstrap Icons)-->
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
        integrity="sha256-9kPW/n5nn53j4WMRYAxe9c1rCY96Oogo/MKSVdKzPmI="
        crossorigin="anonymous" />
    <!--end::Third Party Plugin(Bootstrap Icons)-->
    <!--begin::Required Plugin(AdminLTE)-->
    <link rel="stylesheet" href="../../static/css/adminlte.css" />
    <!--end::Required Plugin(AdminLTE)-->
</head>

<body>

    <!--begin::App Wrapper-->
    <div class="app-wrapper">
        <!--begin::Header-->
        <nav class="app-header navbar navbar-expand bg-body">
            <!--begin::Container-->
            <div class="container-fluid">
                <!--begin::Start Navbar Links-->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-lte-toggle="sidebar" href="#" role="button">
                            <i class="bi bi-list"></i>
                        </a>
                    </li>
                    <li class="nav-item d-none d-md-block"><a href="#" class="nav-link">Home</a></li>
                    <li class="nav-item d-none d-md-block"><a href="#" class="nav-link">Contact</a></li>
                </ul>
                <!--end::Start Navbar Links-->
                <!--begin::End Navbar Links-->
                <ul class="navbar-nav ms-auto">
                    <!--begin::Navbar Search-->
                    <li class="nav-item">
                        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                            <i class="bi bi-search"></i>
                        </a>
                    </li>
                    <!--end::Navbar Search-->
                    <!--begin::Fullscreen Toggle-->
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-lte-toggle="fullscreen">
                            <i data-lte-icon="maximize" class="bi bi-arrows-fullscreen"></i>
                            <i data-lte-icon="minimize" class="bi bi-fullscreen-exit" style="display: none"></i>
                        </a>
                    </li>
                    <!--end::Fullscreen Toggle-->
                    <!--begin::User Menu Dropdown-->
                    <li class="nav-item dropdown user-menu">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <img
                                src="../../static/assets/img/user2-160x160.jpg"
                                class="user-image rounded-circle shadow"
                                alt="User Image" />
                            <span class="d-none d-md-inline">Alexander Pierce</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
                            <!--begin::User Image-->
                            <li class="user-header text-bg-primary">
                                <img
                                    src="../../static/assets/img/user2-160x160.jpg"
                                    class="rounded-circle shadow"
                                    alt="User Image" />
                                <p>
                                    Alexander Pierce - Web Developer
                                    <small>Member since Nov. 2023</small>
                                </p>
                            </li>
                            <!--end::User Image-->
                            <!--begin::Menu Body-->
                            <li class="user-body">
                                <!--begin::Row-->
                                <div class="row">
                                    <div class="col-4 text-center"><a href="#">Followers</a></div>
                                    <div class="col-4 text-center"><a href="#">Sales</a></div>
                                    <div class="col-4 text-center"><a href="#">Friends</a></div>
                                </div>
                                <!--end::Row-->
                            </li>
                            <!--end::Menu Body-->
                            <!--begin::Menu Footer-->
                            <li class="user-footer">
                                <a href="#" class="btn btn-default btn-flat">Profile</a>
                                <a href="#" class="btn btn-default btn-flat float-end">Sign out</a>
                            </li>
                            <!--end::Menu Footer-->
                        </ul>
                    </li>
                    <!--end::User Menu Dropdown-->
                </ul>
                <!--end::End Navbar Links-->
            </div>
            <!--end::Container-->
        </nav>
        <!--end::Header-->
        <!--begin::Sidebar-->
        <aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
            <!--begin::Sidebar Brand-->
            <div class="sidebar-brand">
                <!--begin::Brand Link-->
                <a href="./index.html" class="brand-link">
                    <!--begin::Brand Image-->
                    <img
                        src="../../static/assets/img/AdminLTELogo.png"
                        alt="AdminLTE Logo"
                        class="brand-image opacity-75 shadow" />
                    <!--end::Brand Image-->
                    <!--begin::Brand Text-->
                    <span class="brand-text fw-light">LALALALA</span>
                    <!--end::Brand Text-->
                </a>
                <!--end::Brand Link-->
            </div>
            <!--end::Sidebar Brand-->
            <!--begin::Sidebar Wrapper-->
            <div class="sidebar-wrapper">
                <nav class="mt-2">
                    <!--begin::Sidebar Menu-->
                    <ul
                        class="nav sidebar-menu flex-column"
                        data-lte-toggle="treeview"
                        role="menu"
                        data-accordion="false">
                        <li class="nav-item menu-open">
                            <a href="../index.php" class="nav-link active">
                                <i class="nav-icon bi bi-speedometer"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                    </ul>
                    </li>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="simple.html" class="nav-link">
                                <i class="nav-icon bi bi-table "></i>
                                <p class="mb-0" style="margin-left:10px ;">Simple Tables</p>
                            </a>
                            <a href="./examples/login-v2.html" class="nav-link">
                                <i class="nav-icon bi bi-box-arrow-in-right"></i>
                                <p class="mb-0" style="margin-left:10px ;">Login</p>
                            </a>
                            <a href="./examples/register-v2.html" class="nav-link">
                                <i class="nav-icon bi bi-box-arrow-in-right"></i>
                                <p class="mb-0" style="margin-left:10px ;">Register</p>
                            </a>
                        </li>
                    </ul>
                    </ul>
                    <!--end::Sidebar Menu-->
                </nav>
            </div>
            <!--end::Sidebar Wrapper-->
        </aside>
        <main class="app-main">
            <div class="app-content-header">
                <!--begin::Container-->
                <div class="card container-fluid">
                    <!--begin::Row-->
                    <div class="row">
                        <div class="col-sm-9 m-3">
                            <h3>Edit</h3>
                            <form action="update.php" method="POST">
                                <div class=" modal-body mb-">
                                    <!-- ID input hidden -->
                                    <input type="hidden" name="id" value="<?= htmlspecialchars($id) ?>">

                                    <div class="mb-3">
                                        <label for="editName" class="form-label">Name</label>
                                        <input type="text" class="form-control" id="editName" name="name" value="<?= htmlspecialchars($name) ?>" placeholder="Enter name" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="editNumber" class="form-label">Number</label>
                                        <input type="number" class="form-control" id="editNumber" name="number" value="<?= htmlspecialchars($number) ?>" placeholder="Enter number" required>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary me-2" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-dark">Save Changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
        </main>
</body>

</html>