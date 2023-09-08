<?php @include_once("./partials/head.php") ?>

<div class="container" id="container">
  <div>
    <?php

    $path = "posts/post.json";
    $data = file_get_contents($path);
    $posts = json_decode($data, true);

    ?>

    <?php

    if (!is_file($path)) {
      echo "<p>No such photos</p>";
    }

    ?>

    <?php if (is_file($path)) : ?>

      <?php foreach ($posts as $post) : ?>

        <div class="img-card animate__animated animate__fadeIn">
          <p class="img-card-title"><?= $post["name"] ?></p>
          <img class="img" src="<?= $post["image"] ?>" alt="">
          <a href="./delete.php?id=<?= $post["id"] ?>" class="delete">Delete</a>
        </div>

      <?php endforeach; ?>

    <?php endif; ?>

  </div>
</div>

<?php @include_once("./partials/footer.php") ?>