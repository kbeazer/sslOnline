<?php foreach ($user as $users): ?>

    <h3>Name: <?php echo $users['userName'] ?></h3>
    <div class="main">
        <?php echo $users['email'] ?>
    </div>
    <p><a href="#">View User Password</a></p>

<?php endforeach ?>