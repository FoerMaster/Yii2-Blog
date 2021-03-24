$(document).ready(function() {
    $('#comForm').on('beforeSubmit', function() {
        // Получаем объект формы
        var $testform = $(this);
        // отправляем данные на сервер
        $.ajax({
            // Метод отправки данных (тип запроса)
            type : $testform.attr('method'),
            // URL для отправки запроса
            url : $testform.attr('action'),
            // Данные формы
            data : $testform.serializeArray()
        }).done(function(data) {

            if (data.error == null) {
                // Если ответ сервера успешно получен

                var div = document.createElement("div");
                div.innerHTML = data.model;
                div.classList.add("animate__animated");
                div.classList.add("animate__fadeIn");

                document.getElementById("comments").appendChild(div);
                console.log("Карточка создалась");
                window.scrollTo(0,document.body.scrollHeight);
            } else {
                // Если при обработке данных на сервере произошла ошибка
                console.log(data.error);
            }
        }).fail(function() {
            // Если произошла ошибка при отправке запроса
            $("#output").text("error3");
            console.log(data.error);
        })
        // Запрещаем прямую отправку данных из формы
        return false;
    })
})
