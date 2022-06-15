<?php

function reArrayFiles($file_post) {

    $file_ary = array();
    $file_count = count($file_post['name']);
    $file_keys = array_keys($file_post);

    for ($i=0; $i<$file_count; $i++) {
        foreach ($file_keys as $key) {
            $file_ary[$i][$key] = $file_post[$key][$i];
        }
    }

    return $file_ary;
}

function uploadFile($file = [])
    {
        
        // * Xử lý file
        
        
        
          // file upload.php xử lý upload file
        
        //   if ($_SERVER['REQUEST_METHOD'] !== 'POST')
        //   {
        //       // Dữ liệu gửi lên server không bằng phương thức post
        //       $_SESSION['uploadError'] = "Phải Post dữ liệu";
        //       die;
        //   }
        
          // Kiểm tra có dữ liệu fileupload trong $file không
          // Nếu không có thì dừng
          if (!isset($file))
          {
            $_SESSION['uploadError'] = "Dữ liệu không đúng cấu trúc";
            return;
          }
        
          // Kiểm tra dữ liệu có bị lỗi không
          if ($file['error'] != 0)
          {
            $_SESSION['uploadError'] = "Dữ liệu upload bị lỗi";
            return;
            
          }
        
          // Đã có dữ liệu upload, thực hiện xử lý file upload
        
          //Thư mục bạn sẽ lưu file upload
          $target_dir    = ROOTPATH . "/public/img/product_img/";
          //Vị trí file lưu tạm trong server (file sẽ lưu trong uploads, với tên giống tên ban đầu)
          $target_file   = $target_dir . basename($file["name"]);
        
        
          $allowUpload   = true;
        
          //Lấy phần mở rộng của file (jpg, png, ...)
          $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
        
          // Cỡ lớn nhất được upload (bytes)
          $maxfilesize   = 1500000;
        
          ////Những loại file được phép upload
          $allowtypes    = array('png');
        
        
          if(isset($_POST["submit"])) {
              //Kiểm tra xem có phải là ảnh bằng hàm getimagesize
              $check = getimagesize($file["tmp_name"]);
              if($check !== false)
              {
                //   $_SESSION['uploadError'] = "Đây là file ảnh - " . $check["mime"] . ".";
                  $allowUpload = true;
              }
              else
              {
                  $_SESSION['uploadError'] = "Không phải file ảnh.";
                  $allowUpload = false;
                  return;
              }
          }
        
          // Kiểm tra nếu file đã tồn tại thì không cho phép ghi đè
          // Bạn có thể phát triển code để lưu thành một tên file khác
          if (file_exists($target_file))
          {
              $_SESSION['uploadError'] = "Tên file đã tồn tại trên server, không được ghi đè";
              $allowUpload = false;
              return;
          }
          // Kiểm tra kích thước file upload cho vượt quá giới hạn cho phép
          if ($file["size"] > $maxfilesize)
          {
              $_SESSION['uploadError'] = "Không được upload ảnh lớn hơn $maxfilesize (bytes).";
              $allowUpload = false;
              return;
          }
        
        
          // Kiểm tra kiểu file
          if (!in_array(strtolower($imageFileType),$allowtypes ))
          {
              $_SESSION['uploadError'] = "Chỉ được upload các định dạng  PNG";
              $allowUpload = false;
              return;
          }
        
        
          if ($allowUpload)
          {
              // Xử lý di chuyển file tạm ra thư mục cần lưu trữ, dùng hàm move_uploaded_file
              if (move_uploaded_file($file["tmp_name"], $target_file))
              {
                  $uploadSuccess = "File ". basename( $file["name"]).
                  " Đã upload thành công.";
        
                  $uploadSuccess = "File lưu tại " . $target_file;
        
              }
              else
              {
                  $_SESSION['uploadError'] = "Có lỗi xảy ra khi upload file.";
              }
          }
          else
          {
              $_SESSION['uploadError'] = "Không upload được file, có thể do file lớn, kiểu file không đúng ...";
          }
    }
?>