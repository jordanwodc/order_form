<?php
$dbhost = 'localhost:8889';
$dbuser = 'root';
$dbpass = 'root';
$conn = mysql_connect($dbhost, $dbuser, $dbpass);
if(! $conn )
{
    die('Could not connect: ' . mysql_error());
}
$sql = 'SELECT product_name, product_sku, 
               product_description
        FROM product_tbl';

function display_product_list($sql, $conn) {
    mysql_select_db('order_db');
    $retval = mysql_query( $sql, $conn );
    if(! $retval )
    {
        die('Could not get data: ' . mysql_error());
    }
    ?>
    <select>
    <?php
    while($row = mysql_fetch_array($retval, MYSQL_ASSOC)) {?>
        <option value="<?php echo $row['product_sku'] ?>"><?php echo $row['product_name'] ?></option>
    <?php } ?>
    </select>
    <?php
}
display_product_list($sql, $conn);
mysql_close($conn);
?>