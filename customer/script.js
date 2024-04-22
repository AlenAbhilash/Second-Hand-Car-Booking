// script.js

document.querySelectorAll(".whatsapp-chat-button").forEach(function(button) {
    button.addEventListener("click", function() {
        var phoneNumber = this.getAttribute("data-phone");
        
        if (phoneNumber) {
            var whatsappUrl = "https://api.whatsapp.com/send?phone=" + phoneNumber;
            window.open(whatsappUrl, "_blank");
        }
    });
});
 