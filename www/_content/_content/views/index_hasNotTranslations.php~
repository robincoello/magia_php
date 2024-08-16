<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-lg-2">
        <?php include view("_content", "izq"); ?>
    </div>

    <div class="col-lg-10">
        <?php include view("_content", "nav"); ?>


        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>



        <?php
// https://api.jquery.com/prop/
        ?>


        <script>
            $.getJSON('https://demo.web.com/index.php?c=_translations&a=api&s=home&l=fr_BE', function (data) {

                var text = `${data.fr_BE}`
                $(".mypanel").html(text);
                $('#translation_2').val(text);
            });

            (function () {
                var trApi = "https://demo.web.com/index.php?";
                        $.getJSON(trApi.{
                        c: "_translations",
                                a: "api",
                                s: "home",
                                l: "fr_BE"
                        }
                        ).done(function(data)){
                $.each(data.items, function(i, item){
                $("<img>").attr().appendTo("#images");
                        if (i === 3){
                return false;
                }
                });
                }
                );
            })();
        </script>


        <div class="mypanel"></div>


        <?php
        include view('_content', 'table_index_hasNotTranslations');
        ?>


        <?php
        $pagination->createHtml();
        ?>



    </div>
</div>

<?php include view("home", "footer"); ?> 

