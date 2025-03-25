<?php
// Koneksi ke database
include 'koneksi.php';

// Query untuk menampilkan data
$sql = "SELECT * FROM crud_table";
$result = $conn->query($sql);

$editId = isset($_GET['id']) ? $_GET['id'] : '';
$name = isset($_GET['name']) ? $_GET['name'] : '';
$number = isset($_GET['number']) ? $_GET['number'] : '';
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
  <style>
    .user-panel {
      display: flex;
      align-items: center;
      color: rgb(202, 201, 201);
      padding: 1rem;
      border-bottom: 1px solid #495057;
    }

    .user-panel img {
      width: 40px;
      height: 40px;
      border-radius: 50%;
      margin-right: 10px;
    }

    .search-bar {
      padding: 1rem;
    }
  </style>
</head>
<!--end::Head-->
<!--begin::Body-->

<body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
  <div class="modal fade" id="tambahDataModal" tabindex="-1" aria-labelledby="tambahDataModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="tambahDataModalLabel">Tambah Data</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="create.php" method="POST">
          <div class="modal-body">
            <!-- Form Name -->
            <div class="mb-3">
              <label for="name" class="form-label">Name</label>
              <input type="text" class="form-control" id="name" name="name" placeholder="Enter name" required>
            </div>
            <!-- Form Number -->
            <div class="mb-3">
              <label for="number" class="form-label">Number</label>
              <input type="number" class="form-control" id="number" name="number" placeholder="Enter number" required>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-dark">Save</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <div class="modal fade" id="editDataModal" tabindex="-1" aria-labelledby="editDataModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editDataModalLabel">Edit Data</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="editForm">
          <!-- No action atau method di sini, semua dilakukan oleh AJAX -->
          <div class="modal-body">
            <input type="hidden" name="id" id="editId">
            <div class="mb-3">
              <label for="editName" class="form-label">Name</label>
              <input type="text" class="form-control" id="editName" name="name" required>
            </div>
            <div class="mb-3">
              <label for="editNumber" class="form-label">Number</label>
              <input type="number" class="form-control" id="editNumber" name="number" required>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <!-- Add the correct ID here -->
            <button type="submit" class="btn btn-dark" id="confirmEditButton">Save Changes</button>
          </div>
        </form>
      </div>
    </div>
  </div>


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
      <div class="user-panel">
        <img src="../../static/assets/img/user2-160x160.jpg" alt="User Image">
        <span>Alexander Pierce</span>
      </div>

      <!-- Search Bar -->
      <div class="search-bar">
        <div class="input-group">

          <input type="text" class="form-control bg-body-secondary border-1 text-white" placeholder="Search">
          <span class="input-group-text bg-body-secondary border-1 text-white">
            <i class="bi bi-search"></i>
          </span>
        </div>
      </div>
      <!--end::Sidebar Brand-->
      <!--begin::Sidebar Wrapper-->
      <div class="sidebar-wrapper">
        <nav class="mt-1">
          <!--begin::Sidebar Menu-->
          <ul
            class="nav sidebar-menu flex-column"
            data-lte-toggle="treeview"
            role="menu"
            data-accordion="false">
            <li class="nav-item">
              <a href="../index.php" class="nav-link">
                <i class="nav-icon bi bi-speedometer"></i>
                <p>
                  Dashboard
                </p>
              </a>
          </ul>
          </li>
          <ul class="nav sidebar-menu flex-column">
            <li class="nav-item">
              <a href="simple.php" class="nav-link active">
                <i class="nav-icon bi bi-table "></i>
                <p class="mb-0" style="margin-left:10px ;">Simple Tables</p>
              </a>
          </ul>
          <ul class="nav sidebar-menu flex-column">
            <li class="nav-item">
              <a href="./examples/login-v2.html" class="nav-link">
                <i class="nav-icon bi bi-box-arrow-in-right"></i>
                <p class="mb-0" style="margin-left:10px ;">Login</p>
              </a>
            </li>
          </ul>
          <ul class="nav sidebar-menu flex-column">
            <li class="nav-item">
              <a href="./examples/register-v2.html" class="nav-link">
                <i class="nav-icon bi bi-box-arrow-in-right"></i>
                <p class="mb-0" style="margin-left:10px ;">Register</p>
              </a>
            </li>
          </ul>
          </li>
          </ul>
          </ul>
          <!--end::Sidebar Menu-->
        </nav>
      </div>
      <!--end::Sidebar Wrapper-->
    </aside>
    <!--end::Sidebar-->
    <!--begin::App Main-->
    <main class="app-main">
      <!--begin::App Content Header-->
      <div class="app-content-header">
        <!--begin::Container-->
        <div class="container-fluid">
          <!--begin::Row-->
          <div class="row">
            <div class="col-sm-6">
              <h3 class="mb-0">Simple Tables</h3>
              <!-- Tombol untuk memunculkan modal -->
              <button type="button" class="btn btn-dark mt-5" data-bs-toggle="modal" data-bs-target="#tambahDataModal">
                Tambah data
              </button>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-end">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Simple Tables</li>
              </ol>
            </div>
          </div>
          <!--end::Row-->
        </div>
        <!--end::Container-->
      </div>
      <!--end::App Content Header-->
      <!--begin::App Content-->
      <div class="app-content" style="padding-bottom:370px;">
        <!--begin::Container-->
        <div class="container-fluid">
          <div class="col-md-12">
            <div class="card mb-4">
              <!-- Tombol Export to Excel -->
              <div class="card-header d-flex justify-content-between align-items-center">
                <h5>Data Table</h5>
              </div>

              <!-- Tabel -->
              <table class="table table-hover">
                <thead>
                  <tr style="border-bottom: 1px solid #000;">
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Number</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php if ($result->num_rows > 0): ?>
                    <?php while ($row = $result->fetch_assoc()): ?>
                      <tr>
                        <td><?= $row['id'] ?></td>
                        <td><?= $row['name'] ?></td>
                        <td><?= $row['number'] ?></td>
                        <td>
                          <button class="btn btn-secondary btn-sm edit-btn"
                            data-id="<?= $row['id'] ?>"
                            data-name="<?= $row['name'] ?>"
                            data-number="<?= $row['number'] ?>"
                            data-bs-toggle="modal"
                            data-bs-target="#editDataModal">
                            Edit
                          </button>
                          <a href="delete.php?id=<?= $row['id'] ?>"
                            class="btn btn-dark btn-sm delete-btn"
                            data-id="<?= $row['id'] ?>">Delete</a>
                        </td>
                      </tr>
                    <?php endwhile; ?>
                  <?php else: ?>
                    <tr>
                      <td colspan="4" class="text-center">No Data Found</td>
                    </tr>
                  <?php endif; ?>
                </tbody>
              </table>

              <form action="import.php" method="POST" enctype="multipart/form-data">
                <input type="file" name="excel_file" class="form-control mb-2" accept=".xls, .xlsx" required>
                <button type="submit" name="import" class="btn btn-success btn-sm">Import Excel</button>
              </form>
              <div class="card-header d-flex justify-content-end align-items-center">
                <a href="export_to_excel.php" class="btn btn-success btn-sm me-2">Export to Excel</a>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!--end::Row-->
      <!--end::App Content-->
    </main>
    <!--end::App Main-->
    <!--begin::Footer-->
    <footer class="app-footer">
      <!--begin::To the end-->
      <div class="float-end d-none d-sm-inline">Anything you want</div>
      <!--end::To the end-->
      <!--begin::Copyright-->
      <strong>
        Copyright &copy; 2014-2024&nbsp;
        <a href="https://adminlte.io" class="text-decoration-none">AdminLTE.io</a>.
      </strong>
      All rights reserved.
      <!--end::Copyright-->
    </footer>
    <!--end::Footer-->
  </div>
  <!--end::App Wrapper-->
  <!--begin::Script-->
  <!--begin::Third Party Plugin(OverlayScrollbars)-->
  <script
    src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.10.1/browser/overlayscrollbars.browser.es6.min.js"
    integrity="sha256-dghWARbRe2eLlIJ56wNB+b760ywulqK3DzZYEpsg2fQ="
    crossorigin="anonymous"></script>
  <!--end::Third Party Plugin(OverlayScrollbars)--><!--begin::Required Plugin(popperjs for Bootstrap 5)-->
  <script
    src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
    crossorigin="anonymous"></script>
  <!--end::Required Plugin(popperjs for Bootstrap 5)--><!--begin::Required Plugin(Bootstrap 5)-->
  <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
    integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
    crossorigin="anonymous"></script>
  <!--end::Required Plugin(Bootstrap 5)--><!--begin::Required Plugin(AdminLTE)-->
  <script src="../../../dist/js/adminlte.js"></script>
  <!--end::Required Plugin(AdminLTE)--><!--begin::OverlayScrollbars Configure-->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <script>
    const SELECTOR_SIDEBAR_WRAPPER = '.sidebar-wrapper';
    const Default = {
      scrollbarTheme: 'os-theme-light',
      scrollbarAutoHide: 'leave',
      scrollbarClickScroll: true,
    };
    document.addEventListener('DOMContentLoaded', function() {
      const sidebarWrapper = document.querySelector(SELECTOR_SIDEBAR_WRAPPER);
      if (sidebarWrapper && typeof OverlayScrollbarsGlobal?.OverlayScrollbars !== 'undefined') {
        OverlayScrollbarsGlobal.OverlayScrollbars(sidebarWrapper, {
          scrollbars: {
            theme: Default.scrollbarTheme,
            autoHide: Default.scrollbarAutoHide,
            clickScroll: Default.scrollbarClickScroll,
          },
        });
      }
    });


    // Listen for clicks on the edit buttons
    document.querySelectorAll('.edit-btn').forEach(button => {
      button.addEventListener('click', () => {
        const id = button.getAttribute('data-id');
        const name = button.getAttribute('data-name');
        const number = button.getAttribute('data-number');

        // Populate the modal with the data from the button
        document.getElementById('editId').value = id;
        document.getElementById('editName').value = name;
        document.getElementById('editNumber').value = number;
      });
    });

    // Submit the form via AJAX
    document.getElementById('editForm').addEventListener('submit', function(event) {
      event.preventDefault(); // Prevent the form from submitting the traditional way

      const formData = new FormData(this); // Use 'this' to reference the form

      fetch('update.php', {
          method: 'POST',
          body: formData,
        })
        .then(response => response.json()) // Parsing response JSON
        .then(data => {
          if (data.success) {
            Swal.fire({
              title: 'Success!',
              text: data.message,
              icon: 'success',
              timer: 1500,
              showConfirmButton: false,
            }).then(() => location.reload());
          } else {
            Swal.fire({
              title: 'Error!',
              text: data.message,
              icon: 'error',
            });
          }
        })
        .catch(error => {
          console.error('Error:', error);
          Swal.fire({
            title: 'Error!',
            text: 'An unexpected error occurred.',
            icon: 'error',
          });
        });
    });



    document.addEventListener('DOMContentLoaded', function() {
      // Tangkap semua tombol dengan kelas delete-btn
      const deleteButtons = document.querySelectorAll('.delete-btn');

      deleteButtons.forEach(button => {
        button.addEventListener('click', function(event) {
          event.preventDefault(); // Hentikan aksi default tombol

          const recordId = this.getAttribute('data-id'); // Ambil ID data dari tombol
          const deleteUrl = `delete.php?id=${recordId}`; // URL untuk proses delete

          // Tampilkan SweetAlert konfirmasi
          Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
          }).then((result) => {
            if (result.isConfirmed) {
              // Kirim permintaan AJAX untuk delete
              fetch(deleteUrl, {
                  method: 'GET'
                })
                .then(response => response.text())
                .then(data => {
                  // Tampilkan SweetAlert sukses setelah delete berhasil
                  Swal.fire({
                    title: 'Deleted!',
                    text: 'Your record has been deleted.',
                    icon: 'success',
                    timer: 1500,
                    showConfirmButton: false
                  }).then(() => {
                    // Reload halaman setelah sukses
                    location.reload();
                  });
                })
                .catch(error => {
                  console.error('Error deleting record:', error);
                  Swal.fire({
                    title: 'Error!',
                    text: 'Failed to delete the record.',
                    icon: 'error'
                  });
                });
            }
          });
        });
      });
    });
  </script>
  <!--end::OverlayScrollbars Configure-->
  <!--end::Script-->
</body>
<!--end::Body-->

</html>