import "./app";
import axios from "axios";

$("#sendMessage").on("click", function () {
    $(".errors").detach();
    axios
        .post(`/tg/send`, {
            message: $("#textBot").val(),
        })
        .then((response) => {
            if (!response.success) {
                let output = "";
                response.data.errors.message.map(item => {
                    output += `<p>${item}</p>`;
                })
                console.log('out', output);
                $("<div class='errors'>" + output + "</div>").appendTo('.form');
            } else {
                $("<div class='success'>Сообщение отправлено!</div>").appendTo('.form');
            }
        })
        .catch((error) => {
            console.error(error);
        });
});
