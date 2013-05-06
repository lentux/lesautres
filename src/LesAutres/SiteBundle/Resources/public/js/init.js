$(function(){
    
    // scrolling text
    $("ul#scrollingtext").liScroll({travelocity: 0.07});
    
    // unhide emails
    $("span.m").each(function() {
        var email = $(this).attr('style').replace(':','@').replace(' ','').replace(';','');
        $(this).html("<a href=\"mailto:" + email + "\">" + email + "</a>");
    });
}); 