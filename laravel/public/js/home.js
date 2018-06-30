//$(function(){
$(document).ready(function(){
	$(".grouptype").on("click", function(){
		debugger;
		var id=$(this).data("id");
		if (id == 1) {
			window.location.href = "/login";
		}else{
			window.location.href = "/register";
		}
		
	});

	$("#nextPhoto").on("click", function(){			
		var keepGoing= true;
		$("#applicationForm").find("input:file").each(function(index){			
			var file=this.files[0];
			if (file ==null || file.size == 0 ) {
				$(this).closest(".mb-3").css('border', "1px solid red");
				keepGoing=false;
			}else{
				$(this).closest(".mb-3").find("label").text(file.name)
			}		
		});
		if (keepGoing) {
			$("#applicationDetails").removeClass("d-none").show();
			$("#applicationPictures").hide();
		}
				
	});

	$("#appBack").on("click", function(){				
		$("#applicationDetails").hide();
		$("#applicationPictures").show();
	});

	$("#sendWarning").on("click", function(event){			
		debugger;	
		var isValid = $('#applicationForm')[0].checkValidity();
		if (!isValid) {
			$("#SendForm").click();
			event.stopPropagation();
		}
	});

	$("#btAccept").on("click",function(){
		$("#applicationForm").submit();
	});


	$(".approveRequest").on("click", function(){		
		var id=$(this).closest("tr").data("id");
		if (id >= 1) {
			$.ajax({
		      type: "get",
		      url: '/dashboard/' + id,
		      success: function(result) {
		        location.reload();
		      }
		    });
		}
	});

	$("#pathAfter, #pathBefore").on("change", function(){
		var msg = "Choose file";
		if ($(this)[0].value != "" ) {
			msg=$(this)[0].value;
		}
		$(this).closest("div").find("label").text(msg);
	});
});