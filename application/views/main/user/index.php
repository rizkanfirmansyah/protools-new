   <li class="nav-item">
       <a href="#" class="nav-link icon-link" id="createUser">
           <i class="mdi mdi-account-plus-outline"></i>
       </a>
   </li>
   <li class="nav-item dropdown">
       <a href="#" class="nav-link icon-link dropdown-toggle" data-toggle="dropdown" id="typeRoleDropdown">
           <i class="mdi mdi-account-multiple-outline"></i>
       </a>
       <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="typeRoleDropdown" id="roleType">
       </div>
   </li>
   <li class="nav-item">
       <a href="#" class="nav-link icon-link">
           <i class="mdi mdi-clock-outline"></i>
       </a>
   </li>
   </ul>
   </div>
   </nav>
   <!-- partial -->
   <div class="main-panel">
       <div class="content-wrapper">
           <div class="row">
               <div class="col-lg-12 grid-margin stretch-card">
                   <div class="card">
                       <div class="card-body">
                           <h3 class="card-title text-uppercase" id="typeRoleName">all</h3>
                           <div class="table-responsive">
                               <table class="table table-striped" id="datatable">
                                   <thead>
                                       <tr>
                                           <th class="border-top-0">No.</th>
                                           <th class="border-top-0">Username</th>
                                           <th class="border-top-0">Email</th>
                                           <th class="border-top-0">Image</th>
                                           <th class="border-top-0">Role</th>
                                           <th class="border-top-0">Status</th>
                                           <th class="border-top-0">Created</th>
                                           <th class="border-top-0">Updated</th>
                                           <th class="border-top-0">Action</th>
                                       </tr>
                                   </thead>
                                   <tbody></tbody>

                               </table>
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
       <!-- row end -->
   </div>


   <?php $this->load->view('main/user/additional/modal'); ?>