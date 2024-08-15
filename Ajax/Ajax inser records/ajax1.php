<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table id="main" align="center" border="0" cellspacing  ="0">
        <tr>
            <td id="header">
                <h1>PHP with Ajaz</h1>
            </td>
        </tr>
        <tr>
            <td id="table-load">
                First Name: <input type="text" name="" id="fname">
                Last Name: <input type="text" name="" id="lname">
                <input type="button" id="save-button" value="Load Data">
            </td>
        </tr>
        <tr>
            <td id="table-data">
                <table width="100%" border="1" cellspacing="0" cellpadding="10px">
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                    </tr>
                    <tr>
                        <td align="center" >1</td>
                        <td>Yahoo Baba</td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>

    <script src="load.js"></script>
</body>
</html>