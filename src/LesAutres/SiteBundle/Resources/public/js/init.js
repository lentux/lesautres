$(function(){
    
    // show emails
    $("span.m").each(function() {
        var email = $(this).attr('style').replace(':','@').replace(' ','').replace(';','');
        $(this).html("<a href=\"mailto:" + email + "\">" + email + "</a>");
    });
    
    // Afficher le diaporama
    $('#slideshow_img_1').show();
    $('#slideshow').slideshow({
        timeout: 4000,
        fadetime: 1000,
        type: 'sequence'
    });
    
}); 