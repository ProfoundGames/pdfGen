<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<?php
    include '/classes/createPDF.php';
    include '/classes/prince/prince.php';
    
    $prince = new Prince('D:\Development\PHP\installedProgram\Engine\bin\prince.exe');
    
    $filename = date("YmdHis");
    
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="/css/default.css">
        <link rel="stylesheet" href="/css/materialize.min.css">
        <link rel="stylesheet" href="/classes/ckeditor/contents.css">
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
        
        <script src="/js/jquery-2.1.4.min.js"></script>
        <script src="/js/materialize.min.js"></script>
        <script src="/classes/ckeditor/ckeditor.js"></script>
        
    </head>
    <body class="grey lighten-5">
        <div class="container">
            <?php
            
            if (!empty(filter_input(INPUT_POST, 'PDFEditor'))) {
                if ($prince->convert_string_to_file(filter_input(INPUT_POST, 'PDFEditor'), $filename . '.pdf')) {
                    header('Location: '. '/' . $filename . '.pdf');
                }
            }
                
            ?>
            <form method="POST" name="form" id="form">
                <div class="col s12"> <textarea class="ckeditor" name="PDFEditor"></textarea></div>
            
                <center>
                    <input type="submit" class="btn btn-success create" value="Submit" name="submit">       
                </center>
            </form>
        </div>
        <div class="fixed-action-btn">
            
            <a class="btn-floating btn-large waves-effect waves-light red newDock" onclick="location.reload();"><i class="mdi-action-autorenew"></i></a>
            
        </div>
    </body>
</html>
