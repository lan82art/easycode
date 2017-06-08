<?php
session_start();
require_once ('functions.php');
?>

<?php if(empty($_SESSION['error']) && !empty($_SESSION['res'])){
    echo '<p>'.$_SESSION['res'].'</p>';
}

?>
<form action="form8.php" method="post">

    <select name="week">
        <?php
        for ($i=1;$i<=7;$i++){?>
        <option value="<?php echo $i; ?>"><?php echo week($i); ?></option>
       <?php }?>
    </select>
    <?php if(!empty($_SESSION['error']['week'])){
        echo '<span style="color: red;">'.$_SESSION['error']['week'].'</span>';
    }?><br />

    <label><input type="radio" name="gender" value="1"/>Man</label>
    <label><input type="radio" name="gender" value="2"/>Women</label>
    <?php if(!empty($_SESSION['error']['gender'])){
        echo '<span style="color: red;">'.$_SESSION['error']['gender'].'</span>';
    }?><br />
    <textarea name="comment" placeholder="Ваше сообщение"></textarea><br />
    <input type="submit" value="Ok"/>
</form>
