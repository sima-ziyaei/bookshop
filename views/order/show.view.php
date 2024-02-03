<?php require base_path("views/partials/head.php"); ?>
<?php require base_path("views/partials/nav.php"); ?>
<?php require base_path("views/partials/banner.php"); ?>


<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <div class="px-4 py-6 sm:px-0">
            <div class="h-96 rounded-lg border-4 border-dashed border-gray-200 p-4">
                <?php foreach ($res as $order) : ?>
                    <li>
                      <p> count: <?= htmlspecialchars($order['count']) ?> </p>     
                      <p>user name : <?= htmlspecialchars($order['name']) ?> </p> 
                      <p> book name : <?= htmlspecialchars($order['bookname']) ?> </p>    
                    </li>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</main>

<?php require base_path("views/partials/footer.php"); ?>