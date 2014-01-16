 jQuery(document).ready(function() {
        jQuery(".form-item-custom-search-types label").addClass("abc");
        jQuery(".form-type-radio label").removeClass("abc");
        jQuery(".abc").click(function(){
        jQuery("#edit-custom-search-types").toggle();
                });
        //alert(( "window", jQuery( window ).width() ));
        jQuery(".dropdown-toggle").click(function(){
                jQuery(this).find("i").toggleClass("icon-eye-close icon-eye-open")
                })
 }); 
 