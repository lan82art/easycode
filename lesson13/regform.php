        <div class="row">
            <div class="col-xs-12">
                <form method="post" action="action_register.php">
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

                    <?php if(empty($_SESSION['error']['pass'])){?>
                        <div class="form-group">
                            <label for="Pass">Password</label>
                            <input type="password" class="form-control" id="Pass" placeholder="Password" name="pass" >
                            <label for="Pass2">Repeat password</label>
                            <input type="password" class="form-control" id="Pass2" placeholder="Repeat password" name="pass2" >
                        </div>
                    <?php }else {?>
                        <div class="form-group">
                            <label for="Pass">Password</label>
                            <input type="password" class="form-control alert-danger" id="Pass" placeholder="Password" name="pass" >
                            <label for="Pass2">Repeat password</label>
                            <input type="password" class="form-control alert-danger" id="Pass2" placeholder="Repeat password" name="pass2" >
                            <div class="alert-danger"><p><?php echo $_SESSION['error']['pass']; ?></p></div>
                        </div>
                    <?php } ?>

                    <?php if(empty($_SESSION['error']['email'])){?>
                        <div class="form-group">
                            <label for="Email">Email address</label>
                            <input type="text" class="form-control" id="Email" placeholder="Email" name="email" value="<?php echo !empty($_SESSION['res']['email']) ? $_SESSION['res']['email'] : ''?>">
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

                    <?php if($_GET['action'] == 'edit'){ ?>
                            <button type="submit" name="update" class="btn btn-default">Обновить</button>
                    <?php    } elseif($_GET['action'] == 'register') { ?>
                            <button type="submit" name="regsubmit" class="btn btn-default">Подтвердить</button>
                    <?php } ?>
                </form>
            </div>
        </div>