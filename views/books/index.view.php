<?php require base_path("views/partials/head.php"); ?>
<?php require base_path("views/partials/nav.php"); ?>
<?php require base_path("views/partials/banner.php"); ?>

<main>
  <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
    <div class="px-4 py-6 sm:px-0">
      <form method="POST" action="/books">
        <input  class=" border border-solid border-black" id="search" name="search" type="text" placeholder="search" />
        <button type="submit">search</button>
      </form>
      <div class="h-96 rounded-lg border-4 border-dashed border-gray-200 p-4">
        <? if ($result ?? false) : ?>
          <p>search result:</p>
          <?php foreach ($result as $res) : ?>
          <li>
            <a href="/book?id=<?= $res['id'] ?>" class="text-blue-500 hover:underline">
              <?= htmlspecialchars($res['bookname']) ?>
            </a>
          </li>
        <?php endforeach; ?>
        <? else : ?>
           <?php foreach ($books as $book) : ?>
          <li>
            <a href="/book?id=<?= $book['id'] ?>" class="text-blue-500 hover:underline">
              <?= htmlspecialchars($book['bookname']) ?>
            </a>
          </li>
        <?php endforeach; ?>
        <? endif; ?>
       

        <a class="mt-8 text-blue-500 hover:underline " href="/books/create">create book</a>
      </div>
    </div>
  </div>
</main>

<?php require base_path("views/partials/footer.php"); ?>