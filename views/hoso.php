<style>
    .hoso {
        background: #edfaff;
        border-radius: 8px;
        border: 1px solid #00a1ff;
        width: fit-content;
        display: flex;
        gap: 35px;
        margin: 0px auto;
        padding: 20px 35px;
        justify-content: center;
    }

    .hoso1 {
        height: fit-content;
    }

    .hoso2 {
        width: 250px;
        display: flex;
        flex-direction: column;

        label {
            padding: 10px 0;
            text-align: left;
            color: #00a1ff;
        }

        input {
            padding: 8px 15px;
            border-radius: 3px;
            outline: none;
            border: 1px solid #00a1ff;
            text-align: left;
        }
    }

    .btn-hoso {
        padding: 20px 0 0 0;

        button {
            padding: 7px 15px;
            border: none;
            cursor: pointer;
            color: white;
            border-radius: 7px;
        }

        a {
            font-size: 14px;
            padding: 7px 15px;
            border: none;
            cursor: pointer;
            color: white;
            background: red;
            border-radius: 7px;
        }
    }

    .btn-avt {

        button {
            padding: 3px 8px;
            border: none;
            cursor: pointer;
            color: white;
            border-radius: 7px;
        }

        a {
            font-size: 14px;
            padding: 3px 8px;
            border: none;
            cursor: pointer;
            color: white;
            background: red;
            border-radius: 7px;
        }
    }

    .overlay {
        display: flex;
        flex-direction: column;
        justify-content: center;
        margin: 0 auto;
        width: 180px;
        height: 220px;
        position: absolute;
        top: 49.5%;
        left: 50%;
        transform: translate(-50%, -50%);
        opacity: 0;
        text-align: center;
        color: #fff;
        cursor: pointer;
    }

    .overlay i {
        font-size: 24px;
        margin-bottom: 8px;
    }

    .hoso1:hover .overlay {
        opacity: 1;
        background-color: rgba(0, 0, 0, 0.4);
    }

    .image-wrapper {
        position: relative;
    }
</style>

<?php require_once './views/sidebar.php' ?>
<div style="text-align: center;">
    <h1 style="padding: 40px 0 20px 0; color: #00a1ff;">HỒ SƠ NGƯỜI DÙNG</h1>
    <div class="hoso">
        <div>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="hoso1">
                    <div class="image-wrapper">
                        <img id="oldImg" class="imgAvatar" src="./img/<?= $getProfile[0][2] ?>"
                            style="width: 180px; height: 220px; margin:5px 0; border-radius: 3px; cursor: pointer;"
                            alt="">
                        <div class="overlay" id="avatar-preview">
                            <i class="fas fa-camera"></i>
                            <p style="font-size: 14px;">Thay đổi ảnh đại diện</p>
                        </div>
                        <input class="changeAvatar" type="file" accept="image/*" name="hinhAvt" hidden>
                    </div>
                </div>
                <div class="btn-avt">
                    <a href="http://localhost/quanlikho/?controller=admin&action=hoso">HUỶ</a>
                    <button type="submit" name="updateAvatar" style="background: seagreen">CẬP NHẬT</button>
                </div>
            </form>
        </div>
        <form action="" method="post">
            <div class="hoso2" method="post">
                <label for="">Tên tài khoản</label>
                <input type="text" readonly value="<?= $getProfile[0][3] ?>">
                <label for="">Họ & tên</label>
                <input type="text" name="hoten" value="<?= $getProfile[0][1] ?>">
                <label for="">Mật khẩu cũ</label>
                <input type="password" name="matKhauCu">
                <label for="">Mật khẩu mới</label>
                <input type="password" name="matKhauMoi">
                <label for="">Nhập lại mật khẩu mới</label>
                <input type="password" name="nhapLaiMK">

                <div class="btn-hoso">
                    <a href="http://localhost/quanlikho/?controller=admin&action=hoso">HUỶ</a>
                    <button type="submit" style="background: seagreen" name="profile-save">CẬP NHẬT</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    const imgForm = document.querySelector('.image-wrapper');
    const imgAvatar = document.querySelector('.imgAvatar');

    const changeAvatar = document.querySelector('.changeAvatar');

    imgForm.addEventListener('click', () => {
        changeAvatar.click();
    });
    changeAvatar.addEventListener('change', (event) => {
        const file = event.target.files[0];
        const imageUrl = URL.createObjectURL(file);
        imgAvatar.src = imageUrl;
    });

</script>