
      $(function() {
        $(".social-sidebar").socialSidebar();
        $('.main').panels();
        $(".main a[href='#ignore']").click(function(e) {
          e.stopPropagation()
        });
      });

$(document).on('click', '.removeBenefits', function () {
    // your function here
  
   var attr = $(this).attr('ben-exc');
  
  if (typeof attr !== typeof undefined && attr !== false) {
   
      $.ajax({
            type: "POST",
            url: "/admin/product/ajax-delete-benefits-excess/",
           data: "ben_id="+attr,
            success: function (response) {}
                  
            });
   
    }
    
        $(this).parent().parent().remove();
   
});

$(document).on('click', '.removeExcess', function () {
    // your function here
  
   var attr = $(this).attr('ben-exc');
  
  if (typeof attr !== typeof undefined && attr !== false) {
   
      $.ajax({
            type: "POST",
            url: "/admin/product/ajax-delete-benefits-excess/",
           data: "ben_id="+attr,
            success: function (response) {}
                  
            });
   
    }
    
        $(this).parent().parent().remove();
   
});
