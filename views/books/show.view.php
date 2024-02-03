<?php require base_path("views/partials/head.php"); ?>
<?php require base_path("views/partials/nav.php"); ?>
<?php require base_path("views/partials/banner.php"); ?>

<main>
  <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
    <div class="px-4 py-6 sm:px-0">
      <div class="h-96 rounded-lg border-4 border-dashed border-gray-200 p-4">

        <li>

          <?= htmlspecialchars($book[0]['bookname']) ?>

        </li>

        <p>
        Author:
          <?= htmlspecialchars($book[0]['author']) ?>

        </p>
        <p>
        Price:
          <?= htmlspecialchars($book[0]['price']) ?>

        </p>
        <p>
        publishyear:
          <?= htmlspecialchars($book[0]['publishyear']) ?>

        </p>

        <p>
        inventory:
          <?= htmlspecialchars($book[0]['inventory']) ?>

        </p>
        <!-- <ol> -->
        <!-- <?php if ($translation) : ?>  -->

        <!-- <p>translations:</p> -->
        <!-- <?php endif ?> -->
        <!-- <?php foreach ($translation as $trans) : ?> -->

        <!-- <li> -->
        <!-- <?= htmlspecialchars($trans["translation"]) ?> -->
        <!-- </li> -->
        <!-- <?php endforeach ?>  -->
        <!-- </ol> -->
        <!-- <form method="POST">
          <div>
            <lable for="translation">translation:</p>
              <textarea required id="translation" class="border border-solid border-black" name="translation"></textarea>
          </div>
          <button type="submit">create</button>
        </form> -->

        <footer class="mt-6">
          <a class="text-gray-500 border border-gray-500 border-solid px-3 py-2 rounded " href="/book/edit?id=<?= $book[0]['id'] ?>">Edit</a>
          <a class="text-gray-500 border border-gray-500 border-solid px-3 py-2 rounded " href="/book/order?id=<?= $book[0]['id'] ?>">Order</a>
      
        </footer>

        <form method="POST" class="mt-6">
          <input type="hidden" name="_method" value="DELETE" />
          <input type="hidden" name="id" value="<?= $book['id'] ?>" />
          <button class="text-sm text-red-500">Delete</button>
        </form>
        <P> <?= $errors['permission'] ?> </P>


        <a href="/books" class="text-blue-500 hover:underline">back</a>

      </div>
    </div>
  </div>
</main>

<?php require base_path("views/partials/footer.php"); ?>