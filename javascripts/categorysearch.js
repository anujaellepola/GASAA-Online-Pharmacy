// document.addEventListener("DOMContentLoaded", function () {
//     const searchForm = document.getElementById("search-form");
//     const searchBox = document.getElementById("search-box");
//     const productGrid = document.getElementById("product-grid");
//     const productItems = document.querySelectorAll(".product-item");

//     function performSearch() {
//         const searchTerm = searchBox.value.toLowerCase();

//         productItems.forEach(function (item) {
//             const productName = item.querySelector(".product-title").innerText.toLowerCase();
//             const productDesc = item.querySelector(".product-description").innerText.toLowerCase();

//             if (productName.includes(searchTerm) || productDesc.includes(searchTerm)) {
//                 item.classList.remove("hidden"); // Show item
//             } else {
//                 item.classList.add("hidden"); // Hide item
//             }
//         });
//     }

//     searchForm.addEventListener("submit", function (event) {
//         event.preventDefault();
//         performSearch();
//     });

//     document.getElementById("search-icon").addEventListener("click", function () {
//         performSearch();
//     });

//     document.getElementById("close").addEventListener("click", function () {
//         // Clear the search box when the close icon is clicked
//         searchBox.value = "";
//         // Show all items by removing the "hidden" class
//         productItems.forEach(function (item) {
//             item.classList.remove("hidden");
//         });
//     });
// });
