<!DOCTYPE html>
<html lang="en" class="">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>lnthai - store</title>

  <!-- Tailwind is included -->

  <link rel="stylesheet" href="/public/assets/css/main.css">

  <link rel="apple-touch-icon" sizes="180x180" href="apple-touch-icon.png" />
  <link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png" />
  <link rel="icon" type="image/png" sizes="16x16" href="favicon-16x16.png" />
  <link rel="mask-icon" href="safari-pinned-tab.svg" color="#00b4b6" />

  <meta name="description" content="Admin One - free Tailwind dashboard">

  <meta property="og:url" content="https://justboil.github.io/admin-one-tailwind/">
  <meta property="og:site_name" content="JustBoil.me">
  <meta property="og:title" content="Admin One HTML">
  <meta property="og:description" content="Admin One - free Tailwind dashboard">
  <meta property="og:image" content="https://justboil.me/images/one-tailwind/repository-preview-hi-res.png">
  <meta property="og:image:type" content="image/png">
  <meta property="og:image:width" content="1920">
  <meta property="og:image:height" content="960">

  <meta property="twitter:card" content="summary_large_image">
  <meta property="twitter:title" content="Admin One HTML">
  <meta property="twitter:description" content="Admin One - free Tailwind dashboard">
  <meta property="twitter:image:src" content="https://justboil.me/images/one-tailwind/repository-preview-hi-res.png">
  <meta property="twitter:image:width" content="1920">
  <meta property="twitter:image:height" content="960">

  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-130795909-1"></script>
  <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
      dataLayer.push(arguments);
    }
    gtag('js', new Date());
    gtag('config', 'UA-130795909-1');
  </script>
  <script src="https://cdn.ckeditor.com/ckeditor5/40.2.0/classic/ckeditor.js"></script>
</head>

<body>

  <div id="app">
    <nav id="navbar-main" class="navbar is-fixed-top">
      <div class="navbar-brand">
        <a class="navbar-item mobile-aside-button">
          <span class="icon"><i class="mdi mdi-forwardburger mdi-24px"></i></span>
        </a>
      </div>
      <div class="navbar-brand is-right">
        <a class="navbar-item --jb-navbar-menu-toggle" data-target="navbar-menu">
          <span class="icon"><i class="mdi mdi-dots-vertical mdi-24px"></i></span>
        </a>
      </div>
      <div class="navbar-menu" id="navbar-menu">
        <div class="navbar-end">
          <div class="navbar-item dropdown has-divider has-user-avatar">
            <a class="navbar-link">
              <div class="user-avatar">
                <img src="https://avatars.dicebear.com/v2/initials/john-doe.svg" alt="John Doe" class="rounded-full">
              </div>
              <div class="is-user-name"><span>Thái</span></div>
              <span class="icon"><i class="mdi mdi-chevron-down"></i></span>
            </a>
            <div class="navbar-dropdown">
              <a href="profile.html" class="navbar-item">
                <span class="icon"><i class="mdi mdi-account"></i></span>
                <span>Hồ sơ của tôi</span>
              </a>
              <!-- <a class="navbar-item">
                <span class="icon"><i class="mdi mdi-settings"></i></span>
                <span>Settings</span>
              </a>
              <a class="navbar-item">
                <span class="icon"><i class="mdi mdi-email"></i></span>
                <span>Messages</span>
              </a> -->
              <hr class="navbar-divider">
              <a class="navbar-item" onclick="loadPage('/admin/logout',this)">
                <span class="icon"><i class="mdi mdi-logout"></i></span>
                <span>Đăng xuất</span>
              </a>
            </div>
          </div>
          <!-- <a href="https://justboil.me/tailwind-admin-templates" class="navbar-item has-divider desktop-icon-only">
            <span class="icon"><i class="mdi mdi-help-circle-outline"></i></span>
            <span>About</span>
          </a> -->
          <a href="https://github.com/lnthai/lnthaistore.git" class="navbar-item has-divider desktop-icon-only" target="_blanks">
            <span class="icon"><i class="mdi mdi-github-circle"></i></span>
            <span>GitHub</span>
          </a>
          <a title="Đăng xuất" class="navbar-item desktop-icon-only ajax-link" href="javascript:void(0)" onclick="loadPage('/admin/logout',this)">
            <span class="icon"><i class="mdi mdi-logout"></i></span>
            <span>Log out</span>
          </a>
        </div>
      </div>
    </nav>