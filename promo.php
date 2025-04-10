<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="output.css" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>
<body class="bg-white font-sans font-poppins">

    <!-- Navbar -->
    <nav class="flex items-center justify-between px-8 py-4 shadow-sm">
      <div class="flex items-center space-x-4">
        <!-- Search Bar -->
        <input type="text" placeholder="Search games..." class="w-80 px-4 py-2 border rounded-full focus:outline-none focus:ring-2 focus:ring-blue-400" />
        <!-- Logo -->
        <img src="image/logo.png" alt="Logo" class="h-10 w-auto">
      </div>
  
      <!-- Login Button -->
      <button class="px-5 py-2 bg-red-200 text-red-800 rounded-full hover:bg-red-300">Log-in</button>
    </nav>

  
    <div class="flex">  
      <!-- Sidebar -->
      <!-- Sidebar -->
    <aside class="w-20 flex flex-col items-center space-y-10 py-10">
      <a href="index.php" class="flex flex-col items-center space-y-1">
        <img src="https://img.icons8.com/ios-filled/50/000000/home.png" class="w-6 h-6">
        <span class="text-sm">Home</span>
      </a>
      <a href="promo.php" class="flex flex-col items-center space-y-1">
        <img src="https://img.icons8.com/ios-filled/50/000000/sale.png" class="w-6 h-6">
        <span class="text-sm">Promo</span>
      </a>
      <a href="hadiah.php" class="flex flex-col items-center space-y-1">
        <img src="https://img.icons8.com/ios-filled/50/000000/gift.png" class="w-6 h-6">
        <span class="text-sm">Hadiah</span>
      </a>
      <a href="keranjang.php" class="flex flex-col items-center space-y-1">
        <img src="https://img.icons8.com/ios-filled/50/000000/shopping-cart.png" class="w-6 h-6">
        <span class="text-sm">Pesanan</span>
      </a>
    </aside>
      <!-- Content -->
      <section class="p-8 w-full">
        <h2 class="text-2xl font-bold mb-6">PROMO YANG ADA</h2>
      
        <!-- Grid 2 Kolom -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
      
          <!-- Card 1 -->
          <div class="bg-pink-100 rounded-lg overflow-hidden shadow-md">
            <img src="image/bg-promo.png" alt="Flash Sale" class="w-full h-40 object-cover">
            <div class="p-4">
              <p class="text-xs text-gray-600 mb-1">7 MARET</p>
              <h3 class="text-lg font-bold">FLASH SALE!!</h3>
            </div>
          </div>
      
          <!-- Card 2 -->
          <div class="bg-pink-100 rounded-lg overflow-hidden shadow-md">
            <img src="image/bg-promo.png" alt="Flash Sale" class="w-full h-40 object-cover">
            <div class="p-4">
              <p class="text-xs text-gray-600 mb-1">7 MARET</p>
              <h3 class="text-lg font-bold">FLASH SALE!!</h3>
            </div>
          </div>
      
          <!-- Card 3 -->
          <div class="bg-pink-100 rounded-lg overflow-hidden shadow-md">
            <img src="image/bg-promo.png" alt="Flash Sale" class="w-full h-40 object-cover">
            <div class="p-4">
              <p class="text-xs text-gray-600 mb-1">7 MARET</p>
              <h3 class="text-lg font-bold">FLASH SALE!!</h3>
            </div>
          </div>
      
          <!-- Card 4 -->
          <div class="bg-pink-100 rounded-lg overflow-hidden shadow-md">
            <img src="image/bg-promo.png" alt="Flash Sale" class="w-full h-40 object-cover">
            <div class="p-4">
              <p class="text-xs text-gray-600 mb-1">7 MARET</p>
              <h3 class="text-lg font-bold">FLASH SALE!!</h3>
            </div>
          </div>
      
        </div>
      </section>
      
      
    </div>
  
  </body>
</html>