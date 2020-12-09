<link rel="stylesheet" href="<?= base_url('assets/private/css/timeline/') ?>style.css">
<!-- <div class="page-wrapper"> -->
<li class="nav-item">
    <a href="#" class="nav-link icon-link mt-1 text-primary" id="btnCreate">
        <i class="mdi mdi-plus-box"></i>
    </a>
</li>
<li class="nav-item dropdown">
    <a href="#" class="nav-link icon-link dropdown-toggle" data-toggle="dropdown" id="dropdownMenuButton">
        <i class="mdi mdi-menu"></i>
    </a>
    <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="dropdownMenuButton">
        <a class="dropdown-item timeline-e">Table</a>
        <a class="dropdown-item timeline-e">Timeline</a>
    </div>
</li>
</ul>
</div>
</nav>

<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card p-3">
                    <div class="col-md-12">
                        <p id="haha">
                            <small>haha</small>
                        </p>
                        <h3 class="box-title mb-3">Timeline</h3>
                        <div class="white-box" id="bodyTimeline">

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-xl-6 grid-margin stretch-card">
                <div class="row w-100 flex-grow">
                    <div class="col-md-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <p class="card-title">Website Audience Metrics</p>
                                <p class="text-muted">25% more traffic than previous week</p>
                                <div class="row mb-3">
                                    <div class="col-md-7">
                                        <div class="d-flex justify-content-between traffic-status">
                                            <div class="item">
                                                <p class="mb-">Users</p>
                                                <h5 class="font-weight-bold mb-0">93,956</h5>
                                                <div class="color-border"></div>
                                            </div>
                                            <div class="item">
                                                <p class="mb-">Bounce Rate</p>
                                                <h5 class="font-weight-bold mb-0">58,605</h5>
                                                <div class="color-border"></div>
                                            </div>
                                            <div class="item">
                                                <p class="mb-">Page Views</p>
                                                <h5 class="font-weight-bold mb-0">78,254</h5>
                                                <div class="color-border"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <ul class="nav nav-pills nav-pills-custom justify-content-md-end" id="pills-tab-custom" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" id="pills-home-tab-custom" data-toggle="pill" href="#pills-health" role="tab" aria-controls="pills-home" aria-selected="true">
                                                    Day
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="pills-profile-tab-custom" data-toggle="pill" href="#pills-career" role="tab" aria-controls="pills-profile" aria-selected="false">
                                                    Week
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="pills-contact-tab-custom" data-toggle="pill" href="#pills-music" role="tab" aria-controls="pills-contact" aria-selected="false">
                                                    Month
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <canvas id="audience-chart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-xl-6 grid-margin stretch-card">
                <div class="row w-100 flex-grow">
                    <div class="col-md-6 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <p class="card-title">Regional Load</p>
                                <p class="text-muted">Last update: 2 Hours ago</p>
                                <div class="regional-chart-legend d-flex align-items-center flex-wrap mb-1" id="regional-chart-legend"></div>
                                <canvas height="280" id="regional-chart"></canvas>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>