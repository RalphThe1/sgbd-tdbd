<?php
echo "<script type='text/javascript'>document.write(\"<a href='javascript:history.back()' class='backLink' title='Voltar atr&aacute;s'>Voltar atr&aacute;s</a>\");</script>
<noscript>
<a href='".$_SERVER['HTTP_REFERER']."‘ class='backLink' title='Voltar atr&aacute;s'>Voltar atr&aacute;s</a>
</noscript>";
$link = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
function connection(){
    $link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    if (!$link) {
        die("Falha na conexÃ£o: " . mysqli_connect_error());
    }
    return $link;
}
function ItemType() {
    $link = connection();
    $sql = "
        SELECT 
            item_type.name AS tipo_do_item,
            GROUP_CONCAT(item.id ORDER BY item.id ASC) AS ids_dos_itens, 
            GROUP_CONCAT(item.name ORDER BY item.id ASC) AS nome_dos_itens,
            GROUP_CONCAT(item.state ORDER BY item.id ASC) AS estados_dos_itens
        FROM 
            item
        JOIN 
            item_type ON item.item_type_id = item_type.id
        GROUP BY 
            item_type.name";
    $result = mysqli_query($link, $sql);
    if (!$result) {
        die("Erro ao executar a consulta SQL: " . mysqli_error($link));
    }
    $itens = [];
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $itens[] = $row;
        }
    }
    mysqli_close($link);
    return $itens;
}

function get_enum_values($connection, $table, $column )
{
    $query = " SHOW COLUMNS FROM $table LIKE '$column' ";
    $result = mysqli_query($connection, $query );
    $row = mysqli_fetch_array($result , MYSQLI_NUM );
    #extract the values
    #the values are enclosed in single quotes
    #and separated by commas
    $regex = "/'(.*?)'/";
    preg_match_all( $regex , $row[1], $enum_array );
    $enum_fields = $enum_array[1];
    return( $enum_fields );
}
//Verifica se o utilizador está autenticado e tem uma certa capability
function verificaCapacidade($capacidade)
{
    return is_user_logged_in() && current_user_can($capacidade);
}

//realiza ligação com a base de dados
function ligacao()
{
    $ligacao = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

    if (!$ligacao) {
        die("Erro na ligação: " . mysqli_error());
    }
    return $ligacao;
}
setlocale(LC_ALL,"pt_PT.utf-8");
global $pagina;
$pagina = get_site_url() . '/' . basename(get_permalink());

global $clinica_sgbd;
$mysql = mysqli_connect(db_host
,db_user
,
db_password
,
db_name
) 
or die('conexão falhada'.mysqli_connect_error());

function verify_login() 
{
    if 
    (is_user_logged_in()==1)
    {
        <redirect class="main.page">
        </redirect>;
    }
    else
    {
        echo "";
        <redirect class="login.page">
        </redirect>;
    }
}

function get_enum_values($connection, $table, $column )
{
    $query = " SHOW COLUMNS FROM $table LIKE '$column' ";
    $result = mysqli_query($connection, $query );
    $row = mysqli_fetch_array($result , MYSQLI_NUM );
    $regex = "/'(.*?)'/";
    preg_match_all( $regex , $row[1], $enum_array );
    $enum_fields = $enum_array[1];
    return( $enum_fields );
}

function back_button()
{
    echo "<script type='text/javascript'>document.write("<a href='javascript:history.back()' 
    class='backLink' 
    title='Voltar atr&aacute;
    s'>Voltar atr&aacute;
    s</a>");
    </script>
    <noscript>
    <a href='".$_SERVER['HTTP_REFERER']."
    ‘ class='backLink' title='Voltar atr&aacute;
    s'>Voltar atr&aacute;
    s</a>
    </noscript>";
}

?>