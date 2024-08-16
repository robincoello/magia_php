<?php
// si no hay errores mostramos esta parte
////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
if (!$error) {
    if (permissions_has_permission($u_rol, "comments", "read") && $a == "details") {
        echo "<h3>" . _tr("Internal chat") . "</h3>";
        message('info', 'This chat is internal to the company, it is not shown to customers or printed on documents');
        include view("comments", "comments");
    }
    echo '<a name="comments"></a>';
    if (permissions_has_permission($u_rol, "comments", "create") && $a == "details") {
        //include view("comments" , "modalCommentsUpdate") ;
        include view("comments", "formCommentsUpdate");
    }


// logs
    if (permissions_has_permission($u_rol, "logs", "read") && $a == "details") {
        echo "<h2>" . _tr("Logs") . "</h2>";
        include view("logs", "logs");
    }
}
////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
?> 

<br>


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
