<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>GIS | <?= $judul ?></title>
    <link href="<?= base_url('sb-admin/') ?>css/styles.css" rel="stylesheet" />

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="<?= base_url('sb-admin/') ?>js/scripts.js"></script>
    
    <script src="<?= base_url('js/jquery-3.7.1.min.js') ?>"></script>
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Rute -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.2.0/dist/leaflet.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.css" />
    <script src="https://unpkg.com/leaflet@1.2.0/dist/leaflet.js"></script>
    <script src="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"/>
    <script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

    <!-- Data Table -->
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
</head>

<body>
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="index.html">Belajar GIS</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <div class="input-group">
                <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
            </div>
        </form>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#!"><i class="fa-solid fa-gears"></i> Settings</a></li>
                    <li><a class="dropdown-item" href="#!"><i class="fa-solid fa-chart-line"></i> Activity Log</a></li>
                    <li>
                        <hr class="dropdown-divider" />
                    </li>
                    <li><a class="dropdown-item" href="#!"><i class="fa-solid fa-arrow-right-from-bracket"></i> Logout</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Core</div>
                        <a class="nav-link" href="<?= base_url('Home/') ?>">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                        <div class="sb-sidenav-menu-heading">Tanpa Database</div>
                        <a class="nav-link" href="<?= base_url('Home/viewmap') ?>">
                            <div class="sb-nav-link-icon"><i class="fa-regular fa-map"></i></div>
                            View Map
                        </a>
                        <a class="nav-link" href="<?= base_url('Home/basemap') ?>">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-briefcase"></i></div>
                            Base Map
                        </a>
                        <a class="nav-link" href="<?= base_url('Home/marker') ?>">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-marker"></i></div>
                            Marker
                        </a>
                        <a class="nav-link" href="<?= base_url('Home/circle') ?>">
                            <div class="sb-nav-link-icon"><i class="fas fa-circle"></i></div>
                            Circle
                        </a>
                        <a class="nav-link" href="<?= base_url('Home/polyline') ?>">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-earth-oceania"></i></div>
                            Polyline
                        </a>
                        <a class="nav-link" href="<?= base_url('Home/polygon') ?>">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-draw-polygon"></i></div>
                            Polygon
                        </a>
                        <a class="nav-link" href="<?= base_url('Home/geojson') ?>">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-person-military-to-person"></i></div>
                            GeoJSON
                        </a>
                        <a class="nav-link" href="<?= base_url('Home/getcoordinat') ?>">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-thumbtack"></i></div>
                            Get Coordinat
                        </a>
                        <a class="nav-link" href="<?= base_url('Home/getcoordinat2') ?>">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-map-pin"></i></div>
                            Get Radius
                        </a>
                        <a class="nav-link" href="<?= base_url('Home/geolocation') ?>">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-location-dot"></i></div>
                            Geo Location
                        </a>
                        <a class="nav-link" href="<?= base_url('Home/rute') ?>">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-route"></i></div>
                            Rute
                        </a>
                        <a class="nav-link" href="<?= base_url('Home/rute2') ?>">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-road"></i></div>
                            Rute Dari Lokasi User
                        </a>

                        <div class="sb-sidenav-menu-heading">Dengan Database</div>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-map-location-dot"></i></div>
                                Lokasi
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="<?= base_url('Lokasi/inputLokasi') ?>"><i class="fa-solid fa-location-pin-lock"></i> Input Lokasi</a>
                                    <a class="nav-link" href="<?= base_url('Lokasi/index') ?>"><i class="fa-solid fa-database"></i> Data Lokasi</a>
                                    <a class="nav-link" href="<?= base_url('Lokasi/pemetaanLokasi') ?>"><i class="fa-solid fa-layer-group"></i> Pemetaan Lokasi</a>
                                </nav>
                            </div>

                        <a class="nav-link" href="tables.html">
                            <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                            Tables
                        </a>
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Logged in as:</div>
                    Start Bootstrap
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4"><?= $judul ?></h1>
                    <hr>
                    <?php if ($page) {
                        echo view($page);
                    } ?>
                </div>
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Your Website 2023</div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
   
</body>

</html>