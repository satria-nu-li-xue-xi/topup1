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
      <main class="p-10">
        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-6 gap-6">
          <!-- Game 1 -->
          <div class="text-center space-y-2">
            <img src="image/riseofkingdom.png" alt="Rise of Kingdom" class="w-full h-40 object-cover rounded-xl shadow-lg">
            <a href="pesan.html" class="text-gray-700 font-semibold">rise of kingdom</a>
          </div>
          <!-- Game 2 -->
          <div class="text-center space-y-2">
            <img src="image/game1.png" alt="Game 2" class="w-full h-40 object-cover rounded-xl shadow-lg">
            <p class="text-gray-700 font-semibold">Game 2</p>
          </div>
          <!-- Game 3 -->
          <div class="text-center space-y-2">
            <img src="image/pubg.png" alt="PUBG" class="w-full h-40 object-cover rounded-xl shadow-lg">
            <p class="text-gray-700 font-semibold">PUBG</p>
          </div>
          <!-- Game 4 -->
          <div class="text-center space-y-2">
            <img src="image/gamingear.png" alt="Gaming Gear" class="w-full h-40 object-cover rounded-xl shadow-lg">
            <p class="text-gray-700 font-semibold">gaming gear</p>
          </div>
          <!-- Game 5 -->
          <div class="text-center space-y-2">
            <img src="image/animek.png" alt="Animek" class="w-full h-40 object-cover rounded-xl shadow-lg">
            <p class="text-gray-700 font-semibold">Animek</p>
          </div>
          <!-- Game 6 -->
          <div class="text-center space-y-2">
            <img src="image/starail.png" alt="Starail" class="w-full h-40 object-cover rounded-xl shadow-lg">
            <p class="text-gray-700 font-semibold">Starail</p>
          </div>
          <!-- Game 7 -->
          <div class="text-center space-y-2">
            <img src="image/coc.png" alt="COC" class="w-full h-40 object-cover rounded-xl shadow-lg">
            <p class="text-gray-700 font-semibold">Clash of Clans (COC)</p>
          </div>
          <!-- Game 8 -->
          <div class="text-center space-y-2">
            <img src="image/game2.png" alt="Game 2" class="w-full h-40 object-cover rounded-xl shadow-lg">
            <p class="text-gray-700 font-semibold">Game 2</p>
          </div>
          <!-- Game 9 -->
          <div class="text-center space-y-2">
            <img src="image/paimon.png" alt="Paimon" class="w-full h-40 object-cover rounded-xl shadow-lg">
            <p class="text-gray-700 font-semibold">Paimon</p>
          </div>
        </div>
      </main>
      
      
    </div>
    
      
      
    </div>
  
  </body>
</html>