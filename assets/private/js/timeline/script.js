function timeline(id){
    let data = ' '
    if(id.toLowerCase() == 'table'){
        data = `
        <div class="table-responsive">
        <table class="table table-hover" id="datatable">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Point</th>
                    <th>Description</th>
                    <th>Updated</th>
                    <th>Create By</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                
                
            </tbody>
        </table>
    </div>
        `
    }else{
        $.ajax({
            url:baseurl + 'api/gettimeline',
            type: 'POST',
            dataType: 'JSON',
            data:{
                parm : 1,
            },
            success:function(res){
                console.log(res);
                data = `
                <h5 class="card-title">User Timeline</h5>
                        <div class="vertical-timeline vertical-timeline--animate vertical-timeline--one-column">
                            
                            <div class="vertical-timeline-item vertical-timeline-element">
                                <div> <span class="vertical-timeline-element-icon bounce-in"> <i class="badge badge-dot badge-dot-xl badge-success"> </i> </span>
                                    <div class="vertical-timeline-element-content bounce-in">
                                        <h4 class="timeline-title">Purchase new hosting plan</h4>
                                        <p>Purchase new hosting plan as discussed with development team, today at <a href="javascript:void(0);" data-abc="true">10:00 AM</a></p> <span class="vertical-timeline-element-date">10:30 PM</span>
                                        <a class="badge badge-dark text-white" style="cursor:pointer"><i class="mdi mdi-arrow-down-drop-circle"></i></a>
                                        <div id="additionalTimeline" style="display:none;">
                                            <hr>
                                            <p> hehe</p>
                                            <a class="badge badge-dark text-white" style="cursor:pointer"><i class="mdi mdi-arrow-up-drop-circle"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="vertical-timeline-item vertical-timeline-element">
                                <div> <span class="vertical-timeline-element-icon bounce-in"> <i class="badge badge-dot badge-dot-xl badge-warning"> </i> </span>
                                    <div class="vertical-timeline-element-content bounce-in">
                                        <p>Another conference call today, at <b class="text-danger">11:00 AM</b></p>
                                        <p>Yet another one, at <span class="text-success">1:00 PM</span></p> <span class="vertical-timeline-element-date">12:25 PM</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                `
            }
        })
    }
    $('#bodyTimeline').html(data)
    start_table()
}

function start_table(){
    $('#datatable').DataTable({
        processing: false,
        serverSide: true,
        order: [
            [0, 'asc']
        ],
        ajax: {
            url:baseurl + 'datatable/table/point_project',
            type: 'POST',
            dataType: 'JSON',
            data:{
                parm : 1,
            }
        },
        columns: [
            {
                data: 'id',
                orderable: false,
                className: 'text-left'
            },
            {
                data: 'point',
                orderable: true,
                className: 'text-left'
            },
            {
                data: 'description',
                orderable: true,
                className: 'text-left'
            },
            {
                data: 'updated',
                orderable: false,
                className: 'text-left'
            },
            {
                data: 'create_by',
                orderable: false,
                className: 'text-left'
            },
            {
                data: 'status',
                orderable: false,
                className: 'text-left'
            },
            {
                data: 'button',
                orderable: false,
                className: 'text-right'
            },
        ],
        "bDestroy": true,
        
    })
}

$(document).ready(function(){
    timeline('table')
    start_table()
    $('#datatable').DataTable();

    $('.timeline-e').on('click', function(){
        let element = $(this).text()
        timeline(element)
    })

    $('#datatable').on('dblclick', '.statusTimeline', function(){
        let id = $(this).data('id')
        $(this).hide()
        $('#point'+id).show()
    })
    
    $('#datatable').on('dblclick', '.statusPresentase', function(){
        let id = $(this).data('id')
        $('#timeline'+id).show()
        $(this  ).hide()
    })
})