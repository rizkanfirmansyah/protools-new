<!-- CREATE USER -->

<!-- Modal -->
<div class="modal fade" id="createDataUser" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="createDataUserLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createDataUserLabel">Create a New User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <label for="username">Username</label>
                    <div class="input-group mb-2 mr-sm-2">
                        <input type="text" class="form-control" id="username" required>
                        <div class="input-group-prepend">
                            <a id="generateName" style="cursor: pointer;" class="btn btn-primary">Generate</a>
                        </div>
                    </div>
                    <label for="username">Password</label>
                    <div class="input-group mb-2 mr-sm-2">
                        <input type="password" class="form-control" id="password" required>
                        <div class="input-group-prepend">
                            <a id="generatePassword" style="cursor: pointer;" class="btn btn-primary"><i class="mdi mdi-account-key"></i></a>
                            <a id="seePassword" style="cursor: pointer;" class="btn btn-success text-white"><i class="mdi mdi-eye-off" id="iconicPassword"></i></a>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-8">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="roleId">Role</label>
                            <select id="roleId" class="form-control">
                                <option selected disabled value id="inputOption">Choose...</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" checked="" id="active">
                                Active
                                <i class="input-helper"></i></label>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" id="saveUser" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>




<!-- END CREATE USER -->

<!--  -->

<!-- EDIT USER -->

<!-- Modal -->
<div class="modal fade" id="editDataUser" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="editDataUserLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editDataUserLabel">Edit a New User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="modalBody">
                <form>
                    <label for="username">Username</label>
                    <div class="input-group mb-2 mr-sm-2">
                        <input type="text" class="form-control" id="editUsername" required disabled>
                    </div>
                    <label for="username">Password</label>
                    <div class="input-group mb-2 mr-sm-2">
                        <input type="password" class="form-control" id="editPassword" required disabled>
                        <div class="input-group-prepend">
                            <a id="enableEditPassword" style="cursor: pointer;" class="btn btn-secondary text-white"><i class="mdi mdi-tooltip-edit"></i></a>
                            <a id="saveEditPassword" style="cursor: pointer; display:none;" class="btn btn-warning text-white"><i class="mdi mdi-content-save"></i></a>
                            <a id="seeEditPassword" style="cursor: pointer; display:none;" class="btn btn-success text-white"><i id="editIconicPassword" class="mdi mdi-eye-off"></i></a>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-8">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="editEmail" disabled>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="roleId">Role</label>
                            <select id="editRoleId" class="form-control">
                                <option selected disabled value id="inputOption">Choose...</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" checked="" id="editActive">
                                Active
                                <i class="input-helper"></i></label>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" id="editUser" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>




<!-- END EDIT USER -->

<!--  -->