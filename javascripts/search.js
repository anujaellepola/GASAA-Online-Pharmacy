document.addEventListener("DOMContentLoaded", function () {
    const searchForm = document.getElementById("search-form");
    const searchBox = document.getElementById("search-box");
    const items = document.querySelectorAll(".box");

    searchForm.addEventListener("submit", function (event) {
        event.preventDefault();
        const searchTerm = searchBox.value.toLowerCase();

        items.forEach(function (item) {
            const itemName = item.querySelector("h3").innerText.toLowerCase();

            if (itemName.includes(searchTerm)) {
                item.style.display = "block";
            } else {
                item.style.display = "none";
            }
        });
    });
});
document.addEventListener("DOMContentLoaded", function () {
    const searchForm = document.getElementById("search-form");
    const searchBox = document.getElementById("search-box");
    const productItems = document.querySelectorAll(".product-item");

    searchForm.addEventListener("submit", function (event) {
        event.preventDefault();
        const searchTerm = searchBox.value.toLowerCase();

        productItems.forEach(function (item) {
            const productName = item.querySelector(".product-title").innerText.toLowerCase();
            const productDesc = item.querySelector(".product-description").innerText.toLowerCase();

            if (productName.includes(searchTerm) || productDesc.includes(searchTerm)) {
                item.style.display = "block";
            } else {
                item.style.display = "none";
            }
        });
    });
});
