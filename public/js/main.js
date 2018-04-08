$(document).ready(function () {
    var height = $(window).height();
    var footer = $('footer').height();
    var header = $('header').height();
    height = height - footer - header - 60;
    console.log(height);
    $('div.body').css({"min-height": height + "px"});
    
    
    
    var date = new Date();

$('.inlinepicker').datepicker({
    language: "da",
    todayHighlight: true,
    multidate: false
    }).on('changeDate', function(e){
        //$("#startDate").hide();        
        
        var dates = [];
        var realDate = "";
        
        $.each($('.inlinepicker').datepicker('getUTCDates'), function( index, value ) {
                var d = new Date(Date.parse(value));
                 var dateStr = moment(d).format("LL");
                  realDate =  moment(d).format("YYYY-MM-DD");
                dates.push(realDate);
            });
            
        $("#sdate").val(dates.toString());
        
    });
    

    
    // Multidate For Events
    
$('.eventinlinepicker').datepicker({
    language: "da",
    todayHighlight: true,
    multidate: true,
    startDate: date
    }).on('changeDate', function(e){
        //$("#startDate").hide();        
        
        var dates = [];
        var realDate = "";
        
        $.each($('.eventinlinepicker').datepicker('getUTCDates'), function( index, value ) {
                var d = new Date(Date.parse(value));
                 var dateStr = moment(d).format("LL");
                  realDate =  moment(d).format("YYYY-MM-DD");
                dates.push(realDate);
            });
	    
	$("#eventdate").val(dates.toString());
        
    });
    
    $('.editeventdatepicker').datepicker({
    language: "da",
    todayHighlight: true,
    multidate: true,
    startDate: date
    }).on('changeDate', function(e){
        //$("#startDate").hide();        
        
        var dates = [];
        var realDate = "";
        
        $.each($('.editeventdatepicker').datepicker('getUTCDates'), function( index, value ) {
                var d = new Date(Date.parse(value));
                 var dateStr = moment(d).format("LL");
                  realDate =  moment(d).format("YYYY-MM-DD");
                dates.push(realDate);
            });
	    
	$("#eventdate").val(dates.toString());
        
    });
    
    if(typeof $.fn.selectBoxIt !== 'undefined')
    $("select").not(".selectpicker").selectBoxIt();
    
});