    function start_project(parm = 'all'){
        $('#datatable').DataTable({
        processing: false,
        serverSide: true,
        order: [
            [0, 'asc']
        ],
        ajax: {
            url:baseurl + 'datatable/table/project',
            type: 'POST',
            dataType: 'JSON',
            data:{
                parm : parm,
            }
        },
        columns: [
            {
                data: 'thumbnail',
                orderable: false,
                className: 'text-left'
            },
            {
                data: 'title',
                orderable: false,
                className: 'text-left'
            },
            {
                data: 'progress',
                orderable: false,
                className: 'text-left'
            },
            {
                data: 'pic',
                orderable: false,
                className: 'text-left'
            },
            {
                data: 'participant',
                orderable: false,
                className: 'text-left'
            },
            {
                data: 'deadline',
                orderable: false,
                className: 'text-right'
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

    function project_modal(){
        parm =1;
        $('#projectTable').DataTable({
            processing: false,
            serverSide: true,
            order: [
                [0, 'asc']
            ],
            ajax: {
                url:baseurl + 'datatable/table/takeproject',
                type: 'POST',
                dataType: 'JSON',
                data:{
                    parm : parm,
                }
            },
            columns: [
                {
                    data: 'title',
                    orderable: false,
                    className: 'text-left'
                },
                {
                    data: 'pic',
                    orderable: false,
                    className: 'text-left'
                },
                {
                    data: 'participant',
                    orderable: false,
                    className: 'text-left'
                },
                {
                    data: 'progress',
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

$(document).ready(function() {
        start_project()

        $('#datatable').on('click', '#outProject', function () {
            var answer = confirm('Apakah anda yakin ingin keluar?')

            if (answer) {
                $.ajax({
                    url:baseurl + 'out/project',
                    type:'POST',
                    data:{
                        id:$(this).data('id')
                    },
                    success:function(res){
                        refresh_table('#datatable')
                    },
                    error:function(err) {
                        show_error(err)
                    }
                })
            }
        })

        $('#datatable').on('click', '#timelineProject', function(){
            var id = $(this).data('id');
            let res = generate();
            $.ajax({
                url : baseurl + 'set/access/project',
                type:'POST',
                data:{
                    secret:res,
                    id:id
                },
                success:function(res){
                    let data = JSON.parse(res)
                    document.location.href = baseurl + `id/timeline?codename=${data}&id=${id}`;
                },
                error:function(err){
                    show_error(err);
                }
            })
        })

        $('#btnCreate').on('click', function(){
            $('#takeProject').modal('show')
            setTimeout(() => {
                $('#modalHide').show();
                $('#gifHide').hide();
                project_modal()
            }, 1200);
        })
        
        $('#takeProject').on('click', '#takeThisProject', function(){
            let id = $(this).data('id')
            $('#modalHide').hide();
            $('#gifHide').show();
            setTimeout(() => {
                take_project('participant', id)
            }, 1000);
        })
    })
    

    function take_project(pos, id){
        $.ajax({
            url : baseurl + 'join/project',
            type:'POST',
            data:{
                post : pos,
                id:id
            },
            success:function(res){
                refresh_table('#projectTable')
                refresh_table('#datatable')
                $('#modalHide').show();
                $('#gifHide').hide();
            },
            error:function(err){
                show_error(err)
            }
        })
    }