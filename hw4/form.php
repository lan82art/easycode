<?php
 session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>HomeWork 4</title>
    <script src="../vendor/components/jquery/jquery.min.js"></script>
    <script src="../vendor/twbs/bootstrap/dist/js/bootstrap.js"></script>
    <link rel="stylesheet" href="../vendor/twbs/bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" href="../css/global.css">
    <link rel="stylesheet" href="../css/side_menu.css">

</head>
<body>
<div class="wrap">
    <div class="container-fluid">
        <nav class="navbar navbar-inverse" role="navigation">
            <div class="container">
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                </div>
            </div>
        </nav>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <form method="post" action="hw4.php">
                    <?php if(empty($_SESSION['error']['name'])){?>
                    <div class="form-group">
                        <label for="Name">Your name</label>
                        <input type="text" class="form-control" id="Name" placeholder="Your name" name="name" value="<?php if(!empty($_SESSION['res']['name']))echo $_SESSION['res']['name']?>">
                    </div>
                    <?php }else {?>
                    <div class="form-group">
                        <label for="Name">Your name</label>
                        <input type="text" class="form-control alert-danger" id="Name" placeholder="Your name" name="name">
                        <div class="alert-danger"><p><?php echo $_SESSION['error']['name']; ?></p></div>
                    </div>
                    <?php } ?>
                    <?php if(empty($_SESSION['error']['email'])){?>
                    <div class="form-group">
                        <label for="Email">Email address</label>
                        <input type="text" class="form-control" id="Email" placeholder="Email" name="email" value="<?php if(!empty($_SESSION['res']['email']))echo $_SESSION['res']['email']?>">
                    </div>
                    <?php }else {?>
                    <div class="form-group">
                        <label for="Email">Email address</label>
                        <input type="text" class="form-control alert-danger" id="Email" placeholder="Email" name="email">
                        <div class="alert-danger"><p><?php echo $_SESSION['error']['email']; ?></p></div>
                    </div>
                    <?php } ?>
                    <?php if(empty($_SESSION['error']['date'])){?>
                    <div class="form-group">
                                <div class="col-xs-4">
                                    <label for="year">Year</label>
                                    <select id="year" class="form-control" name="year">
                                        <?php
                                        for($i=1982; $i<=2017; $i++) {
                                            if(!empty($_SESSION['res']['year']) && $_SESSION['res']['year'] == $i){
                                                echo '<option selected value="'.$i.'">'.$i.'</option>';
                                            }else{
                                                echo '<option value="'.$i.'">'.$i.'</option>';
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-xs-4">
                                    <label for="month">Month</label>
                                    <select id="month" class="form-control" name="month" >
                                        <?php
                                        $month = array('Январь','Февраль','Март','Апрель','Май','Июнь','Июль','Август','Сентябрь','Октябрь','Ноябрь','Декабрь');
                                        for($i=1; $i<=12; $i++) {
                                            if (!empty($_SESSION['res']['month']) && $_SESSION['res']['month'] == $i) {
                                                echo '<option selected value="' . $i . '">' . $month[$i - 1] . '</option>';
                                            } else {
                                                echo '<option value="' . $i . '">' . $month[$i - 1] . '</option>';
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-xs-4">
                                    <label for="day">Day</label>
                                    <select id="day" class="form-control" name="day">
                                        <?php
                                        for($i=1; $i<=31; $i++) {
                                            if (!empty($_SESSION['res']['day']) && $_SESSION['res']['day'] == $i) {
                                                echo '<option selected value="' . $i . '">' . $i . '</option>';
                                            }else {
                                                echo '<option value="' . $i . '">' . $i . '</option>';
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                    </div>
                    <?php }else {?>
                    <div class="form-group">
                        <div class="col-xs-4">
                            <label for="year">Year</label>
                            <select id="year" class="form-control alert-danger" name="year">
                                <?php
                                for($i=1982; $i<=2017; $i++) {
                                    echo '<option value="'.$i.'">'.$i.'</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-xs-4">
                            <label for="month">Month</label>
                            <select id="month" class="form-control alert-danger" name="month" >
                                <?php
                                $month = array('Январь','Февраль','Март','Апрель','Май','Июнь','Июль','Август','Сентябрь','Октябрь','Ноябрь','Декабрь');
                                for($i=1; $i<=12; $i++) {
                                    echo '<option value="'.$i.'">'.$month[$i-1].'</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-xs-4">
                            <label for="day">Day</label>
                            <select id="day" class="form-control alert-danger" name="day">
                                <?php
                                for($i=1; $i<=31; $i++) {
                                    echo '<option value="'.$i.'">'.$i.'</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                        <div class="alert-danger"><p><?php echo $_SESSION['error']['date']; ?></p></div>
                    <?php } ?>
                    <div class="row">
                        <div class="col-xs-12"></div>
                    </div>
                    <?php if(empty($_SESSION['error']['gender'])){?>
                    <div class="radio">
                        <label>
                            <input type="radio" name="gender" value="1" <?php if(!empty($_SESSION['gender_id']) && $_SESSION['gender_id'] == 1) echo 'checked';?>> Male
                        </label>
                        <label>
                            <input type="radio" name="gender" value="2" <?php if(!empty($_SESSION['gender_id']) && $_SESSION['gender_id'] == 2) echo 'checked';?>> Female
                        </label>
                    </div>
                    <?php } else { ?>
                        <div class="radio alert-danger">
                            <label>
                                <input  type="radio" name="gender" value="1" <?php if(!empty($_SESSION['gender_id']) && $_SESSION['gender_id'] == 1) echo 'checked';?>> Male
                            </label>
                            <label>
                                <input  type="radio" name="gender" value="2" <?php if(!empty($_SESSION['gender_id']) && $_SESSION['gender_id'] == 2) echo 'checked';?>> Female
                            </label>
                          </div>
                        <div class="alert-danger"><p><?php echo $_SESSION['error']['gender']; ?></p></div>
                    <?php }?>
                    <?php if(empty($_SESSION['error']['text'])){?>
                    <div class="form-group">
                        <label for="text">Enter some text here</label>
                        <textarea class="form-control" rows="3" name="text" id="text"><?php if(!empty($_SESSION['res']['text']))echo $_SESSION['res']['text']?></textarea>
                    </div>
                    <?php }else { ?>
                        <div class="form-group">
                            <label for="text">Enter some text here</label>
                            <textarea class="form-control alert-danger" rows="3" name="text" id="text"></textarea>
                        </div>
                        <div class="alert-danger"><p><?php echo $_SESSION['error']['text']; ?></p></div>
                    <?php }?>

                    <button type="submit" name="submit" class="btn btn-default">Submit</button>
                    <?php  if(empty($_SESSION['error']) && !empty($_SESSION['res'])){?>
                        <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#Answers">
                        Показать ответы
                        </button>
                        <?php
                    }
                    ?>
                </form>
            </div>
            <div class="modal fade" tabindex="-1" role="dialog" id="Answers">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Ваши данные</h4>
                        </div>
                        <div class="modal-body">
                            <p>Ваше имя: <?php if(!empty($_SESSION['res']['name']))echo $_SESSION['res']['name']?></p>
                            <p>Ваш email: <?php if(!empty($_SESSION['res']['email']))echo $_SESSION['res']['email']?></p>
                            <p>Ваша дата рождения: <?php if(!empty($_SESSION['res']['year']) && !empty($_SESSION['res']['month']) && !empty($_SESSION['res']['day'])){
                                echo $_SESSION['res']['year'].'/'.$_SESSION['res']['month'].'/'.$_SESSION['res']['day'];}?></p>
                            <p>Ваш пол: <?php if(!empty($_SESSION['res']['gender']))echo $_SESSION['res']['gender']?></p>
                            <p>Ваше сообщение : <?php if(!empty($_SESSION['res']['text2']))echo $_SESSION['res']['text2']?></p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
        </div>
    </div>
</div>
<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-xs-4">
                <p class="pull-left"><span class="glyphicon glyphicon-copyright-mark"></span> Artem 2017</p>
            </div>
        </div>
    </div>
</footer>

</body>
</html>