// Set dropdown menu content in xs screen
$(function setDropdownMenu() {
	var pills = $("#pills a");
	for(var i = 0; i < pills.length; i++) {
		var li = document.createElement("li");
		li.id = "dropdown-pill" + i;
		li.appendChild(document.createTextNode(pills[i].text));
		var ul = document.getElementsByClassName("dropdown-menu")[0];
		ul.appendChild(li);
	}
})
// Set onclick on xs dropdown button
$(function() {
	$("#dropdown-pill" + 0).click(function() {
		changeDropdownText(0);
	});
	$("#dropdown-pill" + 1).click(function() {
		changeDropdownText(1);
	});
	$("#dropdown-pill" + 2).click(function() {
		changeDropdownText(2);
	});
	$("#dropdown-pill" + 3).click(function() {
		changeDropdownText(3);
	});
	$("#dropdown-pill" + 4).click(function() {
		changeDropdownText(4);
	});
})
// Set change pill func on xs screen
function changeDropdownText(index) {
	$("#pills-xs-dropdown").html($("#dropdown-pill" + index).text() + '<span class="caret"></span>');
	var map = {0 : "all_comments", 1 : "not_certified", 2 : "pass_comments",
	 3 : "fail_comments", 4 : "letter"};
	$('.nav-pills a[href="#' + map[index] + '"]').tab('show');
}