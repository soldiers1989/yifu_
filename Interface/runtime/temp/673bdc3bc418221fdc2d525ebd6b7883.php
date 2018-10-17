<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:90:"C:\wamp64\www\yifu\Interface\public/../application/index\view\register_apply\register.html";i:1539338958;}*/ ?>
<!DOCTYPE html>
<html>

	<head>
		<meta charset="UTF-8">
		<title>逸富开户</title>
		<link rel="stylesheet" type="text/css" href="../css/k1.css">
		<link rel="stylesheet" type="text/css" href="../css/ft.css">
		<style>
			.active a {
				border-bottom: solid 3px #333;
				padding-bottom: 10px;
				color: #702328
			}
			
			.khform input {
				width: 400px;
				display: block;
				border: 1px solid #bebbbb;
				border-radius: 4px;
				padding: 16px 0px 16px 46px;
				float: left;
				background: url(../img/icoo.png) no-repeat 6px 11px;
			}
			
			.Validform_checktip {
				margin-left: 10px;
				line-height: 38px;
				height: 38px;
				overflow: hidden;
				color: #999;
				font-size: 12px;
				float: left;
			}
			
			.lab11 {
				margin-right: 10px;
				display: inline-block;
			}
			
			label {
				cursor: default;
			}
			
			#zdykd {
				width: 16px;
				height: 30px;
				float: none;
				display: inline-block;
				vertical-align: middle;
				margin-top: -2px;
				margin-bottom: 1px;
			}
			
			#tjbtn {
				float: none;
				padding: 12px 46px 12px 46px;
				width: 420px;
				margin: 0 auto;
				clear: both;
				background: #ad9b68;
				color: #fff;
				border: none !important;
				cursor: pointer;
				font-size: 16px;
				transition: all 0.3s;
				margin-top: 10px;
			}
		</style>
	</head>

	<body>
		<div class="tjtop">
			<div class="tjtop-bao">
				<div class="tjtop-text">
					<ul id="menu">
						<li class="" style="width: 104px;height: 60px;"></li>
						<li class="active">
							<a href="">在线开户</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<div class="acc-mix-w">
			<h2><i></i>在线开通账户</h2>
			<div class="acc-mix-box">
				<div class="form-box">
					<div class="khform">
						<form id="drive_form" class="registerform" method="post" name="drive_form" action="http://cn.ltdchaxun.com/Home/Index/kaihu">
							<input type="text" name="name" id="name" placeholder="请填写真实姓名" datatype="mz" errormsg="请填写您证件上的真实姓名！">
							<div class="Validform_checktip">请填写您证件上的真实姓名！</div>
							<input type="number" name="phone" id="phone" class="bkxg2" placeholder="填写您的手机号码" datatype="m" errormsg="手机号不正确，请修改">
							<div class="Validform_checktip">填写常用手机号码</div>
							<input type="text" name="qq" id="qq" class="bkxg3" placeholder="填写您的QQ号码" datatype="qq" errormsg="QQ号码不正确，请修改">
							<div class="Validform_checktip">请填写常用QQ号码</div>
							<div style="clear:both"></div>
							<div id="formyzm">

							</div>开户类型：
							<label class="lab11">
							<input name="gContent"  id="zdykd" checked="checked" value="真实账户" type="radio">真实账户
						</label>
							<label>
						<input name="gContent" id="zdykd"  value="模拟账户" type="radio">模拟账户
					</label>
							<input type="button" value="提交注册" id="tjbtn">
						</form>
					</div>
				</div>
			</div>
		</div>
	</body>
	<script src="../js/jquery.min.js" type="text/javascript" charset="utf-8"></script>
	<script type="text/javascript">
		$("#tjbtn").click(function() {
			var tel = $("#phone").val();
			var name = $("#name").val();
			var qq = $("#qq").val();
			if(tel == '' || name == '' || qq == '') {
				alert("请将信息填写完整,才能提交哦!");
				return false;
			}
			if(!$("#name").val().match(/^([\u4e00-\u9fa5]){2,7}$/)) {
				alert("请您输入正确的姓名,谢谢!");
				$("#name").focus();
				return false;
			}
			if($("#qq").val().match(/^([\u4e00-\u9fa5]){2,7}$/)){
				alert("QQ格式不正确");
				$("#qq").focus();
				return false;
			}
			if(!$("#phone").val().match(/^1[3-8]\d{9}$/)) {
				alert('请输入有效的手机号码！');
				$("#phone").focus();
				return false;
			} else {
				//$("input[name='gContent']:checked").val() 获取radio标签选中的数值
				$.ajax({
					type: "post", //请求方式
					url: "post_register_apply", //请求地址
					dataType: "json", //返回的数据格式,若为text，则返回的数据为文本格式
					data: {
						name: name,
						qq: qq,
						phone: tel,
						gContent: $("input[name='gContent']:checked").val()
					},
					success: function(result) { //如果发送成功
						alert(result['data']['register_apply_name'] + result['msg'] + "，" + "我们会尽快处理！");
						location.reload();
						return true;
					},
					error: function() {
						alert("提交失败");
					},
					//是否异步请求
					async: true,
				})
			}
		})
	</script>

</html>