<?php
$menu_ativo = str_replace("/agenda-telefonica/", "", $_SERVER["PHP_SELF"]);
?>
<div class="well sidebar-nav">
    <ul class="nav nav-list">   
        <li class="<?=(($menu_ativo == 'index.php' ) ? "active" : "")?>"><a href="index.php">Agenda</a></li>
    </ul>
</div><!--/.well -->
