<?php
include 'common.php';
require_once('custom/css/ag.css');
$itens = ItemType();
echo "<table>";
echo "<tr><th>Tipo de Item</th><th>id</th><th>nome do item</th><th>estado</th><th>ação</th></tr>";
if (!empty($itens)) {
    foreach ($itens as $item) {
        $ids = explode(",", $item["ids_dos_itens"]);
        $nomes = explode(",", $item["nome_dos_itens"]);
        $estados = explode(",", $item["estados_dos_itens"]);
        $num_itens = count($ids);
        for ($i = 0; $i < $num_itens; $i++) {
            echo "<tr>";         
            if ($i == 0) {
                echo "<td rowspan='$num_itens'>" . $item["tipo_do_item"] . "</td>";
            }          
            echo "<td>" . $ids[$i] . "</td>";
            echo "<td>" . $nomes[$i] . "</td>";
            echo "<td>" . $estados[$i] . "</td>";
            $acao = "";
            if ($estados[$i] == "active") {
                $acao = "<a href='#' class='action-link'>[editar]</a> 
                         <a href='#' class='action-link'>[desativar]</a> 
                         <a href='#' class='action-link'>[apagar]</a>";
            } elseif ($estados[$i] == "inactive") {
                $acao = "<a href='#' class='action-link'>[editar]</a> 
                         <a href='#' class='action-link'>[ativar]</a> 
                         <a href='#' class='action-link'>[apagar]</a>";
            }          
            echo "<td>" . $acao . "</td>";     
            echo "</tr>";
        }
    }
} else {
    echo "<tr><td colspan='5'>Nenhum registro encontrado</td></tr>";
}
echo "<tr>";
echo "<td>reserva</td>";
echo "<td style='border: none;'><strong>Não existem itens para este tipo de item</strong></td>";
echo "</tr>";
echo "</table>";
echo "<strong>Gestão de itens - introdução</strong>";
echo "<br>";
echo '<strong><span style="color: red;">* Obrigatório</span></strong>';
echo "<br>";
echo '<strong>Nome: <span style="color: red;">*</span></strong>';
echo "<textarea></textarea>";
echo "<br>";
echo '<strong>Tipo<span style="color: red;">*</span></strong>';
?>