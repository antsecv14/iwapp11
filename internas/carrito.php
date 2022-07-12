<?php
include("header.php");
?>

<main>
<div class="boxCentrado">
    <h2 class = "h2Home">
        Pedido
</h2>

<?php
include("../pedidos/controller/pedidos_controller.php");
$control= new pedido_controller();
$control->ListPedido();
?>
</div>
</main>