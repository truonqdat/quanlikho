<?php require_once './views/sidebar.php' ?>
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

  #chart_table {
    width: 99%;
    margin: 0 auto;
    border-collapse: collapse;
    border: 2px solid;
  }

  #chart_table td {
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
<div class="chart_container">
  <div class="sort_filter">
    <div class="box_sort_filt" id="title">Thống kê
    </div>
    <div class="box_sort_filt">
      <form action="" method="POST">
        <select name="sort_chart_option" id="sort">
          <option value="7" <?php if ($_SESSION['sort_chart_option'] === "7") {
            echo 'selected';
          }
          ;
          ?>>7 days
          </option>
          <option value="30" <?php if ($_SESSION['sort_chart_option'] === "30") {
            echo 'selected';
          }
          ?>>30 days
          </option>
          <option value="60" <?php if ($_SESSION['sort_chart_option'] === "60") {
            echo 'selected';
          }
          ?>>60 days
          </option>
          <option value="90" <?php if ($_SESSION['sort_chart_option'] === "90") {
            echo 'selected';
          }
          ?>>90 days
          </option>
        </select>
        <button type="submit" name="sort_chart_submit">
          <i class="fa-solid fa-magnifying-glass"></i>
        </button>
      </form>
    </div>
  </div>

  <div>
    <table id="chart_table">
      <thead>
        <th style="width:25%">Số lượng sản phẩm</th>
        <th style="width:25%">Só lượng danh mục</th>
        <th style="width:25%">Số lượng nhập kho</th>
        <th style="width:25%">Số lượng xuất kho</th>
      </thead>
      <tbody>
        <tr>
          <td>4</td>
          <td>4</td>
          <td>4</td>
          <td>4</td>
        </tr>
      </tbody>
    </table>
  </div>
</div>