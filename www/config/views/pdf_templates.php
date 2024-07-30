<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-lg-3">
        <?php include view("config", "izq"); ?>
    </div>


    <div class="col-lg-2">


        <div class="list-group">
            <a href="#" class="list-group-item">
                <?php _menu_icon("top", "accounting"); ?>
                <?php echo _t("PDF"); ?>
            </a>


            <a href="index.php?c=config&a=pdf_templates" class="list-group-item"><?php _t("Order"); ?></a>
            <a href="index.php?c=config&a=pdf_templates" class="list-group-item"><?php _t("Budget"); ?></a>
            <a href="index.php?c=config&a=pdf_templates" class="list-group-item"><?php _t("Invoice"); ?></a>
            <a href="index.php?c=config&a=pdf_templates" class="list-group-item"><?php _t("Rappel 1"); ?></a>
            <a href="index.php?c=config&a=pdf_templates" class="list-group-item"><?php _t("Rappel 2"); ?></a>
            <a href="index.php?c=config&a=pdf_templates" class="list-group-item"><?php _t("Rappel 3"); ?></a>
            <a href="index.php?c=config&a=pdf_templates" class="list-group-item"><?php _t("Balance"); ?></a>
            <a href="index.php?c=config&a=pdf_templates" class="list-group-item"><?php _t("Export clients"); ?></a>
            <a href="index.php?c=config&a=pdf_templates" class="list-group-item"><?php _t("Export invoices"); ?></a>
            <a href="index.php?c=config&a=pdf_templates" class="list-group-item"><?php _t("Export credit notes"); ?></a>
            <a href="index.php?c=config&a=pdf_templates" class="list-group-item"><?php _t("Export balance"); ?></a>                                                            
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


        <form>

            <div class="form-group">
                <label for="exampleInputEmail1"><?php _t("Tmp"); ?></label>
                <textarea class="form-control" name="tmp" rows="20">
Sr. {%name%} {%lastname%}



{%my_company_name%}
{%my_company_web%}
{%my_company_email%}                    
                </textarea>
            </div>




            <button type="submit" class="btn btn-default">Submit</button>
        </form>



        <p>

            more info <a href="http://www.fpdf.org/" target="new">http://www.fpdf.org/</a>

        </p>



    </div>
</div>

<?php include view("home", "footer"); ?> 

