<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Mon éditeur WYSIWYG</title>

        <link href="styleeeeeeeeeeeeeeee.css" rel="stylesheet" type="text/css"/>


    </head>
    <body>

        <textarea id="wysiwyg-source"></textarea>


        <script src="editeur.js" type="text/javascript"></script>

        <script>
            window.onload = function () {
                WYSIWYG(document.getElementById('wysiwyg-source'));
            };

//            WYSIWYG(document.getElementById('wysiwyg-source'), {
//                'order': ['italic', 'bold' , 'unorderedlist', 'link', 'format', 'source']
//            });


        </script>



    </body>
</html>