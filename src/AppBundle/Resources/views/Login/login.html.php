<?php
/**
 * Created by PhpStorm.
 * User: molnar.mate
 * Date: 2017.10.18.
 * Time: 15:19
 */
declare(strict_types=1);

if ($error): ?>
    <div><?php echo $error->getMessage() ?></div>
<?php endif ?>

<form action="<?php echo $view['router']->path('login_check') ?>" method="post">
    <label for="username">Username:</label>
    <input type="text" id="username" name="_username" value="<?php echo $lastName ?>" />

    <label for="password">Password:</label>
    <input type="password" id="password" name="_password" />


        <input type="hidden" name="_target_path" value="<?php echo $view['router']->path('homepage') ?>" />

    <button type="submit">login</button>
</form>