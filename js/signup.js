const form = document.querySelector(".signup form"),
      continueBtn = form.querySelector(".button input"),
      errorText = form.querySelector(".error-text");

form.onsubmit = (e) => {
    e.preventDefault();
}

continueBtn.onclick = () => {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/signup.php", true);
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let data = xhr.response;
                if (data.trim() === "success") { // Trim whitespace from response
                    location.href = "user.php";
                } else {
                    errorText.style.display = "block";
                    errorText.textContent = data;
                }
            } else {
                console.error("Error: " + xhr.status);
                // Handle other HTTP status codes (e.g., 404, 500)
            }
        }
    };
    xhr.onerror = () => {
        console.error("Request failed");
        // Handle request errors
    };
    
    let formData = new FormData(form);
    xhr.send(formData);
};
