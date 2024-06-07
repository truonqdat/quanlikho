<?php

class adminModel extends baseModel
{
  public function getAccount($accountName)
  {
    $sql = "SELECT * FROM account WHERE userName = '$accountName';";
    $query = $this->_query($sql);
    return $query;
  }

  public function getAllCategories($sortCategoryValue, $searchCategoryValue)
  {
    $sql = "SELECT * FROM category WHERE nameCategory LIKE '%$searchCategoryValue%' ORDER BY id " . $sortCategoryValue;

    $query = $this->_query($sql);
    return $query;
  }

  public function getAllProducts($sortProductValue, $searchProductValue)
  {
    $sql = "SELECT * FROM product WHERE nameProduct LIKE '%$searchProductValue%' ORDER BY id $sortProductValue";
    $query = $this->_query($sql);
    return $query;
  }

  public function addCategory($name, $note)
  {
    $sql = "insert into category values('','$name','$note')";
    $query = $this->_query($sql);
    return $query;
  }

  public function addProduct($name, $note, $category)
  {
    $sql = "insert into product values('','$name','$note',0,'$category')";
    $query = $this->_query($sql);
    return $query;
  }

  public function addImport($product, $type, $count, $note)
  {
    $sql = "insert into import_export values('','$type','$note','$product','$count', DATE(NOW()))";
    $query = $this->_query($sql);
    return $query;
  }


  public function checkNameCategory($name)
  {
    $sql = "select * from category where nameCategory = '$name'";
    $query = $this->_query($sql);
    return $query;
  }

  public function checkNameProduct($name)
  {
    $sql = "select * from product where nameProduct = '$name'";
    $query = $this->_query($sql);
    return $query;
  }

  public function reduceCountProduct($count, $id)
  {
    $sql = "UPDATE product SET countProduct = countProduct - $count WHERE id = '$id'";
    $query = $this->_query($sql);
    return $query;
  }

  public function plusCountProduct($count, $id)
  {
    $sql = "UPDATE product SET countProduct = countProduct + $count WHERE id = '$id'";
    $query = $this->_query($sql);
    return $query;
  }


  public function checkIDCategory($id)
  {
    $sql = "select * from category where id = '$id'";
    $query = $this->_query($sql);
    return $query;
  }

  public function checkIDProduct($id)
  {
    $sql = "select * from product where id = '$id'";
    $query = $this->_query($sql);
    return $query;
  }


  public function getProduct($id)
  {
    $sql = "SELECT * FROM product WHERE id = $id";
    $query = $this->_query($sql);
    return $query;
  }

  public function getCategory($id)
  {
    $sql = "SELECT * FROM
     category WHERE id = $id";
    $query = $this->_query($sql);
    return $query;
  }

  public function getAllLogistics($sortCategoryValue, $searchCategoryValue)
  {
    $sql = "SELECT i.*, p.nameProduct FROM import_export i JOIN product p ON i.idProduct = p.id  WHERE p.nameProduct LIKE '%$searchCategoryValue%'  ORDER BY i.id $sortCategoryValue";
    $query = $this->_query($sql);
    return $query;
  }

  public function chart($statusLogistics, $time)
  {
    $sql = "SELECT p.nameProduct, DATE(i.time) as import_date, SUM(i.count) as total_count
    FROM import_export i
    JOIN product p ON i.idProduct = p.id
    WHERE i.type ='$statusLogistics' AND DATE(i.time) BETWEEN DATE_SUB(CURDATE(), INTERVAL $time DAY) AND CURDATE()
    GROUP BY p.nameProduct, DATE(i.time)
    ORDER BY import_date DESC, p.nameProduct ASC";
    $query = $this->_query($sql);
    return $query;
  }

  public function updateProduct($id, $nameProduct, $noteProduct, $category)
  {
    $sql = "UPDATE product SET nameProduct = '$nameProduct', noteProduct = '$noteProduct', idCategory = '$category' WHERE product.id = $id;";
    $query = $this->_query($sql);
    return $query;
  }

  public function updateCategory($id, $nameCategory, $noteCategory)
  {
    $sql = "UPDATE category SET nameCategory = '$nameCategory', noteCategory = '$noteCategory' WHERE category.id = $id;";
    $query = $this->_query($sql);
    return $query;
  }

  public function checkProductOfCategory($id)
  {
    $sql = "SELECT * FROM product WHERE product.idCategory = $id";
    $query = $this->_query($sql);
    return $query;
  }

  public function checkLogisticsOfProduct($id)
  {
    $sql = "SELECT * FROM import_export WHERE import_export.idProduct = $id";
    $query = $this->_query($sql);
    return $query;
  }

  public function deleteCategory($id)
  {
    $sql = "DELETE FROM category WHERE category.id = $id";
    $query = $this->_query($sql);
    return $query;
  }

  public function deleteProduct($id)
  {
    $sql = "DELETE FROM product WHERE product.id = $id";
    $query = $this->_query($sql);
    return $query;
  }

  public function getProfile($id)
  {
    $sql = "SELECT * FROM account WHERE idUser = $id";
    $query = $this->_query($sql);
    return $query;
  }

  public function updateProfile($id, $password, $name)
  {
    if ($password !== null) {
      $sql = "UPDATE account SET password = '" . $password . "', fullName = '" . $name . "' WHERE idUser = '" . $id . "'";
    } else {
      $sql = "UPDATE account SET fullName = '" . $name . "' WHERE idUser = '" . $id . "'";
    }
    $query = $this->_query($sql);
    return $query;
  }

  public function updateAvatar($id, $img)
  {

    $sql = "UPDATE account SET avatar = '" . $img . "' WHERE idUser = '" . $id . "'";
    $query = $this->_query($sql);
    return $query;
  }

}