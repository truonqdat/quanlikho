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
    }
</style>

<?php require_once './views/sidebar.php' ?>
<div style="text-align: center;">
    <h1 style="padding: 40px 0 20px 0; color: #00a1ff;">HỒ SƠ NGƯỜI DÙNG</h1>
    <div class="hoso">
        <div class="hoso1">
            <img class="imgAvatar" src="https://upload.wikimedia.org/wikipedia/vi/a/a7/HarryPotter5.jpg"
                style="width: 180px; height: 220px; margin:5px 0; border-radius: 3px; cursor: pointer;" alt="">
            <input class="changeAvatar" type="file" accept="image/*" hidden>
        </div>
        <div class="hoso2">
            <label for="">Tên tài khoản</label>
            <input type="text" readonly>
            <label for="">Họ & tên</label>
            <input type="text">
            <label for="">Mật khẩu cũ</label>
            <input type="password">
            <label for="">Mật khẩu mới</label>
            <input type="password">
            <label for="">Nhập lại mật khẩu mới</label>
            <input type="password">

            <div class="btn-hoso">
                <button style="background: red">HUỶ</button>
                <button style="background: seagreen">CẬP NHẬT</button>
            </div>
        </div>
    </div>
</div>

<script>
    const imgAvatar = document.querySelector('.imgAvatar');
    const changeAvatar = document.querySelector('.changeAvatar');

    imgAvatar.addEventListener('click', () => {
        changeAvatar.click();
    });
    changeAvatar.addEventListener('change', (event) => {
        const file = event.target.files[0];
        const imageUrl = URL.createObjectURL(file);
        imgAvatar.src = imageUrl;
    });
</script>