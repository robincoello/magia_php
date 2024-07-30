
<nav aria-label="Page navigation">
    <ul class="pagination">
        <li>
            <?php echo ($totalPages > 5 && $actualPage > 3) ? "<a href=\"$url\" aria-label=\"Next\"><span aria-hidden=\"true\">&laquo;</span></a>" : ''; ?>
        </li>

        <?php for ($i = 1; $i <= $totalPages; $i++) { ?> 
            <?php
            if ($i > $actualPage - 3 && $i < $actualPage + 3) {
                //$url = $url . "&pag=$i"; 
                ?>
                <li <?php echo ($i == $actualPage) ? ' class="active"' : ""; ?>><a href="<?php echo "$url" . "&page=$i"; ?>"><?php echo $i; ?></a></li>
            <?php } ?>
        <?php } ?>
        <li>
            <?php echo ($totalPages > 5 && $actualPage <= $totalPages - 2) ? "<a href=\"$url&page=$totalPages\" aria-label=\"Next\"><span aria-hidden=\"true\">&raquo;</span></a>" : ''; ?>
        </li>
    </ul>
</nav>

<?php /*

<< 1 2 [3] 4 5 >> 


 * << si hay 6 o mas paginas, lleva a la pagina 1
 * >> si hay 6 o mas paginas, lleva a la ultima pagina
 */