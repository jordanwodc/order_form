<?php
$dbhost = 'localhost:8889';
$dbuser = 'root';
$dbpass = 'root';
$conn = mysql_connect($dbhost, $dbuser, $dbpass);
if(! $conn )
{
    die('Could not connect: ' . mysql_error());
}
$sql = 'SELECT name, sku, 
               description
        FROM product';

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
        <option value="<?php echo $row['sku'] ?>"><?php echo $row['name'] ?></option>
    <?php } ?>
    </select>
    <?php
}
display_product_list($sql, $conn);
mysql_close($conn);
?>