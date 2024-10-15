<?php foreach ($errors ?? [] as $message): ?>
    <span class="text-red-600"><?php echo $message; ?></span>
<?php endforeach; ?>
