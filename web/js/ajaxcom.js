$(document).ready(function() {
    $('#comForm').on('beforeSubmit', function() {
        var $testform = $(this);
        $.ajax({
            type : $testform.attr('method'),
            url : $testform.attr('action'),
            data : $testform.serializeArray()
        }).done(function(data) {

            if (data.error == null) {


                var div = document.createElement("div");
                div.innerHTML = data.model;
                div.classList.add("animate__animated");
                div.classList.add("animate__fadeIn");

                document.getElementById("comments").appendChild(div);
                console.log("Карточка создалась");
                window.scrollTo(0,document.body.scrollHeight);
            } else {

                console.log(data.error);
            }
        }).fail(function() {

            $("#output").text("error3");
            console.log(data.error);
        })

        return false;
    })
})
