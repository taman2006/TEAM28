<!doctype html>
<html lang="ja">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

        <link href="/Task_management/Views/css/style.css" rel="stylesheet">

        <!-- sweetalertの読み込み -->
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    </head>

<body>
    <div class="container" style="margin-top:50px;">
        <h2>LINE de 管理</h2>
        <form>
            <div class="form-group">
                <label>課題を登録：</label>
                <input type="text" class="form-control" placeholder="課題名" style="max-width:1000px;">
            </div>

            <div class="form-group">
                <label>期日：</label>
                <input type="text" class="form-control"  placeholder="期日を選択" id="date_sample" style="max-width:1000px;">
            </div>
            <button type="button" class="btn btn-success">登録する</button>
        </form>


        <h2 style="margin-top:50px;">課題リスト</h2>
        <table class="table table-striped" style="max-width:1000px; margin-top:20px;">

    <tbody>
        <tr>
            <td>2021.06.01</td>
            <td>課題内容</td>
            <td><form action="edit" method="get">
                <button type="submit" class="btn btn-secondary">編集</button>
            </form>
            </td>

            <!-- 削除ボタン -->
            <td><form action="" method="post">
                <button type="button" class="btn btn-dark btn-delete">削除</button>
            </form>
            </td>



        </tr>

        <tr>
            <td>2021.06.05</td>
            <td>テストです</td>
            <td><form action="" method="get">
                <button type="submit" class="btn btn-secondary">編集</button>
            </form>
            </td>

            <!-- 削除ボタン -->
            <td><form action="" method="post">
            <button type="button" class="btn btn-dark btn-delete">削除</button>
            </form>
            </td>
        </tr>

            <tr>
                <td>2021.06.08</td>
                <td>てすとてすと</td>
                <td><form action="" method="get">
                    <button type="submit" class="btn btn-secondary">編集</button>
                </form>
                </td>

                <!-- 削除ボタン -->
                <td><form action="" method="post">
                <button type="button" class="btn btn-dark btn-delete">削除</button>
                </form>
                </td>
            </tr>


    </tbody>
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
            $('#date_sample').datepicker();

            $('.btn-delete').on('click', function(e) {
                var options = {
                    text: '削除しますか？',
                    buttons: {
                        ok: '削除する',
                        cancel: 'キャンセル'
                    }
                };
                swal(options).then(function(value){
                    if(value){

                    }
                });
            });
        </script>
    </body>
</html>
