<?php
   if(isset($_SESSION['error'])) {
    $errorMessage = $_SESSION['error'];
    unset($_SESSION['error']); // Xóa biến session 'error' sau khi hiển thị
} else {
    $errorMessage = ''; // Khởi tạo biến $errorMessage nếu không có lỗi
}
?>
<!doctype html>
<html lang="en">

<head>
  <title>Login | Tailwind Admin</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="/public/assets/logincss/style.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
  <style>
    .login {
      background: url('/public/assets/image/login-new.jpeg')
    }
  </style>
</head>

<body class="h-screen font-sans login bg-cover">
  <div class="container mx-auto h-full flex flex-1 justify-center items-center">
    <div class="w-full max-w-lg">
      <div class="leading-loose">
        <form class="max-w-xl m-4 p-10 bg-white rounded shadow-xl" method="post" action="/login" id="form-data">
          <p class="text-gray-800 font-medium text-center text-lg font-bold">Đăng nhập</p>
          <div class="">
            <label class="block text-sm text-gray-00" for="username">Email</label>
            <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="username" name="email" type="text" placeholder="Email" aria-label="username">
           
          </div>
          <div class="mt-2">
            <label class="block text-sm text-gray-600" for="password">Mật khẩu</label>
            <input class="w-full px-5  py-1 text-gray-700 bg-gray-200 rounded" id="password" name="password" type="password" placeholder="Mật khẩu" aria-label="password">
            <span id="password-error" class="text-red-500"></span>
          </div>
          <span id="email-error" class="text-red-500"><?= !empty($errorMessage)? $errorMessage: ''?></span>
          <div class="mt-4">
            <button class="px-4 py-1 text-white font-light tracking-wider bg-gray-900 rounded" style="width: 100%;" type="submit">Đăng nhập</button>
          </div>
          <a class="inline-block right-0 align-baseline font-bold text-sm text-500 hover:text-blue-800" href="#">
          </a>
        </form>
      </div>
    </div>
  </div>
 
</body>

</html>