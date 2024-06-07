<style>
    .menu {
        display: flex;
        justify-content: space-between;
        padding: 10px;
        align-items: center;
        background: #1da1f2;
    }

    .menu_header>ul {
        display: flex;
        gap: 20px;
    }

    .menu_header>ul>a {
        text-decoration: none;
        font-size: 18px;
        color: #fff;
        list-style: none;
        font-weight: 600;
        text-transform: uppercase;
    }

    .menu_header>ul>a:hover {
        cursor: pointer;
        color: #ffc761;
    }

    .admin_box_info {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .admin_box_info>img {
        width: 35px;
        height: 35px;
        border-radius: 50%;
    }

    .admin_box_info>a>span {

        font-size: 18px;
        color: #fff;
        font-weight: 600;
        text-transform: uppercase;
    }
</style>
<div class="menu">
    <div class="menu_header">
        <ul>
            <a href="?controller=admin&action=thongke">
                <li>Thống kê</li>
            </a>
            <a href="?controller=admin&action=hoso">
                <li>Hồ sơ</li>
            </a>
            <a href="?controller=admin&action=danhmuc">
                <li>Danh mục</li>
            </a>
            <a href="?controller=admin&action=sanpham">
                <li>Sản phẩm</li>
            </a>
            <a href="?controller=admin&action=nhapxuat">
                <li>Nhập xuất sản phẩm</li>
            </a>
        </ul>
    </div>

    <div class="admin_box_info">
        <img src="data:image/jpeg;base64,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"
            alt="">

        <a href="http://localhost/quanlikho/?controller=admin&action=hoso">
          
            <!-- <span><?php echo ($_SESSION['admin']['fullName']) ?> </span> -->
        </a>
        <!-- <?php if (isset($_SESSION['admin'])) {
            echo '<a href="http://localhost/quanlikho/?controller=admin&action=dangxuat" style="color: white">Đăng xuất</a>';
        } ?> -->
    </div>
</div>