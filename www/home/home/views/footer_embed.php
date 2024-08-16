</div>


<!-- Latest compiled and minified JavaScript -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>



<script>
    function showPasswordNp() {
        var x = document.getElementById("np");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }

    function showPasswordRp() {
        var x = document.getElementById("rp");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
</script>
<?php
// esto me permite desactivar botones al enviar 
// poner id = btn_send
// <button type="submit" id="btn_send" class="btn btn-default">Send</button>
?>
<script>
    function disableButton() {
        var btn = document.getElementById('btn_send');
        btn.disabled = true;
        btn.innerText = 'Sending.....'
    }
</script>

</body>
</html>
