jQuery(document).ready( function($) {
    
    jQuery(".efect-arctext").each(function() {

        var radius = jQuery(this).data("radius");

        var direction = jQuery(this).data("dir");

        var rot = jQuery(this).data("rotate");

        if( !(rot) && rot !== false ) { console.log('here'); rot = true; }

        if( !(direction) ) { direction = -1; }

        var id = jQuery(this).prop('id');
        
        jQuery('#' + id).arctext({radius: radius, dir: direction, rotate: rot});
    
    });
    
});
 
