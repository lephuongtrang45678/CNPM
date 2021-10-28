<?php include('./template/header.php') ?>

<main>
    <div class="container">
        <h2>Thêm admin</h2>
        <form action = "add_verify.php" method="POST">
            <div class="mb-3">
                <label for="accName" class="form-label">Tên admin</label>
                <input type="text" class="form-control" name='accName'>
            </div>
            <div class="mb-3">
                <label for="accEmail" class="form-label">Email</label>
                <input type="text" class="form-control" name = "accEmail">
            </div>
            <div class="mb-3">
                <label for="accPass" class="form-label">Mật khẩu</label>
                <input type="text" class="form-control" name="accPass">
            </div>
            <div class="mb-3">
            <button type="submit" class="btn btn-success">Lưu lại</button>
            </div>
        </form>
    </div>
</main>

<?php include('template/footer.php') ?>