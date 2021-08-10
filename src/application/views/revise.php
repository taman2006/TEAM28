<!doctype html>
<html lang="ja">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

        <title>LINE de 管理</title>

        <!-- sweetalertの読み込み -->
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        
        <!-- style.cssの読み込み -->
        <link rel="stylesheet" href="<?=base_url() ?>public/style.css" type="text/css"/>

        <!-- FontAwesomeの読み込み -->
        <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">

        <!-- Googleフォント読み込み -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@0;1&family=Rancho&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Noto+Sans+JP" rel="stylesheet">

    </head>

    <body>
        <div class="container" style="margin-top:50px;">
        <div class="line-btn">
            <i class="fab fa-line fa-3x my-green"></i>
        </div>
        <h2 class="heading">Revise</h2>
            <form method="post" action="<?= base_url("index.php/kadai/update") ?>">
                <div class="form-group">
                    <label>課題を修正：</label>
                    <input type="text" name="kadai_name" class="form-control" value="<?= html_escape($message_data['kadai_name'] ?? "") ?>" style="max-width:1000px;">
                </div>
            
                <div class="form-group">
                    <label>期日を修正：</label>
                    <input type="text" name="limit_date" class="form-control" value="<?= html_escape($message_data['limit_date'] ?? "") ?>" id="date_sample" style="max-width:1000px;" >
                </div>
                <div class="revise-btn">
                    <button type="button" class="btn btn-success">修正する</button>
                </div>
                <input type="hidden" name="kadai_id" value="<?= html_escape($message_data['id'] ?? "")?>">
                <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
            </form>   
        </div>

            
                
            

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

        <!-- bootstrap-datepickerを読み込む -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>

        <!-- bootstrap-datepickerのjavascriptコード -->
        <script>
            $('#date_sample').datepicker({
                format: 'yyyy-mm-dd'
            });
        
            
                $('.btn-success').on('click', function() {
                var options = {
                    text: '修正しますか？',
                    buttons: {
                        ok: '修正する',
                        cancel: 'キャンセル'
                    }
                };
                swal(options).then(function(value){
                    if(value === 'ok'){
                        $(this).closest('form').submit();
                    }
                }.bind(this));
            });

            </script>
    </body>
</html>
