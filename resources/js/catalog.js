import axios from "axios";
import "./app";

$(() => {
    var cartItems = {}; // Создаем пустой массив для хранения id товаров

    $(".item__btn").each((index, item) => {
        $(item).on("click", function () {
            var itemId = $(item).attr("id");
            console.log(itemId);

            if (cartItems[itemId]) {
                cartItems[itemId] += 1; // Увеличиваем количество товаров, если он уже был добавлен
            } else {
                cartItems[itemId] = 1; // Иначе устанавливаем количество 1
            }

            console.log(cartItems); // Выводим объект с id и количеством товаров

            // Преобразуем объект в строку JSON и сохраняем его в куки
            document.cookie = `cart=${JSON.stringify(
                cartItems
            )};expires=${new Date(Date.now() + 86400000).toUTCString()}`;

            axios
                .get(`http://127.0.0.1:8000/catalog/add-item/${itemId}`)
                .then((response) => {
                    console.log(response.data);
                })
                .catch((error) => {
                    console.error(error);
                });
        });
    });
});
