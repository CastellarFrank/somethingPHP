
var myEvent = function(){
    var tr = $(this).parents('tr');
        
    if(tr.hasClass('active'))
        tr.removeClass('active');
    else
        tr.addClass('active');    
};
function eventCheckClick(){
    $("table .checker1").bind( "click", myEvent );
    $("table .checker1").unbind( "click", myEvent );
}

function states(){
  var id = $("select#country option:selected").attr('value');
  $.post("include/postCall_statesOptions.php", {id:id}, function(data){ 
    $("select#state").html(data);           
  });
}

function cities(){
  var id = $("select#country option:selected").attr('value');
  var id2 = $("select#state option:selected").attr('value');
  $.post("include/postCall_citiesOptions.php", {idPais:id,idEstado:id2}, function(data){ 
    $("select#city").html(data);           
  });
}
(function($){
  var oTable;
	$(window).load(function(){
    	if($(".fpTable2").length > 0)
        oTable= $(".fpTable2").dataTable({
            "sDom": 'RCT<"clear">lfrtip',
            "sScrollX":"100%"   ,
            "sScrollXInner": "100%",
            "bScrollCollapse": true,
            bSort: true, 
            bAutoWidth: false,
            "iDisplayLength": 3, "aLengthMenu": [3,5,10,25,50,100], // can be removed for basic 10 items per page
            "sPaginationType": "full_numbers",
            "aoColumnDefs": [{"bSortable": false,
                             "aTargets": [ -1 , 0]}],
            "fnDrawCallback": function ( iIn ) {
              eventCheckClick();
            }
      });
    });

    $(document).ready(function(){
      
      
      $(".deletePromotion").each(function(i,obj){
        $(this).bind('click',function(){
          var parent = $(this).closest("tr");

          var id = parent.find("#tdPromotion").html();
          oTable.fnDeleteRow(parent.index());
          $.post("include/postCall_deletePromotion.php", {idProm:id}, function(data){ 
          });
          
        });
      });
      $("select#country").change(function(){ 
        states();
        cities();
      });

      $("select#state").change(function(){ 
        cities();
      });


	  });

})(jQuery);