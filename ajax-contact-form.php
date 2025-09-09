<?php

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajax Contact Form</title>
</head>
<body>

    <h1>Contact us</h1>
    <h2 id="status-message"><?php if (isset($response)){echo $response['message'];}?></h2>

<form method="POST" id="contact-form">
    <label for="name">Name: <input type="text" name="name" id="name"></label><br>
    <label for="email">Email address: <input type="email" name="email" id="email"></label><br>
    <label for="message">Message: <textarea name="message" id="message" rows="8" cols="20"></textarea></label><br>
    <label for="dept">Send query to department:</label>
    <select name="dept" id="dept">
        <option value="sales">Sales</option>
        <option value="support" selected>Technical support</option>
        <option value="accounts">Accounts</option>
    </select><br>
    <input type="submit" value="Send">
</form>


<script type="application/javascript">
    const form = document.getElementById("contact-form")

    function email(data) {
        const message = document.getElementById("status-message")
        fetch("", {
            method: "POST",
            body: data,
            headers: {
               'X-Requested-With' : 'XMLHttpRequest'
            }
        })
            .then(response => response.json())
            .then(response => {message.innerHTML = response.message})
            .catch(error => {
                error.json().then(response => {
                    message.innerHTML = response.message
                })
            })
    }


    const submitEvent = form.addEventListener("submit", (event) => {
        event.preventDefault();

        const formData = new FormData(form);

        email(formData);
    })
</script>

</body>



</html>