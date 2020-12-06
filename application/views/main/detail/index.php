<!-- ID -->
<span id="idProjectGoal" data-id="<?= $project->id ?>"></span>

<li class="nav-item">
    <a href="#" class="nav-link icon-link" onclick="joinProject('<?= $project->id ?>', 'pic')" data-toggle="tooltip" title="" data-original-title="Join to project <?= $project->title ?> as PIC">
        <i class="mdi mdi-account-outline"></i>
    </a>
</li>
<li class="nav-item">
    <a href="#" class="nav-link icon-link" onclick="joinProject('<?= $project->id ?>', 'participant')" data-toggle="tooltip" title="" data-original-title="Join to project <?= $project->title ?>">
        <i class="mdi mdi-account-multiple-outline"></i>
    </a>
</li>
<li class="nav-item ">
    <a href="#" class="nav-link icon-link" onclick="editProject('<?= $project->id ?>')">
        <i class="mdi mdi-table-edit"></i>
    </a>
</li>
<li class="nav-item ">
    <a href="#" class="nav-link icon-link" onclick="deleteProject('<?= $project->id ?>')">
        <i class="mdi mdi-comment-remove-outline"></i>
    </a>
</li>
</ul>
</div>
</nav>

<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card p-3">
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col text-left">
                                <h2 class="card-title"><?= $project->title ?> <?= check_type($project->type) ?></h2>
                                <h6 class="card-subtitle"><?= date('d-M-Y', strtotime($project->deadline)) ?></h6>
                            </div>
                            <div class="col text-right">
                                <h3><?= $project->client_company ?></h3>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 pl-4 col-md-6 col-sm-6">
                                <img src="<?= base_url('assets/private/img/' . check_image($project->thumbnail)) ?>" class="img-fluid">
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <h3 class="box-title mt-5">Product description</h3>
                                <p><?= $project->description ?></p>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <h3 class="box-title mt-2">Key Highlights</h3>
                                        <ul class="list-unstyled">
                                            <?php foreach ($key as $k) : ?>
                                                <li data-toggle="tooltip" data-html="true" id="detailPoint<?= $k->idp ?>" title="<?= coba_res($k->idp) ?>"><i class="<?= status_icon($k->status) ?> pointProject"></i> <?= $k->point ?></li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </div>
                                    <div class="col-sm-6">
                                        <h3 class="box-title mt-2">Team mate</h3>
                                        <div id="cardParticipant">
                                            <span class="text-muted">Team Not Found </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <h3 class="box-title mt-5">General Info</h3>
                                <div class="table-responsive">
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <td>Company Name</td>
                                                <td> <?= $project->client_company ?> </td>
                                            </tr>
                                            <tr>
                                                <td>Client Name</td>
                                                <td> <?= $project->client_name ?> </td>
                                            </tr>
                                            <tr>
                                                <td>Create At</td>
                                                <td> <?= date('d-M-Y', strtotime($project->create_at)) ?> </td>
                                            </tr>
                                            <tr>
                                                <td>Deadline</td>
                                                <td> <?= date('d-M-Y', strtotime($project->deadline)) ?> </td>
                                            </tr>
                                            <tr>
                                                <td>Create By</td>
                                                <td> <?= $project->create_by ?> </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <h3 class="box-title mt-5">Rules</h3>
                                <?php if ($project->rules == 1) : ?>
                                    <div class="table-responsive">
                                        <table class="table" id="TableRules">
                                            <tbody>
                                                <?php foreach ($rules as $r) : ?>
                                                    <tr>
                                                        <td><?= $r->param ?></td>
                                                        <td><?= $r->value ?></td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                <?php else : ?>
                                    <h3 class="text-muted text-center">Rules nothing</h3>
                                <?php endif; ?>
                            </div>
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
    <!-- row end -->z
    <?php $this->load->view('main/detail/additional/modal'); ?>