<script type="text/javascript">
    $(document).ready(function(){
        $('.items').DataTable({
			"responsive": true,
			"processing": true,
			"serverSide": true,
			"ajax": {
				url : "<?php echo site_url("backend/sponsors/ajax_get_sponsors");?>",
				type: "post",
				data:{'<?php echo $this->security->get_csrf_token_name(); ?>':'<?php echo $this->security->get_csrf_hash(); ?>'},
				complete: function ( json ) {
				}
			},
			"columns": [
					{ "data": "id",visible:false },
					{ "data": "name",render : function (data, type, row){
							var html = '';
							if(row.logo){
								html += '<img src="<?php echo site_url('uploads/');?>'+row.logo+'" width="100"/><br/>';
							}
							html +=	data;
							return html;
						} 
					},
					{ "data": "business_name" },
					{ "data": "email" },
					{ "data": "sponsorship_type" },
					
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
							html +=	"<a href='sponsors/add_sponsor/"+row.id+"' class='btn small btn-sm btn-success'><i class='fa fa-edit'></i></a>";
							html += "&nbsp;<a href='sponsors/delete_sponsor/"+row.id+"' class='btn btn-sm btn-danger'> <i class='fa fa-trash'></i></a>";
							
							if(row.status == 'active'){
								html += "&nbsp;<a href='sponsors/change_status/"+row.id+"/inactive' class='btn btn-sm btn-secondary'> <i class='far fa-thumbs-down'></i></a>";
							}else if(row.status == 'inactive'){
								html += "&nbsp;<a href='sponsors/change_status/"+row.id+"/active' class='btn btn-sm btn-secondary'> <i class='far fa-thumbs-up'></i></a>";
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
</script>