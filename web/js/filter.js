var link = document.getElementById('filter');
link.style.visibility = 'hidden';
$( "#filter" ).fadeOut( "fast", function() {
    link.style.visibility = 'hidden';
});
$('#t-filter').click(function(){
    if(link.style.visibility == 'hidden'){
        link.style.visibility = 'visible';
        $( "#filter" ).fadeIn( "fast", function() {
            link.style.visibility = 'visible';
        });
    }else{
        $( "#filter" ).fadeOut( "fast", function() {
            link.style.visibility = 'hidden';
        });
    }



    return false;
});

// When document is ready...
$(document).ready(function() {

    // If cookie is set, scroll to the position saved in the cookie.
    if ( $.cookie("scroll") !== null ) {
        $(document).scrollTop( $.cookie("scroll") );
    }

    // When scrolling happens....
    $(window).on("scroll", function() {

        // Set a cookie that holds the scroll position.
        $.cookie("scroll", $(document).scrollTop() );

    });

});