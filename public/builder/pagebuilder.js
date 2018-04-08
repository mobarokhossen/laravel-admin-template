$(function() { 
// Resize	
function resize(){
    $('.resize-height').height(window.innerHeight);
	$('.resize-width').width(window.innerWidth - 250);
	//if(window.innerWidth<=1150){$('.resize-width').css('overflow','auto');}
	
	}
$( window ).resize(function() {resize();});
resize();

	
	
 
//Add Sections
$("#page-builder-area-center-frame-buttons-add").hover(
  function() {
    $("#page-builder-area-center-frame-buttons-dropdown").fadeIn(200);
  }, function() {
    $("#page-builder-area-center-frame-buttons-dropdown").fadeOut(200);
  }
);

$("#page-builder-area-center-frame-buttons-dropdown").hover(
  function() {
    $(".page-builder-area-center-frame-buttons-content").fadeIn(200);
  }, function() {
    $(".page-builder-area-center-frame-buttons-content").fadeOut(200);
  }
);


$("#add-header").hover(function() {
    $(".page-builder-area-center-frame-buttons-content-tab[data-type='header']").show()
	$(".page-builder-area-center-frame-buttons-content-tab[data-type='content']").hide()
	$(".page-builder-area-center-frame-buttons-content-tab[data-type='footer']").hide()
  });
  
$("#add-content").hover(function() {
    $(".page-builder-area-center-frame-buttons-content-tab[data-type='header']").hide()
	$(".page-builder-area-center-frame-buttons-content-tab[data-type='content']").show()
	$(".page-builder-area-center-frame-buttons-content-tab[data-type='footer']").hide()
  });
  
$("#add-footer").hover(function() {
    $(".page-builder-area-center-frame-buttons-content-tab[data-type='header']").hide()
	$(".page-builder-area-center-frame-buttons-content-tab[data-type='content']").hide()
	$(".page-builder-area-center-frame-buttons-content-tab[data-type='footer']").show()
  });   
  
  
  
 $(".page-builder-area-center-frame-buttons-content-tab").hover(
  function() {
    $(this).append('<div class="page-builder-area-center-frame-buttons-content-tab-add"><i class="fa fa-plus"></i>&nbsp;Insert</div>');
	$('.page-builder-area-center-frame-buttons-content-tab-add').click(function() {

	$("#page-builder-area-center-frame-content").prepend($("#page-preloaded-rows .padma-row[data-id='"+$(this).parent().attr("data-id")+"']").clone());
	hover_edit();
	perform_delete();
	$("#page-builder-area-center-frame-buttons-dropdown").fadeOut(200);
		})
  }, function() {
    $(this).children(".page-builder-area-center-frame-buttons-content-tab-add").remove();
  }
); 
  
  
//Edit
function hover_edit(){


$(".padma-row-edit").hover(
  function() {
    $(this).append('<div class="padma-row-edit-hover"><i class="fa fa-pencil" style="line-height:30px;"></i></div>');
	$(".padma-row-edit-hover").click(function(e) {e.preventDefault()})
	$(".padma-row-edit-hover i").click(function(e) {
	e.preventDefault();
	big_parent = $(this).parent().parent();
	
	//edit image
	if(big_parent.attr("data-type")=='image'){
	
	
	$("#padma-edit-image .image").val(big_parent.children('img').attr("src"));
	$("#padma-edit-image").fadeIn(500);
	$("#padma-edit-image .padma-edit-box").slideDown(500);
	
	$("#padma-edit-image .padma-edit-box-buttons-save").click(function() {
	  $(this).parent().parent().parent().fadeOut(500)
	  $(this).parent().parent().slideUp(500)
	  
	  big_parent.children('img').attr("src",$("#padma-edit-image .image").val());
          big_parent.children('img').attr("height",$("#padma-edit-image .height").val());
          big_parent.children('img').attr("width",$("#padma-edit-image .width").val());

	   });

	}
	
	//edit link
	if(big_parent.attr("data-type")=='link'){
	
	$("#padma-edit-link .title").val(big_parent.text());
	$("#padma-edit-link .url").val(big_parent.attr("href"));
	$("#padma-edit-link").fadeIn(500);
	$("#padma-edit-link .padma-edit-box").slideDown(500);
	
	$("#padma-edit-link .padma-edit-box-buttons-save").click(function() {
	  $(this).parent().parent().parent().fadeOut(500)
	  $(this).parent().parent().slideUp(500)
	   
	    big_parent.text($("#padma-edit-link .title").val());
		big_parent.attr("href",$("#padma-edit-link .url").val());

		});

	}
	
	//edit title
	
	if(big_parent.attr("data-type")=='title'){
	
	$("#padma-edit-title .title").val(big_parent.text());
	$("#padma-edit-title").fadeIn(500);
	$("#padma-edit-title .padma-edit-box").slideDown(500);
	
	$("#padma-edit-title .padma-edit-box-buttons-save").click(function() {
	  $(this).parent().parent().parent().fadeOut(500)
	  $(this).parent().parent().slideUp(500)
	   
	    big_parent.text($("#padma-edit-title .title").val());

		});

	}
	
	//edit text
	if(big_parent.attr("data-type")=='text'){
	
        var htm = $("<p>"+big_parent.html()+"</p>");
        htm.find("div").remove();
        $(".trumbowyg-editor").html(htm.html());
	$("#padma-edit-text").fadeIn(500);
	$("#padma-edit-text .padma-edit-box").slideDown(500);
	
	$("#padma-edit-text .padma-edit-box-buttons-save").click(function() {
	  $(this).parent().parent().parent().fadeOut(500)
	  $(this).parent().parent().slideUp(500)
	   
	    big_parent.html($("#padma-edit-text .text").val());
		
		
	   
		});

	}
	
	//edit icon
	if(big_parent.attr("data-type")=='icon'){
	
	
	$("#padma-edit-icon").fadeIn(500);
	$("#padma-edit-icon .padma-edit-box").slideDown(500);
	
	$("#padma-edit-icon i").click(function() {
	  $(this).parent().parent().parent().parent().fadeOut(500)
	  $(this).parent().parent().parent().slideUp(500)
	   
	    big_parent.children('i').attr('class',$(this).attr('class'));

		});

	}//
	
	});
  }, function() {
    $(this).children(".padma-row-edit-hover").remove();
  }
);
}
hover_edit();


//close edit
$(".padma-edit-box-buttons-cancel").click(function() {
  $(this).parent().parent().parent().fadeOut(500)
   $(this).parent().parent().slideUp(500)
});
   


//Drag & Drop
$("#page-builder-area-center-frame-content").sortable({
  revert: true
});
	

$(".padma-row").draggable({
      connectToSortable: "#page-builder-area-center-frame-content",
      //helper: "clone",
      revert: "invalid",
	  handle: ".padma-row-move"
});



//Delete
function add_delete(){
	$(".padma-row").append('<div class="padma-row-delete"><i class="fa fa-times" ></i></div>');
	
	}
add_delete();


function perform_delete(){
$(".padma-row-delete").click(function() {
  $(this).parent().remove();
});
}
perform_delete();




//Download
 $("#builder-save-page").click(function(){
	 
	$("#page-preloaded-export").html($("#page-builder-area-center-frame-content").html());
	$("#page-preloaded-export .padma-row-delete").remove();
	$("#page-preloaded-export .padma-row").removeClass("ui-draggable");
	$("#page-preloaded-export .padma-row-edit").removeAttr("data-type");
	$("#page-preloaded-export .padma-row-edit").removeClass("padma-row-edit");
	
	export_content = $("#page-preloaded-export").html();
        //console.log(export_content);
	$("#export-actual").val($("#page-builder-area-center-frame-content").html())
        
        if($("input[name='content[contentType]']:checked").val() == "Page")        
            $("#export-textarea").val(export_content)
	
        $("#export-form" ).submit();
	//$("#export-textarea").val(' ');
	 
});
	 
	 
//Export 
$("#page-builder-sidebar-buttons-bbutton").click(function(){
	
	$("#padma-edit-export").fadeIn(500);
	$("#padma-edit-export .padma-edit-box").slideDown(500);
	
	$("#page-preloaded-export").html($("#page-builder-area-center-frame-content").html());
	$("#page-preloaded-export .padma-row-delete").remove();
	$("#page-preloaded-export .padma-row").removeClass("ui-draggable");
	$("#page-preloaded-export .padma-row-edit").removeAttr("data-type");
	$("#page-preloaded-export .padma-row-edit").removeClass("padma-row-edit");
	
	preload_export_html = $("#page-preloaded-export").html();
	$.ajax({
	  url: "_css/newsletter.css"
	}).done(function(data) {

	
export_content = '<style>'+data+'</style><link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900,200italic,300italic,400italic,600italic,700italic,900italic" rel="stylesheet" type="text/css"><link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css"><div id="padma-wrapper"><div id="padma-wrapper-newsletter">'+preload_export_html+'</div></div>';
	
	$("#padma-edit-export .text").val(export_content);
	
	
	});
	
	
	
	$("#page-preloaded-export").html(' ');
	
	});




});