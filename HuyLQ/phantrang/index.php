
<html>
    <head>
        <title>Phân trang</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <script language="javascript" src="http://code.jquery.com/jquery-2.0.0.min.js"></script>
        <script src="https://code.jquery.com/jquery-1.10.2.js"></script>


    </head>
    <body>
        <button id="pre" onClick="pre()">Prev</button>
        <span id="button"></span>
        <span><button id="next" onClick="next()">Next</button></span>
        <div id="noidung"></div>


        <script language="javascript">
            var currentPage = 1;
            var totalBtn;
            function load_ajax()
            {
                $.ajax({
                    url: 'ketnoi.php',
                    type: 'post',
                    dataType: 'json',
                    data: {
                        page: 1
                    }
                    ,
                    success: function (result) {

                        var html = '';
                        html += '<table border="1" cellspacing="0" cellpadding="10">';
                        html += '<tr>';
                        html += '<td>';
                        html += 'ID';
                        html += '</td>';
                        html += '<td>';
                        html += 'Learn_id';
                        html += '</td>';
                        html += '<tr>';

                        // Kết quả là một object json
                        // Nên ta sẽ loop result
                        $.each(result, function (key, item) {
                            html += '<tr>';
                            html += '<td>';
                            html += item['id'];
                            html += '</td>';
                            html += '<td>';
                            html += item['learn_id'];
                            html += '</td>';
                            html += '<tr>';
                        });

                        html += '</table>';

                        $('#noidung').html(html);

                    }
                });
            }
            function load_ajax2()
            {
                $.ajax({
                    url: 'button.php',
                    type: 'get',
                    dataType: 'json',
                    success: function (result) {
                        totalBtn = result;
                        var html = '';
                        for (var i = 1; i <= totalBtn; i++) {
                            html += '<button id ="' + i + '" onClick="clickBtn(' + i + ')">' + i + '</button>';
                        }
                        ;

                        $('#button').html(html);
                        $('#1').css('background-color', 'blue');
                    }
                });
            }
            load_ajax();
            load_ajax2();
            function clickBtn(e)
            {
                console.log(e);
                currentPage = e;
                for (var i = 1; i <= totalBtn; i++) {
                    $('#' + i + '').css('background-color', 'buttonface');
                }
                $('#' + e + '').css('background-color', 'blue');

                $.ajax({
                    url: 'ketnoi1.php',
                    type: 'post',
                    dataType: 'json',
                    data: {
                        page2: currentPage
                    }
                    ,
                    success: function (result) {

                        var html = '';
                        html += '<table border="1" cellspacing="0" cellpadding="10">';
                        html += '<tr>';
                        html += '<td>';
                        html += 'ID';
                        html += '</td>';
                        html += '<td>';
                        html += 'Learn_id';
                        html += '</td>';
                        html += '<tr>';

                        $.each(result, function (key, item) {
                            html += '<tr>';
                            html += '<td>';
                            html += item['id'];
                            html += '</td>';
                            html += '<td>';
                            html += item['learn_id'];
                            html += '</td>';
                            html += '<tr>';
                        });

                        html += '</table>';

                        $('#noidung').html(html);
                    }
                });
            }
            function next()
            {

                $.ajax({
                    url: 'ketnoi1.php',
                    type: 'post',
                    dataType: 'json',
                    data: {
                        page2: (currentPage + 1)
                    }
                    ,
                    success: function (result) {
                        for (var i = 1; i <= totalBtn; i++) {
                            $('#' + i + '').css('background-color', 'buttonface');
                        }
                        $('#' + (currentPage) + '').css('background-color', 'blue');
                        var html = '';
                        html += '<table border="1" cellspacing="0" cellpadding="10">';
                        html += '<tr>';
                        html += '<td>';
                        html += 'ID';
                        html += '</td>';
                        html += '<td>';
                        html += 'Learn_id';
                        html += '</td>';
                        html += '<tr>';

                        // Kết quả là một object json
                        // Nên ta sẽ loop result
                        $.each(result, function (key, item) {
                            html += '<tr>';
                            html += '<td>';
                            html += item['id'];
                            html += '</td>';
                            html += '<td>';
                            html += item['learn_id'];
                            html += '</td>';
                            html += '<tr>';
                        });

                        html += '</table>';

                        $('#noidung').html(html);

                    }
                });
                //currentPage += 1 ;
                if (currentPage > (totalBtn - 1)) {
                    currentPage = totalBtn;
                } else {
                    currentPage += 1;
                }
                console.log(currentPage);
            }
            function pre()
            {

                $.ajax({
                    url: 'ketnoi1.php',
                    type: 'post',
                    dataType: 'json',
                    data: {
                        page2: (currentPage - 1)
                    }
                    ,
                    success: function (result) {
                        for (var i = 1; i <= totalBtn; i++) {
                            $('#' + i + '').css('background-color', 'buttonface');
                        }
                        $('#' + (currentPage) + '').css('background-color', 'blue');
                        var html = '';
                        html += '<table border="1" cellspacing="0" cellpadding="10">';
                        html += '<tr>';
                        html += '<td>';
                        html += 'ID';
                        html += '</td>';
                        html += '<td>';
                        html += 'Learn_id';
                        html += '</td>';
                        html += '<tr>';

                        // Kết quả là một object json
                        // Nên ta sẽ loop result
                        $.each(result, function (key, item) {
                            html += '<tr>';
                            html += '<td>';
                            html += item['id'];
                            html += '</td>';
                            html += '<td>';
                            html += item['learn_id'];
                            html += '</td>';
                            html += '<tr>';
                        });

                        html += '</table>';

                        $('#noidung').html(html);

                    }
                });

                if (currentPage < 2) {
                    currentPage = 1;
                } else {
                    currentPage -= 1;
                }
                console.log(currentPage);

            }
        </script>


    </body>
<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

