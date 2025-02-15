(function () {
    toggleSelected();
})();

function toggleSelected() {
    var userChatElement = document.querySelectorAll(".user-chat");
    Array.from(document.querySelectorAll(".chat-user-list li a")).forEach(
        function (item) {
            item.addEventListener("click", function (event) {
                // userChatElement.forEach(function (elm) {
                // elm.classList.add("user-chat-show");
                // });
                // chat user list link active
                var chatUserList = document.querySelector(
                    ".chat-user-list li.active"
                );
                if (chatUserList) chatUserList.classList.remove("active");
                this.parentNode.classList.add("active");
            });
        }
    );
    Array.from(document.querySelectorAll(".chat-user-list li button")).forEach(
        function (item) {
            item.addEventListener("click", function (event) {
                userChatElement.forEach(function (elm) {
                    elm.classList.add("user-chat-show");
                });
                // chat user list link active
                var chatUserList = document.querySelector(
                    ".chat-user-list li.active"
                );
                if (chatUserList) chatUserList.classList.remove("active");
                this.parentNode.classList.add("active");
            });
        }
    );
    // user-chat-remove
    document.querySelectorAll(".user-chat-remove").forEach(function (item) {
        item.addEventListener("click", function (event) {
            userChatElement.forEach(function (elm) {
                elm.classList.remove("user-chat-show");
            });
        });
    });
}

function searchMessages() {
    var searchInput, searchFilter, searchUL, searchCards, a, txtValue;
    searchInput = document.getElementById("searchMessage");
    searchFilter = searchInput.value.toUpperCase();
    searchUL = document.getElementById("cat_products");
    searchCards = searchUL.querySelectorAll(".items_div"); // Selecting product divs

    searchCards.forEach(function (card) {
        a = card.querySelector(".card-footer small"); // Select <small> inside the card-footer
        txtValue = a ? a.textContent || a.innerText : "";

        if (txtValue.toUpperCase().indexOf(searchFilter) > -1) {
            card.style.display = ""; // Show full product card if matches
        } else {
            card.style.display = "none"; // Hide full product card if doesn't match
        }
    });
}
