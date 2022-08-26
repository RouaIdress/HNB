$(function() {
	$(".quiz").click(function () {
		$(".quiz_1 p").show("slow");
	});
	$(".projects").click(function () {
		$(".projects_1 p").show("slow");
	});
	$(".lectures").click(function () {
		$(".lectures_1 p").show("slow");
	});
	$(".do").click(function () {
		$(".do_1 p").show("slow");
	});
	$(".budget").click(function () {
		$(".budget_1 p").show("slow");
	});
	$(".work").click(function () {
		$(".work_1 p").show("slow");
	});
	$(".quiz_1 p").dblclick(function () {
		$(this).hide();
	});
	$(".projects_1 p").dblclick(function () {
		$(this).hide();
	});
	$(".lectures_1 p").dblclick(function () {
		$(this).hide();
	});
	$(".budget_1 p").dblclick(function () {
		$(this).hide();
	});
	$(".do_1 p").dblclick(function () {
		$(this).hide();
	});
		$(".work_1 p").click(function () {
		$(this).hide();
	});
		$(".note").dblclick(function () {
		 $(this).hide();
	});
	$(".alert1").click(function () {
		alert("Welcome to our website :)");
	});
	$(".alert2").click(function () {
		alert("Your password will be saved automatically ");
	});
	$(".alert3").click(function () {
		alert("Note Added Successfully");
	});

});