const form = document.querySelector(".login form");
const continueBtn = form.querySelector(".button input");
const errorText = form.querySelector(".error-text");

form.onsubmit = (e) => {
    e.preventDefault(); // Prevent default form submission behavior
}

continueBtn.onclick = () => {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/login.php", true);
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let data = xhr.response;
                if (data === "success") { // Corrected typo here
                    location.href = "user.php"; // Redirect to user.php on successful login
                } else {
                    errorText.style.display = "block";
                    errorText.textContent = data; // Display error message
                }
            }
        }
    };

    // Create FormData object and send it with the XHR request
    let formData = new FormData(form);
    xhr.send(formData);
};
