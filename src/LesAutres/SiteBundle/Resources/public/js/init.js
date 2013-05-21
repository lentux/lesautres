$(function(){
    
    // show emails
    $("span.m").each(function() {
        var email = $(this).attr('style').replace(':','@').replace(' ','').replace(';','');
        $(this).html("<a href=\"mailto:" + email + "\">" + email + "</a>");
    });
    
    // Afficher le diaporama
    $('#slideshow').slideshow({
        timeout: 4000,
        fadetime: 1000,
        type: 'sequence'
    });
    
}); 