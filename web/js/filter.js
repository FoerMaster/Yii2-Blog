var link = document.getElementById('filter');
if(link){
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
}



var loade;

function myLoad() {
    loade = setTimeout(showPage, 0000);
}

function showPage() {
    $('#overlayy').fadeOut('normal', function() {
        document.getElementById("loader").style.display = "none";

        document.getElementById("overlayy").style.display = "none";
    });

}