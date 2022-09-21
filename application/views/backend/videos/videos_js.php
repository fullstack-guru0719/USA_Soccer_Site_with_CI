<script type="text/javascript">
    $(document).ready(function(){
        $('.items').DataTable({
			"responsive": true,
			"processing": true,
			"serverSide": true,
			"ajax": {
				url : "<?php echo site_url("backend/latest_videos/ajax_get_videos");?>",
				type: "post",
				data:{'<?php echo $this->security->get_csrf_token_name(); ?>':'<?php echo $this->security->get_csrf_hash(); ?>'},
				complete: function ( json ) {
				}
			},
			"columns": [
					{ "data": "id",visible:false },
					{ "data": "title",render : function (data, type, row){
							return data;
						} 
					},
					{ "data": "link_type" },
					{ "data": "status", render : function (data, type, row){
						if(data == 'active'){
							return '<label class="badge badge-success">' + data + '</label>';
						}else{
							return '<label class="badge badge-danger">' + data + '</label>';
						}
					}},
                    { "data": "created_at" },
                    { "data": "created_at",render : function (data, type, row){
							var html = '';
							html +=	"<a href='latest_videos/add_video/"+row.id+"' class='btn small btn-sm btn-success'><i class='fa fa-edit'></i></a>";
							html += "&nbsp;<a href='latest_videos/delete_video/"+row.id+"' class='btn btn-sm btn-danger'> <i class='fa fa-trash'></i></a>";
							
							if(row.status == 'active'){
								html += "&nbsp;<a href='latest_videos/change_status/"+row.id+"/inactive' class='btn btn-sm btn-secondary'> <i class='far fa-thumbs-down'></i></a>";
							}else if(row.status == 'inactive'){
								html += "&nbsp;<a href='latest_videos/change_status/"+row.id+"/active' class='btn btn-sm btn-secondary'> <i class='far fa-thumbs-up'></i></a>";
							}
							return html;
						} 
					},
				  ],
			'columnDefs': [{
				 'targets': 4,
				 'searchable': false,
				 'orderable': true,
			  }
			],
			order: [[ 0, 'desc' ]]
		});
    })
	if($('#my-player').length > 0)
	{
		var player = videojs('my-player');
	}
</script>