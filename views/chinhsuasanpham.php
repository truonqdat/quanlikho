<?php require_once './views/sidebar.php' ?>
<style>
  .edit_container>form {
    margin: 100px auto;
    width: 400px;
    display: flex;
    gap: 10px;
    flex-direction: column;
    padding: 20px 30px;
    border: 2px solid #00a1ff;
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
    color: #00a1ff;
  }

  .edit_field>input,
  .edit_field>select  {
    font-size: 15px;
    color: #00a1ff;
    width: 100%;
    border-radius: 4px;
    outline: none;
    border: 1px solid;
    margin-top: 5px;
    padding: 5px 10px;
  }

  textarea{
    outline: none;
    margin-top: 5px;
    padding: 5px;
    color: #00a1ff;
    border: 1px solid;
    resize: none;
    height: 100px;
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
    background: orange;
    font-size: 15px;
  }

  .button_field>button:hover {
    cursor: pointer;
    background-color: #00a63e;
  }
</style>
<div class="edit_container">

  <form action="" method="POST">
    <div class="edit_title">Chỉnh sửa sản phẩm</div>
    <div class="edit_field">
      <label for="ten_san_pham">Tên sản phẩm</label>
      <input type="text" id="ten_san_pham" required name="ten_san_pham" value="<?=$productEdited['nameProduct']?>">
    </div>
    <div class="edit_field">
      <label for="">Danh mục</label>
      <select required name="danh_muc_san_pham" id="">
        <?php
         foreach ($listCategory as $key => $value) {
          extract($value);
          if($productEdited['idCategory'] === $id){
            echo  '<option value="'.$id.'" selected>'.$nameCategory.'</option>';
          }else{
            echo  '<option value="'.$id.'">'.$nameCategory.'</option>';
          }
        }
        ?> 
      </select>
    </div>
    <div class="edit_field" style="display: flex;flex-direction: column;">
      <label for="">Ghi chú</label>
      <textarea name="ghi_chu_san_pham"><?=$productEdited['noteProduct']?></textarea>
    </div>
    <div class="button_field">
      <button type="submit" name="submit_update_product">Cập nhật</button>
    </div>
  </form>
</div>