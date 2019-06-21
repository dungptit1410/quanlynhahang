<h2>Sửa user</h2>
<p><?php if (isset($_SESSION['message'])) {echo $_SESSION['message']; unset($_SESSION['message']);} ?></p>
<form action="index.php?controller=users&action=update&id=<?php echo $user['id'] ?>" method="post">
    <table>
        <tr>
            <td>
                Name:
            </td>
            <td>
                <input type="text" name="name" value="<?php echo $user['name'] ?>">
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
                <input type="text" name="email" value="<?php echo $user['email'] ?>">
            </td>
            <td>
                <?php if(isset($errors['email_err'])){ ?>
                    <p><?php echo $errors['email_err'] ?></p>
                <?php } ?>
            </td>
        </tr>
        <tr>
            <td>
                address:
            </td>
            <td>
                <input type="text" name="address" value="<?php echo $user['address'] ?>">
            </td>
        </tr>
        <tr>
            <td>
                Password:
            </td>
            <td>
                <input type="password" name="password" value="<?php echo $user['password'] ?>">
            </td>
            <td>
                <?php if(isset($errors['password_err'])){ ?>
                    <p><?php echo $errors['password_err'] ?></p>
                <?php } ?>
            </td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" value="Sửa"></td>
        </tr>
    </table>
</form>
