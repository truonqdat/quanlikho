<?php

class baseController extends SessionMiddleware
{

  const VIEW_FOLDER_NAME = 'views';
  const MODEL_FOLDER_NAME = 'models';

  protected function loadViews($viewPath, array $mainData = [])
  {
    foreach ($mainData as $key => $value) {
      $$key = $value;
    }
    return require (self::VIEW_FOLDER_NAME . '/' . str_replace('.', '/', $viewPath) . '.php');
    // if ($this->checkSession()) {
    //   return require (self::VIEW_FOLDER_NAME . '/' . str_replace('.', '/', $viewPath) . '.php');
    // } else {
    //   return require ('./views/login.php');
    // }
  }

  protected function loadModels($modelPath)
  {
    return require (self::MODEL_FOLDER_NAME . '/' . $modelPath . '.php');
  }
}
