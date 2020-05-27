<html>
<head>
</head>
<body>
<table width="700px">
    <tr><td>&nbsp;</td></tr>
    <tr><td><img src="{{ asset('img/logo.png') }}"/> </td></tr>
    <tr><td>&nbsp;</td></tr>
    <tr><td>Hello, Administration</td></tr>
    <tr><td>&nbsp;</td></tr>
    <tr><td>Новая заявка на покупку товара</td></tr>
    <tr><td>&nbsp;</td></tr>
    <tr>
        <td>
            <table width="95%" cellpadding="5" cellspacing="5" bgcolor="#cccccc">
                <tr>
                    <td>Product Name</td>
                    <td>Product Price</td>
                </tr>
                <tr>
                    <td>{{ $productDetails['product_name'] }}</td>
                    <td>{{ $productDetails['price'] }}</td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td>
            <table width="100%">
                <tr>
                    <td width="50%">
                        <table>
                            <tr>
                                <td>Данные Покупателя: </td>
                            </tr>
                            <tr>
                                <td>Имя покупателя: {{ $userDetails['name'] }}</td>
                            </tr>
                            <tr>
                                <td>Email покупателя: {{ $userDetails['email'] }}</td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
</body>
</html>

<?php
Session::forget('product_name');
?>
