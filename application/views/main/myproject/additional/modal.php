<!-- PROJECT -->

<!-- Modal -->
<div class="modal fade" id="takeProject" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="takeProjectLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="takeProjectLabel">Take a Project</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                </div>

                <div class="row mx-auto justify-content-center" id="joinProject">
                    <img src="<?= base_url('/') ?>assets/private/img/loader_timeline.gif" id="gifHide" style="width:100px;">
                    <div class="table-responsive" id="modalHide" style="display: none;">
                        <!-- <h3 class="text-muted text-uppercase mx-auto text-center">Project</h3> -->
                        <table class="table table-hover" id="projectTable">
                            <thead>
                                <tr>
                                    <th>Project</th>
                                    <th>PIC</th>
                                    <th>Participant</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<!-- END PROJECT -->