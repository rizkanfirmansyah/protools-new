function start_table(){
    let title, html = ''
    title = `<h3 class="text-muted box-title mb-3">Point Timeline</h3>`
    html = `
        <div class="table-responsive">
            <table class="table table-hover" id="datatable">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Point Name</th>
                        <th>Updated</th>
                        <th>Create By</th>
                        <th>Updated By</th>
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
}


function start_datatable(){
    $('#datatable').DataTable({
        processing: false,
        serverSide: true,
        order: [
            [0, 'asc']
        ],
        ajax: {
            url:baseurl + 'datatable/table/point_timeline',
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
                data: 'point_name',
                orderable: true,
                className: 'text-left'
            },
            {
                data: 'updated',
                orderable: true,
                className: 'text-left'
            },
            {
                data: 'create_by',
                orderable: false,
                className: 'text-left'
            },
            {
                data: 'update_by',
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
    start_table()
    start_datatable()

    $('#datatable').on('click', '#checkPoint', function(){
        let id = $(this).data('id')
        let status = $(this).data('status')
        $.ajax({
            url : baseurl + 'point/check',
            type:'POST',
            data:{
                id:id,
                status:status,
            }
            ,success:function(res){
                refresh_table('#datatable')
            },
            error:function(err){
                show_error(err)
            }
        })
    })

    
    $('#datatable').on('click', '#deletePoint', function () {
        $.ajax({
            url:baseurl + 'point/delete',
            type:'POST',
            data:{
                id:$(this).data('id')
            },
            success:function(res){
                refresh_table('#datatable')
            },
            error:function(err){
                show_error(err)
            }
        })
    })

    $('#btnCreate').on('click', function(){
        $('#createPoint').modal('show')
    })

    $('#savepoint').on('click', function(){
        let id = $('#idPoint').val()
        let point = $('#pointName').val()

        $.ajax({
            url:baseurl + 'point/insert',
            type:'POST',
            data:{
                id:id,
                point:point,
            },
            success:function(res){
                refresh_table('#datatable')
            },
            error:function(err){
                show_error(err)
            }
        })
    })

})