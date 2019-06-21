<h2>Thêm mới user</h2>
<p><?php if (isset($_SESSION['message'])) {echo $_SESSION['message']; unset($_SESSION['message']);} ?></p>
<form action="index.php?controller=users&action=store" method="post">
    <table class="table table-bordered">
        <tr>
            <td>
                Name:
            </td>
            <td>
                <input type="text" name="name" value="<?php echo @$data['name'] ?>">
            </td>
            <td>
                <?php if(isset($errors['name_err'])){ ?>
                    <p><?php echo $errors['name_err'] ?></p>
                <?php } ?>
            </td>
        </tr>
        <tr>
            <td>
                Email:
            </td>
            <td>
                <input type="text" name="email" value="<?php echo @$data['email'] ?>">
            </td>
            <td>
                <?php if(isset($errors['email_err'])){ ?>
                    <p><?php echo @$errors['email_err'] ?></p>
                <?php } ?>
            </td>
        </tr>
        <tr>
            <td>
                address:
            </td>
            <td>
                <input type="text" name="address" value="<?php echo @$data['address'] ?>">
            </td>
        </tr>
        <tr>
            <td>
                Password:
            </td>
            <td>
                <input type="password" name="password" value="<?php echo @$data['password'] ?>">
            </td>
            <td>
                <?php if(isset($errors['password_err'])){ ?>
                    <p><?php echo $errors['password_err'] ?></p>
                <?php } ?>
            </td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" value="Thêm"></td>
        </tr>
    </table>
</form>
