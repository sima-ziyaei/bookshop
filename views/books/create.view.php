<?php require base_path("views/partials/head.php"); ?>
<?php require base_path("views/partials/nav.php"); ?>
<?php require base_path("views/partials/banner.php"); ?>


<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <div class="px-4 py-6 sm:px-0">
            <div class="h-96 rounded-lg border-4 border-dashed border-gray-200 p-4">
                <h1>Create a Book</h1>

                <form method="POST">
                    <div>
                        <label for="Book">Book:</p>
                        <input id="Book" class=" border border-solid border-black" name="Book" type="text" value="<?= $_POST['bookname'] ?? '' ?>" />
                        <?php if (isset($errors['book'])) : ?>
                            <p class="text-red-500 text-xs mt-2"><?= $errors['book'] ?></p>
                        <?php endif; ?>
                    </div>
                  
                    <div>
                        <button type="submit">create</button>
                    </div>

                    <a href="/books" class="text-blue-500 hover:underline">back</a>
                </form>
            </div>
        </div>
    </div>
</main>

<?php require base_path("views/partials/footer.php"); ?>