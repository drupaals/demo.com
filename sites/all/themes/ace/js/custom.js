jQuery(function ($){
          jQuery(".dropdown-menu li a").click(function(){
                    var value = jQuery(this).attr('id'); 
                    var url=window.location.href;
                    var n = url.split("?");
                    var base_url = n[0]
                    window.location=base_url+"?value="+value;
                     
          });
          jQuery('.dropdown-menu li').click(function(){
                    $(this).addClass("active");
          });
                    
});