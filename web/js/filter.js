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

