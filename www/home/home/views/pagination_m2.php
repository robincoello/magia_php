<nav aria-label="Page navigation">
    <ul class="pagination">
        <li>
            <?php echo ($this->getTotalPages() > 5 && $this->getPage() > 3) ? "<a href=\"" . $this->getUrl() . "\" aria-label=\"Next\"><span aria-hidden=\"true\">&laquo;</span></a>" : ''; ?>
        </li>

        <?php for ($i = 1; $i <= $this->getTotalPages(); $i++) { ?> 
            <?php
            if ($i > $this->getPage() - 3 && $i < $this->getPage() + 3) {
                ?>
                <li <?php echo ($i == $this->getPage()) ? ' class="active"' : ""; ?>><a href="<?php echo $this->getUrl() . "&page=$i"; ?>"><?php echo $i; ?></a></li>
            <?php } ?>
        <?php } ?>
        <li>
            <?php
            echo ($this->getTotalPages() > 5 && $this->getPage() <= $this->getTotalPages() - 2) ?
                    "<a href=\"" . $this->getUrl() . "&page=" . $this->getTotalPages() . "\" aria-label=\"Next\"><span aria-hidden=\"true\">&raquo;</span></a>" :
                    '';
            ?>
        </li>
    </ul>
</nav>