<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="shortcut icon" href="./img/fav.png" type="image/x-icon">
  <link rel="stylesheet" href="https://kit-pro.fontawesome.com/releases/v5.12.1/css/pro.min.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" type="text/css" href="css/aside.css">
  <title>Welcome To Cleopatra</title>
</head>
<style>
    a {
        text-decoration: none;
        color: black
    }
</style>
<body class="bg-gray-100">

<div class="h-screen flex flex-row flex-wrap">

    <!-- start sidebar -->
  <div id="sideBar" class="relative flex flex-col flex-wrap bg-white border-r border-gray-300 p-6 flex-none w-64 md:-ml-64 md:fixed md:top-0 md:z-30 md:h-screen md:shadow-xl animated faster">


    <!-- sidebar content -->
    <div class="flex flex-col">

      <!-- sidebar toggle -->
      <div class="text-right hidden md:block mb-4">
        <button id="sideBarHideBtn">
          <i class="fad fa-times-circle"></i>
        </button>
      </div>
      <!-- end sidebar toggle -->

      <p class="uppercase text-xs text-gray-600 mb-4 tracking-wider">homes</p>

      <!-- link -->
      <a href="/home" class="{{ $title == "home" ? "active" : "" }} mb-3 capitalize font-medium text-sm hover:text-teal-600 transition ease-in-out duration-500">
        <i class="fad fa-chart-pie text-xs mr-2"></i>
        Home
      </a>
      <!-- end link -->


      <a href="/dashboard/dataAbsen"   class="{{ $title == "Halaman Data Absen" ? "active" : "" }} mb-3 capitalize font-medium text-sm hover:text-teal-600 transition ease-in-out duration-500">
        <i class="fad fa-envelope-open-text text-xs mr-2"></i>
        Data Absen
      </a>
      <a href="/dashboard/dataPengunjung"   class="{{ $title == "halaman data Pengunjung" ? "active" : "" }} mb-3 capitalize font-medium text-sm hover:text-teal-600 transition ease-in-out duration-500">
          <i class="bi bi-database"></i>
        Data Pengunjung
      </a>
      <a href="/dashboard/post"   class="{{ Request::is('dashboard/post*') ? 'active' : "" }} mb-3 capitalize font-medium text-sm hover:text-teal-600 transition ease-in-out duration-500">
        <i class="bi bi-file-post mr-2"></i>
        Post User
      </a>


{{----}}
        <p class="uppercase text-xs text-gray-600 mb-4 mt-4 tracking-wider">apps</p>

    </div>

  </div>
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script src="js/scripts.js"></script>
<!-- end script -->

</body>
</html>
