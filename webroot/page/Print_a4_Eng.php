<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <link href="../assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <title>Report</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <style>
            .tablesorter {
                font-size: 16px;
                text-align: left;
                font-family: Tahoma, Geneva, sans-serif;
            }

            table tr thead th {
                background-color: #FAFAFA;
                font-size: 12px;
                font-family: sans-serif;
            }

            table tr td {
                font-size: 11px;
                font-family: sans-serif;
            }

            table {
                border-spacing: 0;
            }

            table tr {
                margin-top: 60px;
            }

            .borderless > thead > tr > th, .borderless > tbody > tr > th, .borderless > tfoot > tr > th, .borderless > thead > tr > td, .borderless > tbody > tr > td, .borderless > tfoot > tr > td {
                border: none
            }

            #print_button {
                display: none;
            }

            @media print {
                .page-break { height:0; page-break-before:always; margin-top:40px;}
            }
    </style>

</head>
<body style="margin-left: 10px; margin-right: 10px;" bgcolor="#ffffff">
<table cellpadding="0" cellspacing="0" width="780" border="0" align="left">
    <tr>
        <td valign="top" align="left">
            <script language="javascript">
                <!--
                window.onerror = scripterror;
                function scripterror() {
                    return true;
                }
                varele1 = window.opener.document.getElementById("<?php echo $_REQUEST['selLayer']; ?>");
                text = varele1.innerHTML;
                document.write(text);
                text = document;
                print(text);
                //-->
            </script>
        </td>
    </tr>
</table>
<script>
    $("#ReportTable").attr("border", "1");
    $("#ReportTable").attr("cellpadding", "3");
    $("#ReportTable").attr("cellspacing", "0");
    $("#ReportTable").attr("style", "border-collapse: collapse");
    $("#ReportTable tr").attr("style", "display: show");
</script>
</body>
</html>