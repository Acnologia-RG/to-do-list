$("input:checkbox").on("change", function () {
var id = this.id;
var status = this.checked;

console.log(id);
console.log(status);
	$.ajax({
		url: "yourList/update",
		type: "POST",
		data: {
			id: id,
			status: status
		},
		// success: function () {
		// 	console.log("it works")
		// }
	});
});