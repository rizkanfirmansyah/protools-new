<!-- PROJECT -->

<!-- Modal -->
<div class="modal fade" id="createTimeline" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="createTimelineLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createTimelineLabel">Create a New Timeline</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="bodyModal">
                <form>
                    <div class="form-group">
                        <label for="pointName">Point Name</label>
                        <input type="text" class="form-control" id="pointName" placeholder="Make a Website" required>
                    </div>
                    <div class="form-group">
                        <label for="pointDescription">Point Description</label>
                        <textarea class="form-control" id="pointDescription" rows="3" required></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" id="savepoint" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>