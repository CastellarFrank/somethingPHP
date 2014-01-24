
$(window).ready(function(){
	if($(".fb2").length > 0)
        $("a.fb2").fancybox({padding: 10,
            'transitionIn'  : 'elastic',
            'transitionOut' : 'elastic',
            'speedIn'       : 600, 
            'speedOut'      : 200,
            'type':'image'
        });
});

$(window).load(function(){
	

	if($(".fpTable3").length > 0)
        $(".fpTable3").dataTable({
            "sDom": 'RCT<"clear">lfrtip',
            "sScrollX":"100%"   ,
            "sScrollXInner": "100%",
            "bScrollCollapse": true,
            bSort: true, 
            bAutoWidth: false,
            "iDisplayLength": 3, "aLengthMenu": [3,5,10,25,50,100], // can be removed for basic 10 items per page
            "sPaginationType": "full_numbers",
            "fnDrawCallback": function ( iIn ) {
            	eventCheckClick();
            }
	});
});