<h2>Chi tiết user</h2>
<p><?php if (isset($_SESSION['message'])) {echo $_SESSION['message']; unset($_SESSION['message']);} ?></p>
<p>Tên: <?php echo $user['name'] ?></p>
<p>Email: <?php echo $user['email'] ?></p>
<p>Adrdess: <?php echo $user['address'] ?></p>
