<?php
class adminController extends baseController
{
  private $adminModel;
  private $cloudinary;

  public function __construct()
  {
    $this->loadModels('adminModel');
    $this->adminModel = new AdminModel;
  }

  public function index()
  {
    if (isset($_SESSION['admin'])) {
      echo "<script>window.location.href = '?controller=admin&action=sanpham';</script>";
    } else {
      $this->login();
    }
  }

  public function login()
  {
    if (isset($_POST['submit_login'])) {
      $userName = $_POST['username'];
      $password = $_POST['password'];

      $checkAccount = mysqli_fetch_assoc($this->adminModel->getAccount($userName));

      if ($checkAccount) {
        if (password_verify($password, $checkAccount['password'])) {
          $_SESSION['admin'] = $checkAccount;
          echo "<script>alert('Đăng nhập thành công')</script>";
          echo "<script>window.location.href = '?controller=admin&action=sanpham';</script>";
        } else {
          echo "<script>alert('Tên tài khoản hoặc mật khẩu không chính xác')</script>";
        }
      } else {
        echo "<script>alert('Tên tài khoản hoặc mật khẩu không chính xác')</script>";
      }

    }

    $this->loadViews('login', []);
  }
  public function thongke()
  {
    if (isset($_POST['sort_chart_option'])) {
      $_SESSION['sort_chart_option'] = $_POST['sort_chart_option'];
    }

    $_SESSION['sort_chart_option'] = isset($_SESSION['sort_chart_option']) ? $_SESSION['sort_chart_option'] : '7';
    $this->loadViews('thongke', []);
  }

  public function dangxuat()
  {
    session_destroy();
    session_unset();
    echo "<script>window.location.href = '?controller=admin';</script>";
  }


  public function hoso()
  {

    $this->loadViews('hoso', []);
  }

  public function sanpham()
  {
    if (isset($_POST['sort_product_option'])) {
      $_SESSION['sort_product_option'] = $_POST['sort_product_option'];
    }

    if (isset($_POST['search_product_text'])) {
      $_SESSION['search_product_text'] = $_POST['search_product_text'];
    }

    $_SESSION['sort_product_option'] = isset($_SESSION['sort_product_option']) ? $_SESSION['sort_product_option'] : 'desc';
    $_SESSION['search_product_text'] = isset($_SESSION['search_product_text']) ? $_SESSION['search_product_text'] : '';

    $productData = mysqli_fetch_all($this->adminModel->getAllProducts($_SESSION['sort_product_option'], $_SESSION['search_product_text']));
    $this->loadViews('sanpham', ['productData' => $productData]);
  }

  public function danhmuc()
  {
    if (isset($_POST['sort_category_option'])) {
      $_SESSION['sort_category_option'] = $_POST['sort_category_option'];
    }

    if (isset($_POST['search_category_text'])) {
      $_SESSION['search_category_text'] = $_POST['search_category_text'];
    }

    $_SESSION['sort_category_option'] = isset($_SESSION['sort_category_option']) ? $_SESSION['sort_category_option'] : 'asc';
    $_SESSION['search_category_text'] = isset($_SESSION['search_category_text']) ? $_SESSION['search_category_text'] : '';
    $categoryData = mysqli_fetch_all($this->adminModel->getAllCategories($_SESSION['sort_category_option'], $_SESSION['search_category_text']));

    $this->loadViews('danhmuc', ['categoryData' => $categoryData]);
  }

  public function nhapxuat()
  {
    if (isset($_POST['search_logistics_submit'])) {
      $_SESSION['sort_logistics_option'] = $_POST['sort_logistics_option'];
    }

    if (isset($_POST['search_logistics_text'])) {
      $_SESSION['search_logistics_text'] = $_POST['search_logistics_text'];
    }

    $_SESSION['sort_logistics_option'] = isset($_SESSION['sort_logistics_option']) ? $_SESSION['sort_logistics_option'] : 'desc';
    $_SESSION['search_logistics_text'] = isset($_SESSION['search_logistics_text']) ? $_SESSION['search_logistics_text'] : '';
    $listImport = mysqli_fetch_all($this->adminModel->getAllLogistics($_SESSION['sort_logistics_option'], $_SESSION['search_logistics_text']));
    $this->loadViews('nhapxuat', ['listImport' => $listImport]);
  }

  public function chinhsuasanpham()
  {
    $id = $_GET['id'];
    if (isset($_POST['submit_update_product'])) {
      $nameProduct = $_POST['ten_san_pham'];
      $noteProduct = $_POST['ghi_chu_san_pham'];
      $categoryProduct = $_POST['danh_muc_san_pham'];
      if ($checkName = mysqli_fetch_assoc($this->adminModel->checkIDProduct($id))) {
        if ($checkName['nameProduct'] === $nameProduct) {
          $updateResult = $this->adminModel->updateProduct($id, $nameProduct, $noteProduct, $categoryProduct);
          if ($updateResult) {
            echo "<script>alert('Cập nhật sản phẩm thành công');window.location.href = '?controller=admin&action=sanpham';</script>";
          } else {
            echo "<script>alert('Cập nhật sản phẩm thất bại');?controller=admin&action=chinhsuasanpham&id=" . $id . "';</script>";
          }
        } else {
          if (mysqli_num_rows($this->adminModel->checkNameProduct($nameProduct)) > 0) {
            echo "<script>alert('Cập nhật sản phẩm thất bại, tên sản phẩm đã tồn tại')</script>";
          } else {
            $updateResult = $this->adminModel->updateProduct($id, $nameProduct, $noteProduct, $categoryProduct);
            if ($updateResult) {
              echo "<script>alert('Cập nhật sản phẩm thành công');window.location.href = '?controller=admin&action=sanpham';</script>";
            } else {
              echo "<script>alert('Cập nhật sản phẩm thất bại');?controller=admin&action=chinhsuasanpham&id=" . $id . "';</script>";
            }
          }
        }
      }
    }
    $listCategory = $this->adminModel->getAllCategories('desc', '');
    $productEdited = mysqli_fetch_assoc($this->adminModel->getProduct($id));
    $this->loadViews('chinhsuasanpham', ['productEdited' => $productEdited, 'listCategory' => $listCategory]);
  }

  public function chinhsuadanhmuc()
  {
    $id = $_GET['id'];
    if (isset($_POST['submit_update_category'])) {
      $nameCategory = $_POST['ten_danh_muc'];
      $noteCategory = $_POST['ghi_chu_danh_muc'];
      if ($checkName = mysqli_fetch_assoc($this->adminModel->checkIDCategory($id))) {
        if ($checkName['nameCategory'] === $nameCategory) {
          $updateResult = $this->adminModel->updateCategory($id, $nameCategory, $noteCategory);
          if ($updateResult) {
            echo "<script>alert('Cập nhật danh mục thành công');window.location.href = '?controller=admin&action=danhmuc';</script>";
          } else {
            echo "<script>alert('Cập nhật danh mục thất bại');?controller=admin&action=chinhsuadanhmuc&id=" . $id . "';</script>";
          }
        } else {
          if (mysqli_num_rows($this->adminModel->checkNameCategory($nameCategory)) > 0) {
            echo "<script>alert('Cập nhật danh mục thất bại, tên danh mục đã tồn tại')</script>";
          } else {
            $updateResult = $this->adminModel->updateCategory($id, $nameCategory, $noteCategory);
            if ($updateResult) {
              echo "<script>alert('Cập nhật danh mục thành công');window.location.href = '?controller=admin&action=danhmuc';</script>";
            } else {
              echo "<script>alert('Cập nhật danh mục thất bại');?controller=admin&action=chinhsuadanhmuc&id=" . $id . "';</script>";
            }
          }
        }
      }
    }
    $categoryEdited = mysqli_fetch_assoc($this->adminModel->getCategory($id));
    $this->loadViews('chinhsuadanhmuc', ['categoryEdited' => $categoryEdited]);
  }

  public function themdanhmuc()
  {
    if (isset($_POST['them_danh_muc'])) {
      $nameCategory = $_POST['ten_danh_muc'];
      $noteCategory = $_POST['ghi_chu_danh_muc'];
      $check = $this->adminModel->checkNameCategory($nameCategory);
      if (mysqli_num_rows($check) < 1) {
        $add = $this->adminModel->addCategory($nameCategory, $noteCategory);
        if ($add) {
          echo "<script>alert('Thêm danh mục thành công');window.location.href = '?controller=admin&action=danhmuc';</script>";
        } else {
          echo "<script>alert('Thêm danh mục thất bại');window.location.href = '?controller=admin&action=themdanhmuc';</script>";
        }
      } else {
        echo "<script>alert('Tên danh mục đã tồn tại');window.location.href = '?controller=admin&action=themdanhmuc';</script>";
        return;
      }
    }
    $this->loadViews('themdanhmuc', []);
  }

  public function themsanpham()
  {
    if (isset($_POST['them_san_pham'])) {
      $nameProduct = $_POST['ten_san_pham'];
      $noteProduct = $_POST['ghi_chu_san_pham'];
      $categoryProduct = $_POST['danh_muc_san_pham'];
      $check = $this->adminModel->checkNameProduct($nameProduct);
      if (mysqli_num_rows($check) < 1) {
        $add = $this->adminModel->addProduct($nameProduct, $noteProduct, $categoryProduct);
        if ($add) {
          echo "<script>alert('Thêm sản phẩm thành công');window.location.href = '?controller=admin&action=sanpham';</script>";
        } else {
          echo "<script>alert('Thêm sản phẩm thất bại');window.location.href = '?controller=admin&action=themsanpham';</script>";
        }
      } else {
        echo "<script>alert('Tên sản phẩm đã tồn tại');window.location.href = '?controller=admin&action=themsanpham';</script>";
        return;
      }
    }
    $listCategory = $this->adminModel->getAllCategories('desc', '');
    $this->loadViews('themsanpham', ['listCategory' => $listCategory]);
  }

  public function xoadanhmuc()
  {
    $id = $_GET['id'];
    $countProduct = mysqli_fetch_row($this->adminModel->checkProductOfCategory($id));
    if ($countProduct > 0) {
      echo "<script>alert('Không thể xóa danh mục')</script>";
    } else {
      $deleteResult = $this->adminModel->deleteCategory($id);
      if ($deleteResult) {
        echo "<script>alert('Xóa danh mục thành công')</script>";
        echo "<script>window.location.assign('http://localhost/quanlikho/?controller=admin&action=danhmuc')</script>";
      }
    }
  }

  public function xoasanpham()
  {
    $id = $_GET['id'];
    $countProduct = mysqli_fetch_row($this->adminModel->checkLogisticsOfProduct($id));
    if ($countProduct > 0) {
      echo "<script>alert('Không thể xóa sản phẩm')</script>";
    } else {
      $deleteResult = $this->adminModel->deleteProduct($id);
      if ($deleteResult) {
        echo "<script>alert('Xóa sản phẩm thành công')</script>";
        echo "<script>window.location.assign('http://localhost/quanlikho/?controller=admin&action=sanphamD')</script>";
      }
    }
  }

  public function chitietnhapxuat()
  {
    $this->loadViews('chitietnhapxuat', []);
  }

  public function themnhapxuat()
  {
    if (isset($_POST['them_nhap_xuat'])) {
      $product = $_POST['ten_san_pham'];
      $type = $_POST['loai'];
      $count = $_POST['so_luong'];
      $note = $_POST['ghi_chu'];
      if ($count < 1) {
        echo "<script>alert('Số lượng phải lớn hơn 0');window.location.href = '?controller=admin&action=themnhapxuat';</script>";
      }
      if ($type === 'Xuất') {
        $checkCount = mysqli_fetch_assoc($this->adminModel->checkIDProduct($product));
        if ($checkCount['countProduct'] > $count) {
          $add = $this->adminModel->addImport($product, $type, $count, $note);
          $this->adminModel->reduceCountProduct($count, $product);
          if ($add) {
            echo "<script>alert('Thêm phiếu thành công');window.location.href = '?controller=admin&action=nhapxuat';</script>";
          } else {
            echo "<script>alert('Thêm phiếu thất bại');window.location.href = '?controller=admin&action=themnhapxuat';</script>";
          }
        } else {
          echo "<script>alert('Số lượng xuất hàng không được lớn hơn số lượng sản phẩm trong kho');window.location.href = '?controller=admin&action=themnhapxuat';</script>";
        }
      } else {
        $add = $this->adminModel->addImport($product, $type, $count, $note);
        $this->adminModel->plusCountProduct($count, $product);
        if ($add) {
          echo "<script>alert('Thêm phiếu thành công');window.location.href = '?controller=admin&action=nhapxuat';</script>";
        } else {
          echo "<script>alert('Thêm phiếu thất bại');window.location.href = '?controller=admin&action=themnhapxuat';</script>";
        }
      }

    }

    $listProduct = $this->adminModel->getAllProducts('desc', '');
    $this->loadViews('themnhapxuat', ['listProduct' => $listProduct]);
  }

}