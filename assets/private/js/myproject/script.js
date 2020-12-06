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
})