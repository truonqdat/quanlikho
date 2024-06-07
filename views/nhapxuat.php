<style>
    .sort_filter {
        width: 99%;
        margin: 0 auto;
        align-items: center;
        display: flex;
        justify-content: space-between;
        padding: 5px 10px;
    }

    .sort_filter>.box_sort_filt>form {
        border: 1px solid #333;
        border-radius: 5px;
        padding: 3px 10px 3px 10px;
    }

    .sort_filter>.box_sort_filt>form>input {
        border: none;
        outline: none;
        background: transparent;
    }

    .box_sort_filt {
        display: flex;
    }

    #title {
        font-size: 20px;
        color: #00a1ff;
        font-weight: 600;
    }

    .sort_filter>.box_sort_filt>form>button {
        background: none;
        border: none;
        outline: none;
    }

    .sort_filter>.box_sort_filt>form>select {
        padding: 3px 15px;
        border-radius: 3px;
        border: 1px solid #333;
        margin-right: 10px;
    }

    #table_product {
        width: 99%;
        margin: 0 auto;
        border-collapse: collapse;
        border: 2px solid;
    }

    #table_product td {
        text-align: center;
    }

    th,
    td {
        border: 1px solid grey;
    }

    th {
        padding: 10px 0;
        background: #c2c0c0;
    }

    td {
        padding: 5px 0
    }

    tr:nth-child(odd) {
        background: #ebeaea;
    }

    .delete_span {
        color: #fff;
        background: red;
        padding: 2px 5px;
        border-radius: 3px;
        font-size: 12px;
    }
</style>
<?php require_once './views/sidebar.php' ?>
<div class="product_container">
    <div class="sort_filter">
        <div class="box_sort_filt" id="title">Danh sách nhập xuất
            <a href="http://localhost/quanlikho/?controller=admin&action=themnhapxuat"><span class="delete_span"
                    style="background: seagreen; margin: 0 20px;">Thêm nhập/xuất mới<span></a>
        </div>
        <div class="box_sort_filt">
            <form action="" method="POST">
                <select name="sort_logistics_option" id="sort">
                    <option value="desc" <?php if ($_SESSION['sort_logistics_option'] === "desc") {
                echo 'selected';
              };
              ?>>Mới nhất</option>
                    <option value="asc" <?php if ($_SESSION['sort_logistics_option'] === "asc") {
                echo 'selected';
              };
              ?>>Cũ nhất</option>
                </select>
                <input name="search_logistics_text" type="text" placeholder="Tên sản phẩm">
                <button type="submit" name="search_logistics_submit">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </button>
            </form>
        </div>
    </div>
    <div>
        <table id="table_product">
            <thead>
                <th style="width: 6%">Mã phiếu</th>
                <th style="width: 23%">Tên sản phẩm</th>
                <th style="width: 7%">Trạng thái</th>
                <th style="width: 7%">Thời gian</th>
                <th style="width: 40%">Ghi chú</th>
                <th style="width: 7%">Số lượng</th>
            </thead>
            <tbody>
      <?php foreach ($listImport as $value) {?>
        <tr>
          <td><?=$value[0]?></td>
          <td><?=$value[6]?></td>
          <td><?=$value[1]?></td>
          <td><?=$value[5]?></td>
          <td><div style="word-wrap: break-word"><?=$value[2]?></div></td>
          <td><?=$value[4]?></td>
        </tr>
        <?php } ?>
      </tbody>
        </table>
    </div>
</div>