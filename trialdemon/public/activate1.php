<?php
  session_start();
?>

<?php
if (!$_SESSION["email"]) {
  header("location: ./login");
}
?>


<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>First Activate</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="./trialdemon/public/style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <link rel="icon" type="image/x-icon" href="./trialdemon/public/imgs/logofinal.png">

  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-YDH873B4DR"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-YDH873B4DR');
  </script>

</head>
<body class="">

<div class="min-h-full">   
<!-- nav -->
  <nav class="bg-[#181c2c]">
    <!-- Desktop stuff -->
    <div class="mx-auto max-w-full px-4 sm:px-6 lg:px-8">
      <div class="flex h-16 items-center justify-between">
        <div class="flex items-center">
          <div class="flex-shrink-0">
            <img class="h-8 w-8" src="./trialdemon/public/imgs/logofinal.png" alt="Your Company">
          </div>
          <!-- Desktop links -->
          <div class="hidden md:block">
            <div class="ml-10 flex items-baseline space-x-4">
              <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
              <a href="./dashboard" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium" aria-current="page">Dashboard</a>

              <a href="./list" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Free trial list</a>

              <a href="./features" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Savings calculator</a>

            </div>
          </div>
        </div>
        <!-- desktop profile -->
        <div class="hidden md:block">
          <div class="ml-4 flex items-center md:ml-6">
            <!-- Profile dropdown -->
            <div class="relative ml-3">
              <div>
                <button id="desktopDropdownButton" class="flex max-w-xs items-center rounded-full  text-sm "  aria-expanded="false" >
                  <svg id="desktopClosed" style="display: block" class=" h-7 w-7" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="white" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                  </svg>
                  <svg id="desktopOpen" style="display: none" class=" h-7 w-7" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="white" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                  </svg>
                </button>
              </div>
              <!--
                Dropdown menu, show/hide based on menu state.

                Entering: "transition ease-out duration-100"
                  From: "transform opacity-0 scale-95"
                  To: "transform opacity-100 scale-100"
                Leaving: "transition ease-in duration-75"
                  From: "transform opacity-100 scale-100"
                  To: "transform opacity-0 scale-95"
              -->
              <div id="desktopDropdown" style="display: none" class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none" >
                <!-- Active: "bg-gray-100", Not Active: "" -->
                <a href="./account" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-0">Account</a>

                <a href="./logout" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-2">Logout</a>
              </div>
            </div>
          </div>
        </div>
        <div class="-mr-2 pr-1 flex md:hidden">
          <!-- Mobile menu button -->
          <button  id="mobileButton" class="inline-flex items-center justify-center rounded-md p-2  bg-gray-700 text-white outline-none  ring-offset-2 ring-offset-gray-800" aria-controls="mobile-menu" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <!--
              Heroicon name: outline/bars-3

              Menu open: "hidden", Menu closed: "block"
            -->
            <svg id="mobileOpen" style="display: block" class=" h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
            </svg>
            <!--
              Heroicon name: outline/x-mark

              Menu open: "block", Menu closed: "hidden"
            -->
            <svg id="mobileClose" style="display: none" class=" h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
          </button>
        </div>
      </div>
    </div>

    <!-- Mobile menu -->
    <div style="display: none" class=" md:hidden" id="mobile-menu">
      <div class="space-y-1 px-2 pt-2 pb-3 sm:px-3">
        <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
        <a href="./dashboard" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium" aria-current="page">Dashboard</a>

        <a href="./list" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Free trial list</a>

        <a href="./features" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Savings Calculator</a>


      </div>
      <div class="border-t border-gray-700 pt-2 pb-3">
        <div class="flex items-center px-5">
     
        </div>
        <div class=" space-y-0 px-2">
          <a href="./account" class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white">Account</a>

          <a href="./logout" class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white">Logout</a>
        </div>
      </div>
    </div>
  </nav>

  <header class="bg-white shadow">
    <div class="mx-auto max-w-full py-6 px-4 sm:px-6 lg:px-8">
      <h1 class="text-3xl font-bold tracking-tight text-gray-900">Activate</h1>
    </div>
  </header>

<!-- Hero -->
<section class="relative">
  <div class="container flex flex-col-reverse lg:flex-row items-center gap-14 mt-8 lg:mt-12">
      <!-- Content -->
      <div class="flex flex-1 flex-col items-center">
          <h2 class="text-gray-900 font-bold text-4xl sm:text-5xl md:text-5xl text-center mb-0 sm:mb-6"> 
              Tap to reveal your <span class="text-bookmark-purple"><br>TrialDemon </span> <span class="text-bookmark-purple">card</span>
          </h2>
 
      </div>
  </div>
</section>



<!-- Card details box -->
<section >
<a href="./pricing" >
  <div class="min-h-full flex font-Roboto justify-center px-4 mt-8 sm:px-6 lg:px-8 animate-[pulse_4s_infinite] blur-md ">
    <div id="mockCard" class="cursor-pointer max-w-md  space-y-2 ">
      <p class=" text-md text-center text-[#fffcf5]">
      Here are your new TrialDemon card credentialsss
      </p>
      <div>

        <div class="-space-y-px rounded-xl bg-gradient-to-bl from-blue-700 via-blue-800 to-gray-900">


          <div class="flex flex-row  border-t-2 border-x-2   rounded-t-2xl">
              <div class="pt-7 pb-7">
                <img class="mx-auto pl-6 h-12 w-auto" src="./trialdemon/public/imgs/logofinal.png" alt="Workflow">
              </div>
          </div>

          <div >
            <div class="pl-6 pt-4 pb-1 relative w-full text-xl font-Nunito border-x-2  text-[#e7e7e7]  sm:text-md ">
              <p class="tracking-widest">1111-1111-1111-1111</p>
            </div>
          </div>

          <div class="flex -space-x-px  rounded-xl ">
            <div class=" flex-1">
              <div class="pl-6 relative w-full border-b-2 border-l-2 rounded-bl-xl  text-[#e7e7e7] sm:text-sm ">
                <p class="pt-5 pb-6 tracking-widest">03/25</p>
              </div>
            </div>

            <div class="flex-1 rounded-br-md">
              <div class="relative w-full border-b-2 border-r-2 rounded-br-xl   text-[#e7e7e7] sm:text-sm">
                <p class="pt-5 pb-6 tracking-widest">334</p>
              </div>
            </div>
          </div>

        </div>

      </div>
    </div>
  </div>
</a>

</section>

<div class="flex justify-center items-center mx-8 mt-14  mb-10">
  <p class="text-center max-w-md text-gray-500 text-xs">Demon Technologies LLC provides the TrialDemon Visa Card, which is issued by Celtic Bank, a Utah-chartered Industrial Bank (Member FDIC). This card will have no impact on your credit score.</p>
</div>

<!-- Error modal -->
<div style="visibility: hidden" id="newCard_status_div">
  <div class=" backdrop-filter backdrop-blur shadow-sm fixed inset-x-0 bottom-0 mb-6 mx-auto z-50 p-2 w-3/4 md:w-84 lg:w-90 xl:w-90 rounded-lg bg-[#FCD7D7]">
    <div class=" text-center">
      <h3 id="newCard_status" class="text-sm leading-6 font-bold text-red-500"></h3>
    </div>
  </div>
</div>

</div>



<script src="./trialdemon/js/pricing.js"></script>
<script src="./trialdemon/js/mobile.js"></script>
</body>
</html>