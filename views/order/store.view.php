<?php require base_path("views/partials/head.php"); ?>
<?php require base_path("views/partials/nav.php"); ?>
<?php require base_path("views/partials/banner.php"); ?>


<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <div class="px-4 py-6 sm:px-0">
            <div class="h-96 rounded-lg border-4 border-dashed border-gray-200 p-4">
                <h1>Edit Book</h1>

                <form method="POST" action="/book">
                    <!-- <input type="hidden" name="_method" value="PATCH" /> -->
                    <input type="hidden" name="id" value="<?= $book[0]['id'] ?>" />
                    <div>
                        <label for="book">count:</p>
                        <input id="book" class=" border border-solid border-black" max="<?= $book[0]['inventory'] ?>" name="book" type="number" value="<?= $book[0]['bookname'] ?>" />
                    </div>
                    <p class="text-red-500"><?= $errors['book'] ?></p>
                  
                    <div class="flex gap-6">
                        <a href="/books">Cancel</a>
                        <button type="submit">Order</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>

<?php require base_path("views/partials/footer.php"); ?>