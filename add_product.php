<html>
    <head>
        <title>Add New Record in MySQL Database</title>
    </head>
    <body>
        <?php
        if(isset($_POST['add'])) {
            $dbhost = 'localhost:8889';
            $dbuser = 'root';
            $dbpass = 'root';
            $conn = mysql_connect($dbhost, $dbuser, $dbpass);
            if(! $conn ) {
                die('Could not connect: ' . mysql_error());
            }
            if(! get_magic_quotes_gpc() ) {
                $product_name = addslashes ($_POST['name']);
                $product_sku = addslashes ($_POST['sku']);
                $product_description = addslashes ($_POST['description']);
                $product_cost = addslashes ($_POST['cost']);
                $product_wholesale_price = addslashes ($_POST['wholesalePrice']);
                $product_msrp = addslashes ($_POST['msrp']);
            }
            else {
                $product_name = $_POST['name'];
                $product_sku = $_POST['sku'];
                $product_description = $_POST['description'];
            }
            $sql = "INSERT INTO product ".
                   "(name, sku, description) ".
                   "VALUES ".
                   "('$product_name','$product_sku','$product_description')";
            mysql_select_db('order_db');
            $retval = mysql_query( $sql, $conn );
            if(! $retval ) {
                die('Could not enter data: ' . mysql_error());
            }
            echo "Entered data successfully\n";
            mysql_close($conn);
        }
        else {
        ?>
        <form method="post" action="<?php $_PHP_SELF ?>">
            <table width="600" border="0" cellspacing="1" cellpadding="2">
                <tr>
                    <td width="250">Name</td>
                    <td>
                        <input name="name" type="text" id="product">
                    </td>
                </tr>
                <tr>
                    <td width="250">SKU</td>
                    <td>
                        <input name="sku" type="text" id="sku">
                    </td>
                </tr>
                <tr>
                    <td width="250">Description</td>
                    <td>
                        <input name="description" type="text" id="description">
                    </td>
                </tr>
                <tr>
                    <td width="250"> </td>
                </tr>
                <tr>
                    <td width="250">Cost</td>
                    <td>
                        <input name="cost" type="text" id="cost">
                    </td>
                </tr>
                <tr>
                    <td width="250">Wholesale Price</td>
                    <td>
                        <input name="wholesalePrice" type="text" id="wholesalePrice">
                    </td>
                </tr>
                <tr>
                    <td width="250">MSRP</td>
                    <td>
                        <input name="msrp" type="text" id="msrp">
                    </td>
                </tr>
                <tr>
                    <td width="250"> </td>
                    <td>
                        <input name="add" type="submit" id="add" value="Add Product">
                    </td>
                </tr>
            </table>
        </form>
        <?php
        }
        ?>
    </body>
</html>