<!doctype html>
<html lang="ja">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

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

        <h4 class="user">
            
            <?php if (!empty($_SESSION['picture'])): ?>
                <img src="<?php echo $_SESSION['picture']; ?>" alt="プロフィール画像">
                ようこそ! <?php echo $_SESSION['name']; ?>さん
            
            <?php else : ?>
                <img src="../../public/images/icon-default-user.png" alt="プロフィール画像">
                ようこそ! <?php echo $_SESSION['name']; ?>さん
            <?php endif; ?>

        </h4>
        <div class="container" style="margin-top:50px;">
            <div class="line-btn">
                <i class="fab fa-line fa-3x my-green"></i>
            </div>
            <h2 class="heading">Task Management</h2>

            <form action="<?= base_url('index.php/kadai/add_kadai') ?>" method="post">
                <div class="form-group">
                    <?php if (!empty($success_message)): ?>
                        <script>
                            swal("success!", "<?php echo html_escape($success_message); ?>");
                        </script>
                    <?php endif; ?>
                    <?php $all_message = null; ?>
                    <?php if (!empty($error_message)): ?>
                        <ul class="error_message">
                            <?php foreach ($error_message as $message): ?>
                                <?php $all_message = $all_message.$message.'\n'; ?>
                            <?php endforeach; ?>
                            <script>
                                swal("error!", "<?php echo html_escape($all_message); ?>");
                            </script>        
                        </ul>
                    <?php endif; ?>
                    <label>課題を登録：</label>
                    <input type="text" class="form-control" name="kadai_name" placeholder="課題名" style="max-width:1000px;">
                </div>

                <div class="form-group">
                    <label>期日：</label>
                    <input type="text" class="form-control"  name="limit_date" placeholder="期日を選択" id="date_sample" style="max-width:1000px;">
                </div>
                <div class="touroku-btn">
                    <button type="submit" class="btn btn-success">登録する</button>
                </div>
                <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
            </form>
            <div class="tasklist">
                <h2 class="heading">Task List</h2>
            </div>
            <table class="table table-striped" style="max-width:1000px; margin-top:20px;">

            <thead>
                <tr>
                    <th>期限</th>
                    <th nowrap>課題内容</th>
                </tr>
            </theadv>
        
            <tbody>
                <?php if (!empty($message_array)): ?>
                    <?php foreach( $message_array as $value ): ?>
                        <tr>
                            <td><?= html_escape(date('n/d', strtotime($value['limit_date']))) ?></td>
                            <td><?= html_escape($value['kadai_name']) ?></td>
                            <td>
                                <form action="<?= base_url('index.php/kadai/revise') ?>" method="post">                   
                                    <button type="submit" class="btn btn-secondary">編集</button>
                                    <input type="hidden" name="kadai_id" value="<?= html_escape($value['id'] ?? "") ?>">
                                    <input type="hidden" name="limit_date" value="<?= html_escape($value['limit_date'] ?? "") ?>">
                                    <input type="hidden" name="kadai_name" value="<?= html_escape($value['kadai_name'] ?? "") ?>">

                                </form>
                            </td>
                            <!-- 削除ボタン -->
                            <td>
                                <form action="<?= base_url('index.php/kadai/delete_bbs') ?>" method="post">
                                    <button type="button" class="btn btn-dark btn-delete">削除</button>
                                    <input type="hidden" name="kadai_id" value="<?= html_escape($value['id'] ?? "") ?>">
                                    <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
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
            $('#date_sample').datepicker({
                format: 'yyyy-mm-dd'
            });
        </script>
        <!-- sweetalertのjavascriptコード -->
        <script>
            // swal("success!", "修正が完了しました！");

            $('.btn-delete').on('click', function() {
                var options = {
                    text: '削除しますか？',
                    buttons: {
                        ok: '削除する',
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
