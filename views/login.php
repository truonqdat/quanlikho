<style>
  .login_container {
    width: 100vw;
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    background: linear-gradient(180deg, rgba(35, 35, 250, 1) 13%, rgba(86, 189, 255, 1) 100%);
  }

  #form_login {
    width: 500px;
    border: 1px solid #fff;
    border-radius: 5px;
    margin: 0 auto;
    display: flex;
    flex-direction: column;
    justify-content: center;
    height: fit-content;
    padding: 20px 60px;
  }

  #login_title {
    padding: 10px;
    font-size: 30px;
    text-transform: uppercase;
    font-weight: 600;
    color: #fff;
  }

  .input_field {
    display: flex;
    padding: 10px;
    flex-direction: column;
  }

  .input_field>input {
    border: 1px solid #fff;
    background: transparent;
    border-radius: 5px;
    padding: 10px 10px;
    color: #fff;
    outline: none;
  }

  .input_field>label {
    color: #fff;
    font-size: 15px;
    font-weight: 600;
    margin-bottom: 5px;
  }

  .btn_box {
    padding: 10px;
    text-align: right;
  }

  #login_btn {
    padding: 10px 15px;
    font-size: 19px;
    color: #16abcd;
    background: #f2f2f2;
    border: none;
    width: 200px;
    border-radius: 5px;
    font-weight: 600;
    cursor: pointer;
  }
</style>

<div class="login_container">
  <form id="form_login" action="?controller=admin&action=login" method="POST">
    <div id="login_title">Đăng Nhập</div>
    <div class="input_login_box">
      <div class="input_field">
        <label class="label_login" for="user_name">Tên đăng nhập</label>
        <input required name="username" type="text" id="user_name">
      </div>
      <div class="input_field">
        <label class="label_login" for="password">Mật khẩu</label>
        <input required name="password" type="password">
      </div>

      <div class="btn_box">
        <button name="submit_login" id="login_btn" type="submit">Đăng nhập</button>
      </div>
    </div>
  </form>
</div>