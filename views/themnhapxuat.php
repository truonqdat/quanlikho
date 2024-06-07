<?php require_once './views/sidebar.php' ?>
<style>
  .edit_container>form {
    margin: 100px auto;
    width: 400px;
    display: flex;
    gap: 10px;
    flex-direction: column;
    padding: 20px 30px;
    border: 1px solid #00a1ff;
    border-radius: 5px;
  }

  .edit_title {
    font-size: 20px;
    text-transform: uppercase;
    font-weight: 600;
    color: #00a1ff;
    text-align: left;
  }

  .edit_field>label {
    font-size: 15px;
    color: #1da1f2;
  }

  .edit_field>input,
  .edit_field>select {
    font-size: 15px;
    color: #1da1f2;
    width: 100%;
    border-radius: 4px;
    outline: none;
    border: 1px solid;
    margin-top: 5px;
    padding: 5px 10px;
  }

  .button_field {
    text-align: right;
  }

  .button_field>button {
    padding: 5px 20px;
    border-radius: 4px;
    border: none;
    outline: none;
    color: #fff;
    background: #00a1ff;
    font-size: 15px;
  }
</style>
<div class="edit_container">

  <form action="" method="POST">
    <div class="edit_title">Thêm nhập / xuất</div>
    <div class="edit_field">
      <label for="">Tên sản phẩm</label>
      <select name="ten_san_pham" id="" required>
        <?php
         foreach ($listProduct as $key => $value) {
          extract($value);
          echo  '<option value="'.$id.'">'.$nameProduct.'</option>';
        }
        ?> 
      </select>
    </div>
    <div class="edit_field">
      <label for="">Trạng thái</label>
      <select name="loai" id="" required> 
        <option value="Nhập">Nhập</option>
        <option value="Xuất">Xuất</option>
      </select>
    </div>
    <div class="edit_field">
      <label for="">Số lượng</label>
      <input type="number" required id="" name="so_luong">
    </div>
    <div class="edit_field">
      <label for="">Ghi chú</label>
      <input type="text" name="ghi_chu" id="">
    </div>
    <div class="button_field">
      <button type="submit" name="them_nhap_xuat">Cập nhật</button>
    </div>
  </form>
</div>