function timeline(id){
    let title = '<h5 class="card-title">User Timeline</h5>'
    let html = ''
    if(id.toLowerCase() != 'timeline'){
        html = `
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
    $('#bodyTimeline').html(title + html)
    }else{
        $.ajax({
            url:baseurl + 'api/gettimeline',
            type: 'POST',
            dataType: 'JSON',
            data:{
                parm : 1,
            },
            success:function(response){
                let btn = ''
                response.forEach(res => {
                    if (res.subpoint != 0) {
                        btn = `<a class="badge badge-dark text-white subpointBtnDown" id="subpointBtnDown${res.point_id}" data-id="${res.point_id}" style="cursor:pointer"><i class="mdi mdi-arrow-down-drop-circle"></i></a>
                        <div id="additionalTimeline${res.point_id}" style="display:none;">
                            <img src="${baseurl}assets/private/img/loader_timeline.gif" id="imgLoader" style="width:50px;">
                        </div>
                        `
                    }else{
                        btn = ''
                    }
                    html += `
                    <div class="vertical-timeline vertical-timeline--animate vertical-timeline--one-column">
                        <div class="vertical-timeline-item vertical-timeline-element">
                            <div> <span class="vertical-timeline-element-icon bounce-in"> <i class="badge badge-dot badge-dot-xl badge-${res.color}"> </i> </span>
                                 <div class="vertical-timeline-element-content bounce-in">
                                    <h4 class="timeline-title">${res.point}</h4>
                                    <p class="text-muted" style="margin-top:-5px;">${res.create_by} at ${res.create_at}</p>
                                    <p class="text-capitalize">${res.description} </p> <span class="vertical-timeline-element-date">${res.updated}</span>
                                    ${btn}
                                   
                            </div>
                        </div>
                    </div>
                    `
                    
                });
                // console.log(html);
                $('#bodyTimeline').html(title + html)
            }
        })
    }
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

    $('#bodyTimeline').on('click', '.subpointBtnDown', function() {
        let id = $(this).data('id')
        let html = ' '
        let btn = `
        <a class="badge badge-dark text-white subpointBtnUp" id="subpointBtnUp${id}" data-id="${id}" style="cursor:pointer"><i class="mdi mdi-arrow-up-drop-circle"></i></a>`
        $(`#additionalTimeline${id}`).show()
        $(this).hide()
        setTimeout(() => {
            $.ajax({
                url:baseurl+'api/timeline/point',
                type:'POST',
                data:{
                    id: id
                },
                success:function(response){
                    let res = JSON.parse(response)
                    let status = ''
                    res.forEach( data =>{
                        if(data.status == 0){
                            status = 'mdi mdi-comment-remove-outline text-danger'
                        }else{
                            status = 'mdi mdi-comment-check-outline text-success'
                        }
                        html += `<div class="row"> 
                        <div class="col-lg-1 mt-2" style="margin-right:-28px;"> <i class="${status} mdi-24px "></i></div> 
                        <div class="col-lg-10">
                             <p class="text-capitalize" style="margin-bottom:-5px;"> ${data.point_name} <br> <small class="text-muted">${data.create_by}</small><small class="text-muted"> | ${data.updated} | </small><small class="text-muted">updated by ${data.update_by}</small></p>
                            </div>
                        </div>    
                        <br>`
                    })
                    $(`#additionalTimeline${id}`).html('<hr>' + html + btn)
                },
                error:function(err){
                    show_error(err)
                }
            })
        }, 1500);
    })

    $('#bodyTimeline').on('click', '.subpointBtnUp', function() {
        let id = $(this).data('id')
        $(`#additionalTimeline${id}`).html(`<img src="${baseurl}assets/private/img/loader_timeline.gif" id="imgLoader" style="width:50px;">`)
        $(`#additionalTimeline${id}`).hide()
        $('#subpointBtnDown'+id).show()
        $(this).hide()
    })

    $('#btnCreate').on('click', function(){
        alert()
    })
})
