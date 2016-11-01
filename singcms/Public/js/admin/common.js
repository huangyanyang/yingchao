$('#button-add').click(function() {
	window.location.href = SCOPE.add_url;
});
$("#singcms-button-submit").click(function() {
	var data = $("#singcms-form").serializeArray();
	postData = {};
	$(data).each(function(i) {
		postData[this.name] = this.value;
	});
	$.post(SCOPE.save_url, postData, function(result) {
		if (result.status == 0) {
			return dialog.error(result.message);

		} else if (result.status == 1) {
			return dialog.success(result.message, SCOPE.jump_url);
		}
	}, 'JSON');
});
// 编辑菜单
$(".singcms-table #singcms-edit").on('click', function() {
	var menu_id = $(this).attr('attr-id');
	window.location.href = SCOPE.edit_url + '&menu_id=' + menu_id;
});
// 删除操作
function setStatus() {
	var menu_id = $(".singcms-table #singcms-delete").attr('attr-id');
	layer.confirm('确定要删除吗？', {
		btn: ['十分确定', '哦，点错了'] //按钮
	}, function() {
		$.post(SCOPE.set_status_url, {
			'menu_id': menu_id
		}, function(data) {
			layer.msg(data.message, {
				icon: data.status
			}, function() {
				window.location.href = '/singcms/admin.php?c=menu';
			});
		}, 'JSON');

	});
}
// 排序操作
$("#button-listorder").click(function() {
	var data = $("#singcms-listorder").serializeArray();
	console.log(data);
	postData = {};
	$(data).each(function(i) {
		postData[this.name] = this.value;
	});
	console.log(postData);
	$.post(SCOPE.listorder_url, postData, function(result) {
		if (result.status == 0) {
			return dialog.error(result.message);

		} else if (result.status == 1) {
			return dialog.success(result.message,result.data.jumpUrl);
		}
	}, 'JSON');
});