
(function($){
	$(window).load(function(){
    	$("#workArea").hide();
    });

    $(document).ready(function(){
	    /*$.ajax({
	    	url:  'index.php?show=first',
	        type: 'get',
	        success:  function (response) {
			       $("#testingScroll").html(response);

             $("#testingScroll").mCustomScrollbar({
              horizontalScroll:true
            });
	        }
	    });*/

        $( "#startDate" ).datepicker();
        $( "#endDate" ).datepicker();
        $("#btnLogout").click(function(){
            $.ajax({
              data: {"logout":"ok"},
              url:  'grids.php',
              type: 'post'
            });
        });

	});

})(jQuery);
function loadTableJQuery(){
    if($(".fpTable").length > 0)
            $(".fpTable").dataTable({bSort: false, 
                                     "bJQueryUI": true,
                                     "bFilter": true,
                                    "iDisplayLength": 5, "aLengthMenu": [5,10,25,50,100], // can be removed for basic 10 items per page
                                    "sPaginationType": "full_numbers",
                                    "aoColumnDefs": [{"bSortable": false,
                                                     "aTargets": [ -1 , 0]
                                                    }]
                                    });
        /* table checkall */
        $("table .checkall").click(function(){
            
            var iC = $(this).parents('th').index(); //index of checkall checkbox
            var tB = $(this).parents('table').find('tbody'); // tbody of table
            
            if($(this).is(':checked'))
                tB.find('tr').each(function(){                
                    $(this).addClass('active').find('td:eq('+iC+') input:checkbox').attr('checked',true).parent('span').addClass('checked');
                });
            else
                tB.find('tr').each(function(){
                    $(this).removeClass('active').find('td:eq('+iC+') input:checkbox').attr('checked',false).parent('span').removeClass('checked');
                });            
            
        });    
        /* eof table checkall */

        $("table .checker").click(function(event){
            
            var tr = $(this).parents('tr');
            
            if(tr.hasClass('active'))
                tr.removeClass('active');
            else
                tr.addClass('active');       
           
           event.stopPropagation();
        });

        /* table row check */
        $("#myTable tbody tr").click(function(){
            
           if($(this).hasClass('active'))
                $(this).removeClass('active');
            else
                $(this).addClass('active');
            
            $(this).find('input:checkbox').each(function(){
                
                if($(this).is(':checked')){
                    $(this).attr('checked',false).parent('span').removeClass('checked');
                }else{
                    $(this).attr('checked',true).parent('span').addClass('checked');
                }
                                
            });
            
        });
        /* eof table row check */ 

        
        $("a.fb").fancybox({padding: 10,
                                'transitionIn'  : 'elastic',
                                'transitionOut' : 'elastic',
                                'speedIn'       : 600, 
                                'speedOut'      : 200
                            }); 

}
function showTable(str){
  $.ajax({
      url:  'grids.php?table='+str,
      type: 'get',
      success:  function (response) {
        $("#workArea").show();
        $("#myTable").html(response);
        loadTableJQuery();
    }
  });
}
