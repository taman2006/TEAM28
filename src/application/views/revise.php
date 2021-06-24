<!doctype html>
<html lang="ja">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

        <link href="/Task_management/Views/css/style.css" rel="stylesheet">

        <title>LINE de 管理</title>

        <!-- sweetalertの読み込み -->
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    </head>

    <body>
        <div class="container" style="margin-top:50px;">
            <h2 class="title" >LINE de 管理</h2>
<<<<<<< HEAD
            <form method="post" action="<?= base_url("index.php/kadai/update") ?>">
                <div class="form-group">
                    <label>課題を修正：</label>
                    <input type="text" name="kadai_name" class="form-control" value="<?= html_escape($message_data['kadai_name'] ?? "") ?>" style="max-width:1000px;">
=======
            <form>
                <div class="form-group">
                    <label>課題を修正：</label>
                    <input type="text" class="form-control" placeholder="課題名" style="max-width:1000px;">
>>>>>>> 2a1b601340b5fd7e44e972d1ecda94142ab23c39
                </div>
            
                <div class="form-group">
                    <label>期日を修正：</label>
<<<<<<< HEAD
                    <input type="text" name="limit_date" class="form-control" value="<?= html_escape($message_data['limit_date'] ?? "") ?>" id="date_sample" style="max-width:1000px;" >
                </div>
                <button type="sumbit" class="btn btn-success">修正する</button>
                <input type="hidden" name="kadai_id" value="<?= html_escape($message_data['id'] ?? "")?>">
=======
                    <input type="text" class="form-control" placeholder="期日を選択" id="date_sample" style="max-width:1000px;" >
                </div>
                <button type="button" class="btn btn-success">修正する</button>    
>>>>>>> 2a1b601340b5fd7e44e972d1ecda94142ab23c39
            </form>   
        </div>

            <script>
                swal("success!", "修正が完了しました！");
            </script>
                
            

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
<<<<<<< HEAD
            $('#date_sample').datepicker({
                format: 'yyyy-mm-dd'
            });
=======
            $('#date_sample').datepicker();
>>>>>>> 2a1b601340b5fd7e44e972d1ecda94142ab23c39
        </script>

    </body>
</html>