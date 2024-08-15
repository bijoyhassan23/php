<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        body{
            margin: 0;
            padding: 0;
        }
        #modal{
            position: fixed;
            top: 0;
            left: 0;
            background: rgba(0, 0, 0, 0.5);
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100vw;
            height: 100vh;
            transition: 0.3s;
        }
        #modal[active-status="false"]{
            opacity: 0;
            pointer-events: none;
        }
        div#modal-from{
            background: white;
            padding: 20px;
            border-radius: 10px;
            position: relative;
        }

        #close-modal{
            position: absolute;
            right: 0;
            aspect-ratio: 1 / 1;
            background: red;
            top: 0;
            border-radius: 50%;
            padding: 10px;
            height: 20px;
            width: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            transform: translate(50%, -50%);
            cursor: pointer;
        }
    </style>
</head>
<body>
    <table id="main" align="center" border="0" cellspacing  ="0">
        <tr>
            <td id="header">
                <h1>PHP with Ajaz</h1>
            </td>
            <td align="right" id="header">
                <h5>Search</h5>
                <input type="text" id="search">
            </td>
        </tr>
        <tr >
            <td colspan="2" id="table-load">
                First Name: <input type="text" name="" id="fname">
                Last Name: <input type="text" name="" id="lname">
                <input type="button" id="save-button" value="Save Data">
            </td>
        </tr>
        <tr>
            <td colspan="2" id="table-data">
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



    <div id="modal" active-status="false">
        <div id="modal-from">
            <span id="close-modal">X</span>
            <h2>Edit From</h2>
            
            <table>
                <tr>
                    <td>Frist Name</td>
                    <td><input type="text" id="edit-fname"></td>
                </tr>
                <tr>
                    <td>Last Name</td>
                    <td><input type="text" id="edit-lname"></td>
                </tr>
                <tr>
                    <td align="right" colspan="2"><input width="100%" type="button" id="edit-save-btn" value="Save"></td>
                </tr>
            </table>
        </div>
    </div>

    <script src="load.js"></script>
</body>
</html>