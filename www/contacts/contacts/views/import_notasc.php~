<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-lg-3">
        <?php // include view("contacts", "izq"); ?>
    </div>

    <div class="col-lg-12">
        <?php //include view("contacts", "nav"); ?>


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

        <h1>Import</h1>

        <a href="index.php?c=contacts&a=import_address">import_address</a> | 
        <a href="index.php?c=contacts&a=import_directory">import_directory</a> | 
        <a href="index.php?c=contacts&a=import_email">Email</a> | 
        <a href="index.php?c=contacts&a=import_invoices">Invoices</a> | 
        <a href="index.php?c=contacts&a=import_invoice">Invoice</a> | 
        <a href="index.php?c=contacts&a=import_notasc">notas c</a> | 
        <a href="index.php?c=contacts&a=import_notac">nota</a> | 

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>1</th>
                    <th>1</th>
                    <th>1</th>
                    <th>1</th>
                    <th>1</th>
                    <th>1</th>
                    <th>order_by</th>
                    <th>Status</th>
                </tr>
            </thead>

            <tbody>

                <?php
                $fp = fopen("tmp/syb/notacs.csv", "r");

                while ($data = fgetcsv($fp, 999, ",", '"')) {
                    $num = count($data);

                    $factura_id = $data[0];
                    $presupuesto_id = $data[1];
                    $id_notac = $data[2];
                    $id_cliente = $data[3];
                    $id_vendedor = $data[4];
                    $fr = $data[5];
                    $total = $data[6];
                    $iva = $data[7];
                    $anticipo = $data[8];
                    $saldo = $data[9];
                    $comentarios = ($data[10] != 'NULL') ? $data[10] : "";
                    $comentarios_p = $data[11];
                    $r1 = $data[12];
                    $r2 = $data[13];
                    $r3 = $data[14];
                    $fc = $data[15];
                    $id_tr = $data[16];
                    $ce = $data[17];

                    print "";
                    echo"<tr>";
                    echo "<td>" . ($data[0]) . "</td>"; //id                        
                    echo "<td>" . ($data[1]) . "</td>"; //id                        
                    echo "<td>" . ($data[2]) . "</td>"; //id                        
                    echo "<td>" . utf8_decode($data[3]) . "</td>"; //id                        
                    echo "<td>" . ($data[4]) . "</td>"; //id                        
                    echo "<td>" . ($data[5]) . "</td>"; //id                        
                    echo "<td>" . ($data[6]) . "</td>"; //id                        
                    echo "<td>" . ($data[7]) . "</td>"; //id                        
                    echo "<td>" . ($data[8]) . "</td>"; //id                        
                    echo "<td>" . ($data[9]) . "</td>"; //id                        
                    echo "<td>" . ($data[10]) . "</td>"; //id                        
                    echo "<td>" . ($data[11]) . "</td>"; //id                        
                    echo "<td>" . ($data[12]) . "</td>"; //id                        
                    echo "<td>" . ($data[13]) . "</td>"; //id                        
                    echo "<td>" . ($data[14]) . "</td>"; //id                        
                    echo "<td>" . ($data[15]) . "</td>"; //id                        
                    echo "<td>" . ($data[16]) . "</td>"; //id                        
                    echo "<td>" . ($data[17]) . "</td>"; //id                        
                    echo "<td>" . ($data[18]) . "</td>"; //id                        
                    echo "<td>" . ($data[19]) . "</td>"; //id                        
                    echo "<td>" . ($data[20]) . "</td>"; //id                        
//            echo "<td>". ($data[0]) . "</td>"; //id                        
//            echo "<td>". ($data[1]) . "</td>"; 
//            echo "<td>". ($data[2]) . "</td>"; 
//            echo "<td>". ($data[3]) . "</td>"; 
//            echo "<td>". ($data[4]) . "</td>"; 
//            echo "<td>". ($data[5]) . "</td>"; 
//            echo "<td>". ($data[6]) . "</td>"; 
//            echo "<td>". ($data[7]) . "</td>"; 
//            echo "<td>". ($data[8]) . "</td>"; 
//            echo "<td>". ($data[9]) . "</td>"; 
//            echo "<td>". ($data[10]) . "</td>"; 
//            echo "<td>". ($data[11]) . "</td>"; 
//            echo "<td>". ($data[12]) . "</td>"; 
//            echo "<td>". ($data[13]) . "</td>"; 
//            echo "<td>". ($data[14]) . "</td>"; 
//            echo "<td>". ($data[15]) . "</td>"; 
//            echo "<td>". ($data[16]) . "</td>"; 
//            echo "<td>". ($data[17]) . "</td>"; 
//            echo "<td>". ($data[18]) . "</td>"; 
//            echo "<td>". ($data[19]) . "</td>"; 
//            echo "<td>". ($data[20]) . "</td>"; 
//            echo "<td>". ($data[21]) . "</td>"; 
//            echo "<td>". ($data[22]) . "</td>"; 
//            echo "<td>". ($data[23]) . "</td>"; 
//            echo "<td>". ($data[24]) . "</td>"; 
//            echo "<td>". ($data[25]) . "</td>"; 
//            echo "<td>". ($data[26]) . "</td>"; 
//            for($i=0; $i< $num; $i++){
//                echo "<td>". ($data[$i]) . "</td>"; 
//            }
//            


                    echo '</tr>';
                }

                fclose($fp);
                ?>
            </tbody>


        </table>



        <?php
        /*
          Export:
          <a href="index.php?c=addresses&a=export_json">JSON</a>
          <a href="index.php?c=addresses&a=export_pdf">pdf</a>
         */
        ?>


    </div>
</div>

<?php include view("home", "footer"); ?> 

