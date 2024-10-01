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
  <title>Features</title>
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
<body class="bg-white">
<div class="font-Inter ">


<!-- Nav -->
<section>
  <!-- mobile -->
  <section class="md:hidden shadow">
    <nav class="px-2 sm:px-4 md:mt-2 py-2.5 rounded font-inter">
      <div class="container flex flex-wrap justify-between items-center mx-auto">
        <div class="py-1 flex items-center">
            <img src="./trialdemon/public/imgs/logofinal.png" class=" mr-2 w-8 sm:w-8" />
            <span class="self-center text-xl sm:text-2xl font-semibold whitespace-nowrap text-announcement"></span>
        </div>
        <button data-collapse-toggle="mobile-menu"  type="button" class="inline-flex items-center p-2 ml-3 text-sm text-gray-500 rounded-lg md:hidden bg-gray-100 " aria-controls="mobile-menu" aria-expanded="false">
          <span class="sr-only">Open main menu</span>
          <svg id="mobile-open" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
          <svg id="mobile-close" class="hidden w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
        </button>
        <div class="hidden w-full md:block md:w-auto" id="mobile-menu">
          <ul class="md:flex  flex-1 justifry-end items-center gap-12 text-s">

            <?php
              if(isset($_SESSION["email"]))
              {
            ?>

            <li>
              <a href="./index" class="mt-4 sm:mt-0 block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 cursor-pointer md:text-bookmark-grey md:hover:underline md:underline-offset-4 md:hover:bg-transparent md:border-0 md:p-0">Home</a>
            </li>
            <li>
              <a href="./account" class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 cursor-pointer md:text-bookmark-grey md:hover:underline md:underline-offset-4 md:hover:bg-transparent md:border-0 md:p-0">Account</a>
            </li>
            <li>
              <a href="./logout" class="sm:mt-0 block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 cursor-pointer md:text-bookmark-grey md:hover:underline md:underline-offset-4 md:hover:bg-transparent md:border-0 md:p-0">Logout</a>
            </li>
            <li>
              <a href="./dashboard">
                <button type="button" class="mt-2 md:mt-0 bg-bookmark-purple text-white rounded-md px-10 py-3 hover:bg-purple-highlight">Dashboard</button>
              </a>
            </li>

            <?php
              } else {
            ?>

            <li>
              <a href="./index" class="mt-4 sm:mt-0 block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 cursor-pointer md:text-bookmark-grey md:hover:underline md:underline-offset-4 md:hover:bg-transparent md:border-0 md:p-0">Home</a>
            </li>
            <li>
              <a href="./index#pricing" class="sm:mt-0 block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 cursor-pointer md:text-bookmark-grey md:hover:underline md:underline-offset-4 md:hover:bg-transparent md:border-0 md:p-0">Pricing</a>
            </li>
            <li>
              <a href="./login" class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 cursor-pointer md:text-bookmark-grey md:hover:underline md:underline-offset-4 md:hover:bg-transparent md:border-0 md:p-0">Sign in</a>
            </li>
            <li>
              <a href="./signup">
                <button type="button" class="mt-2 md:mt-0 bg-bookmark-purple text-white rounded-md px-10 py-3 hover:bg-purple-highlight">Sign Up</button>
              </a>
            </li>

            <?php
              }
            ?>

          </ul>
        </div>
      </div>
    </nav>
  </section>
  <!-- desktop -->
  <section class="hidden md:block pt-1">
    <nav class="px-2 sm:px-4 md:mt-2 py-2.5 rounded font-inter">
      <div class="container flex flex-wrap justify-between items-center mx-auto">
        <div class="py-1 flex items-center">
            <img src="./trialdemon/public/imgs/logofinal.png" class="pb-0.5 sm:pb-1 mr-2 w-8 sm:w-8" />
            <span class="self-center text-xl sm:text-2xl font-semibold whitespace-nowrap text-announcement">TrialDemon</span>
        </div>
        <button data-collapse-toggle="mobile-menu"  type="button" class="inline-flex items-center p-2 ml-3 text-sm text-gray-500 rounded-lg md:hidden bg-gray-100 " aria-controls="mobile-menu" aria-expanded="false">
          <span class="sr-only">Open main menu</span>
          <svg id="mobile-open" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
          <svg id="mobile-close" class="hidden w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
        </button>
        <div class="hidden w-full md:block md:w-auto" id="mobile-menu">
          <ul class="md:flex  flex-1 justifry-end items-center gap-12 text-s">

            <?php
              if(isset($_SESSION["email"]))
              {
            ?>

            <li>
              <a href="./index" class="mt-4 sm:mt-0 block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 cursor-pointer md:text-bookmark-grey md:hover:underline md:underline-offset-4 md:hover:bg-transparent md:border-0 md:p-0">Home</a>
            </li>
            <li>
              <a href="./account" class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 cursor-pointer md:text-bookmark-grey md:hover:underline md:underline-offset-4 md:hover:bg-transparent md:border-0 md:p-0">Account</a>
            </li>
            <li>
              <a href="./logout" class="sm:mt-0 block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 cursor-pointer md:text-bookmark-grey md:hover:underline md:underline-offset-4 md:hover:bg-transparent md:border-0 md:p-0">Logout</a>
            </li>
            <li>
              <a href="./dashboard">
                <button type="button" class="mt-2 md:mt-0 bg-bookmark-purple text-white rounded-md px-10 py-3 hover:bg-purple-highlight">Dashboard</button>
              </a>
            </li>

            <?php
              } else {
            ?>

            <li>
              <a href="./index" class="mt-4 sm:mt-0 block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 cursor-pointer md:text-bookmark-grey md:hover:underline md:underline-offset-4 md:hover:bg-transparent md:border-0 md:p-0">Home</a>
            </li>
            <li>
              <a href="./index#pricing" class="sm:mt-0 block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 cursor-pointer md:text-bookmark-grey md:hover:underline md:underline-offset-4 md:hover:bg-transparent md:border-0 md:p-0">Pricing</a>
            </li>
            <li>
              <a href="./login" class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 cursor-pointer md:text-bookmark-grey md:hover:underline md:underline-offset-4 md:hover:bg-transparent md:border-0 md:p-0">Sign in</a>
            </li>
            <li>
              <a href="./signup">
                <button type="button" class="mt-2 md:mt-0 bg-bookmark-purple text-white rounded-md px-10 py-3 hover:bg-purple-highlight">Sign Up</button>
              </a>
            </li>

            <?php
              }
            ?>

          </ul>
        </div>
      </div>
    </nav>
  </section>
</section>








<!-- section -->
<section id="splitSection" class="bg-white mt-8 sm:mt-20 lg:mt-32">
  <div class="flex justify-left max-w-7xl mx-auto px-4 sm:px-6 lg:px-8  py-0">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-y-4 lg:items-center">
      <div class=" max-w-md  text-left">
        <h2 class="mt-4 text-5xl font-extrabold tracking-tight text-gray-900 md:text-6xl">Get ready for <span class="text-bookmark-purple">unlimited</span> free trials</h2>
        <div class="hidden md:block">
          <a class="shadow-xl relative inline-flex items-center px-12 py-3 sm:py-4 mt-4 sm:mt-8 overflow-hidden text-white bg-bookmark-purple border-2 border-bookmark-purple rounded-md group active:bg-bookmark-purple active:text-white focus:outline-none focus:ring" href="./activate1">
            <span class="absolute right-0 transition-transform translate-x-full group-hover:-translate-x-4">
              <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
              </svg>
            </span>
          
            <span class="text-md font-medium transition-all group-hover:mr-4">
              Get started
            </span>
          </a>
        </div>
      </div>
      <div class="mt-4 sm:mt-0">
      <div class="flex ">
      <img class="w-full" defer src="./trialdemon/public/imgs/logos.svg" alt="Neil image">
      </div>
      </div>
    </div>
  </div>
</section> 


<div class='fixed bottom-0 w-full '>
  <a href="activate1">
    <button class='bottom-0 mr-4 my-8 float-right px-8 py-3 bg-bookmark-purple hover:bg-purple-highlight text-white text-lg font-bold shadow-2xl tracking-wide rounded-full focus:outline-none'>Next</button>
  </a>
</div>






<script src="./trialdemon/js/mobile.js"></script>
</body>
</html>