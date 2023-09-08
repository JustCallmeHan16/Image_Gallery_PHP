<?php @include_once("./partials/head.php") ?>

<div class="con-box">
    <form action="./server.php" method="post" enctype="multipart/form-data">
        <div class="input-box">
            <label class="label-title">Image Upload</label>
            <input class="form-control" name="name" type="text" placeholder="image name">
        </div>
        <div class="input-box">
            <input class="form-control" name="image" type="file">
        </div>
        <?php @include_once("./error.php") ?>
        <button type="submit" class="submit">Submit</button>
    </form>
</div>

<?php @include_once("./partials/footer.php") ?>