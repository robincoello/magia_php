<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-lg-3">
        <?php include view("config", "izq"); ?>
    </div>


    <div class="col-lg-2">


        <div class="list-group">
            <a href="#" class="list-group-item">
                <?php _menu_icon("top", "accounting"); ?>
                <?php echo _t("Emails"); ?>
            </a>


            <a href="index.php?c=config&a=legal&tmp=cdv" class="list-group-item"><?php _t("Condiones de venta"); ?></a>


        </div>




    </div>

    <div class="col-lg-7">
        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>

        <script src="https://cdn.ckeditor.com/ckeditor5/27.0.0/classic/ckeditor.js"></script>

        <h1>Classic editor</h1>
        <div id="editor">
            <p>This is some sample content.</p>
            <p>This is some sample content.</p>
            <p>This is some sample content.</p>
            <p>This is some sample content.</p>
            <p>
                Sr. {%name%} {%lastname%}



                {%my_company_name%}
                {%my_company_web%}
                {%my_company_email%}  
            </p>
            <p>This is some sample content.</p>
            <p>This is some sample content.</p>
            <p>This is some sample content.</p>
            <p>This is some sample content.</p>
            <p>This is some sample content.</p>
        </div>
        <script>
            ClassicEditor
                    .create(document.querySelector('#editor'))
                    .catch(error => {
                        console.error(error);
                    });
        </script>





        <form>

            <div class="form-group">
                <label for="exampleInputEmail1"><?php _t("Tmp"); ?></label>
                <textarea class="form-control" name="tmp" id="tmp" rows="15">
Sr. {%name%} {%lastname%}



{%my_company_name%}
{%my_company_web%}
{%my_company_email%}                    
                </textarea>
            </div>




            <button type="submit" class="btn btn-default">Submit</button>
        </form>


        <p>
            <b>
                {%my_company_name%} 
                {%my_company_tva%} 
                {%my_company_url%} 
                {%my_company_tel%} 
                {%my_company_email%} 
                {%my_company_bank_name%} 
                {%my_company_bank_account%} 
                {%my_company_bank_bic%} 
                {%my_company_bank_swift%}                        
            </b>
        </p>

        <p>
            <b>
                {%my_name%} 
                {%my_lastname%} 
                {%my_email%} 
                {%my_tel%} 
                {%my_tel2%} 
                {%my_gsm%} 



            </b>
        </p>

        <h3>
            <span class="label label-default">{%my_name%} </span> 
            <span class="label label-default">{%my_lastname%} </span>
            <span class="label label-default">{%my_email%} </span>
            <span class="label label-default">{%my_tel%} </span>
            <span class="label label-default">{%my_tel2%} </span>
            <span class="label label-default">{%my_gsm%} </span>
        </h3>



        https://stackoverflow.com/questions/57378310/how-can-i-add-the-value-of-a-button-to-a-textarea-when-clicking-the-button



        <textarea id="txtarea"></textarea>
        <input type="button" value="add text" id="add" />

        <script>
            $(document).ready(function () {
                $("#add").click(function () {
                    $('#tmp').html('test');
                });
            });
        </script>



    </div>
</div>

<?php include view("home", "footer"); ?> 

