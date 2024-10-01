<?php
  session_start();
?>

<?php
    if (!$_SESSION["email"]) {
        header("Location: ./login?error=notloggedin");
    }
?>

<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pricing</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="./trialdemon/public/style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
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
  <nav class="bg-gray-800">
    <!-- Desktop stuff -->
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
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
                <button id="desktopDropdownButton" class="flex max-w-xs items-center rounded-full bg-gray-800 text-sm "  aria-expanded="false" >
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
    <div class="mx-auto max-w-7xl py-6 px-4 sm:px-6 lg:px-8">
      <h1 class="text-3xl font-bold tracking-tight text-gray-900">Pricing</h1>
    </div>
  </header>


<!-- header -->
<section>
  <div class=" bg-white">
    <div class="max-w-2xl mx-auto mt-10 sm:mt-14 px-4 sm:px-6 lg:px-8">
      <div class="text-center">
        <!-- <i class="text-5xl  fa-solid fa-money-bill"></i> -->
        <h1 class="mt-2 sm:mt-2 text-4xl leading-8 font-extrabold tracking-tight text-gray-900 md:text-5xl">Select a plan</h1>
        <p class="mt-2 px-6 text-lg  text-center  text-gray-500 ">The average user saves $84/month with TrialDemon. <span id="demoButton" class="underline cursor-pointer">Watch demo</span>.</p>
      </div>   
    </div>
  </div>
</section>




<!-- plans -->
<div class="bg-white ">
    <div class="container px-6 py-8 mx-auto">
        <div class="mt-2 space-y-5 xl:mt-4">
            <div id="weekly" class="flex items-center justify-between max-w-2xl px-8 py-5 mx-auto border cursor-pointer rounded-xl ">
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" id="weeklyCheck" class="w-5 h-5 text-gray-400 sm:h-9 sm:w-9" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                    </svg>

                    <div class="flex flex-col items-center mx-5 space-y-1">
                        <h2 class="text-lg font-medium text-gray-700 sm:text-2xl">Weekly</h2>
                        <div class="px-2 text-xs text-bookmark-purple bg-gray-100 rounded-full sm:px-4 sm:py-1  ">
                            Save 0%
                        </div>
                        
            
                    </div>
                </div>

                <h2 id="weeklyText" class="text-2xl font-semibold text-gray-500 sm:text-4xl ">$3 <span class="text-base font-medium">/Week</span></h2>
            </div>

            <div id="monthly" class="flex items-center justify-between max-w-2xl px-8 py-5 mx-auto border border-bookmark-purple cursor-pointer rounded-xl">
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" id="monthlyCheck" class="w-5 h-5 text-bookmark-purple sm:h-9 sm:w-9" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                    </svg>

                    <div class="flex flex-col items-center mx-5 space-y-1">
                        <h2 class="text-lg font-medium text-gray-700 sm:text-2xl">Monthly</h2>
                        <div class="px-2 text-xs text-bookmark-purple bg-gray-100 rounded-full sm:px-4 sm:py-1  ">
                            Save 50%
                        </div>
                    </div>
                </div>

                <h2 id="monthlyText" class="text-2xl font-semibold text-bookmark-purple sm:text-4xl">$6 <span class="text-base font-medium">/Month</span></h2>
            </div>

            <div id="yearly" class="flex items-center justify-between max-w-2xl px-8 py-5 mx-auto border cursor-pointer rounded-xl ">
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" id="yearlyCheck" class="w-5 h-5 text-gray-400 sm:h-9 sm:w-9" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                    </svg>

                    <div class="flex flex-col items-center mx-5 space-y-1">
                        <h2 class="text-lg font-medium text-gray-700 sm:text-2xl pr-3">Yearly</h2>
                        <div class="px-2 text-xs text-bookmark-purple bg-gray-100 rounded-full sm:px-4 sm:py-1  ">
                            Save 65%
                        </div>
                    </div>
                </div>

                <h2 id="yearlyText" class="text-2xl font-semibold text-gray-500 sm:text-4xl ">$50 <span class="text-base font-medium">/Year</span></h2>
            </div>



            <div class="flex justify-center ">
                <a id="nextButton" href="./checkout?plan=monthly" class="mt-3">
                <button class="px-14 py-3 tracking-wide text-white capitalize transition-colors font-semibold duration-300 transform bg-bookmark-purple rounded-md hover:bg-purple-highlight">
                    Continue
                </button>
                </a>
                
            </div>
            
        </div>
    </div>
</div>

<!-- features -->
<div style="display: block" class="bg-white ">
    <div class="container px-0 md:px-36 lg:px-56  mx-auto md:mb-10">

        <div class="p-8 mt-6 md:pt-10 space-y-8 bg-gray-50  rounded-none md:rounded-xl">
            <div class="flex items-center justify-between text-gray-700 ">
                <p class="text-lg ">Cancel any time in the dashboard</p>

                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-bookmark-purple sm:h-7 sm:w-7" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                </svg>
            </div>

            <div class="flex items-center justify-between text-gray-700 ">
                <p class="text-lg">24 hour refund guarantee</p>

                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-bookmark-purple sm:h-7 sm:w-7" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                </svg>
            </div>

            <div class="flex items-center justify-between text-gray-700 ">
                <p class="text-lg">Unlimited free trials on any website</p>

                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-bookmark-purple sm:h-7 sm:w-7" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                </svg>
            </div>

            <div class="flex items-center justify-between text-gray-700 ">
                <p class="text-lg">24/7 support</p>

                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-bookmark-purple sm:h-7 sm:w-7" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                </svg>
            </div>

        </div>

    </div>
</div>

<!-- demo modal -->
<div  id="demoModal" style="display: none" class="relative z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true">

  <div id="demoBackground" class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>

  <div class="fixed z-10 inset-0 overflow-y-auto">
    <div class="flex items-center justify-center min-h-full p-4 text-center sm:p-0">
      <div class="relative bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:max-w-lg sm:w-full">

        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
          <div class="text-center pt-2">
            <p class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-gray-900 ">Demo</p>
            <p class="mt-3  leading-6 text-xl text-gray-500 ">Note: This card is no longer active!</p>
          </div> 

          <div class="flex justify-center mx-4 pt-4 md:pt-6">
            <iframe src="https://player.vimeo.com/video/730644172?h=922a6a7e4e" width="640" height="200" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe>
          </div>
          
        </div>

        <div class="bg-gray-50 px-4 py-3 sm:px-6 flex justify-center">
          <button type="button" id="demoClose" class=" w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-8 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50  sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">Close</button>
        </div>

      </div>
    </div>
  </div>
</div>
</div>


<script>
    const weekly = document.getElementById('weekly')
    const monthly = document.getElementById('monthly')
    const yearly = document.getElementById('yearly')
    const next = document.getElementById('nextButton')
    weekly.addEventListener('click', function() {
        // changing monthly styles
        document.getElementById('monthlyCheck').classList.remove('text-bookmark-purple')
        monthly.classList.remove('border-bookmark-purple')
        document.getElementById('monthlyText').classList.remove('text-bookmark-purple')
        document.getElementById('monthlyCheck').classList.add('text-gray-400')
        document.getElementById('monthlyText').classList.add('text-gray-500')

        // changing weekly styles
        document.getElementById('weeklyCheck').classList.remove('text-gray-400')
        weekly.classList.add('border-bookmark-purple')
        document.getElementById('weeklyText').classList.remove('text-gray-500')
        document.getElementById('weeklyCheck').classList.add('text-bookmark-purple')
        document.getElementById('weeklyText').classList.add('text-bookmark-purple')

        // changing yearly styles
        document.getElementById('yearlyCheck').classList.remove('text-bookmark-purple')
        yearly.classList.remove('border-bookmark-purple')
        document.getElementById('yearlyText').classList.remove('text-bookmark-purple')
        document.getElementById('yearlyCheck').classList.add('text-gray-400')
        document.getElementById('yearlyText').classList.add('text-gray-500')

        next.href = './checkout?plan=weekly'
    })

    monthly.addEventListener('click', function() {
        // changing monthly styles
        document.getElementById('monthlyCheck').classList.remove('text-gray-400')
        monthly.classList.add('border-bookmark-purple')
        document.getElementById('monthlyText').classList.remove('text-gray-500')
        document.getElementById('monthlyCheck').classList.add('text-bookmark-purple')
        document.getElementById('monthlyText').classList.add('text-bookmark-purple')

        // changing weekly styles
        document.getElementById('weeklyCheck').classList.remove('text-bookmark-purple')
        weekly.classList.remove('border-bookmark-purple')
        document.getElementById('weeklyText').classList.remove('text-bookmark-purple')
        document.getElementById('weeklyCheck').classList.add('text-gray-400')
        document.getElementById('weeklyText').classList.add('text-gray-500')

        // changing yearly styles
        document.getElementById('yearlyCheck').classList.remove('text-bookmark-purple')
        yearly.classList.remove('border-bookmark-purple')
        document.getElementById('yearlyText').classList.remove('text-bookmark-purple')
        document.getElementById('yearlyCheck').classList.add('text-gray-400')
        document.getElementById('yearlyText').classList.add('text-gray-500')

        next.href = './checkout?plan=monthly'
    })

    yearly.addEventListener('click', function() {
        // changing monthly styles
        document.getElementById('monthlyCheck').classList.remove('text-bookmark-purple')
        monthly.classList.remove('border-bookmark-purple')
        document.getElementById('monthlyText').classList.remove('text-bookmark-purple')
        document.getElementById('monthlyCheck').classList.add('text-gray-400')
        document.getElementById('monthlyText').classList.add('text-gray-500')

        // changing weekly styles
        document.getElementById('weeklyCheck').classList.remove('text-bookmark-purple')
        weekly.classList.remove('border-bookmark-purple')
        document.getElementById('weeklyText').classList.remove('text-bookmark-purple')
        document.getElementById('weeklyCheck').classList.add('text-gray-400')
        document.getElementById('weeklyText').classList.add('text-gray-500')

        // changing yearly styles
        document.getElementById('yearlyCheck').classList.remove('text-gray-400')
        yearly.classList.add('border-bookmark-purple')
        document.getElementById('yearlyText').classList.remove('text-gray-500')
        document.getElementById('yearlyCheck').classList.add('text-bookmark-purple')
        document.getElementById('yearlyText').classList.add('text-bookmark-purple')

        next.href = './checkout?plan=yearly'
    })




</script>
<script src="./trialdemon/js/pricing.js"></script>
<script src="./trialdemon/js/faq.js"></script>
<script>
  const demoModal = document.getElementById('demoModal')
  const demoBackground = document.getElementById('demoBackground')
  const demoButton = document.getElementById('demoButton')
  const demoClose = document.getElementById("demoClose")

  demoButton.addEventListener('click', function() {
    demoModal.style.display = "block"
  })

  demoClose.addEventListener('click', function() {
    demoModal.style.display = "none"
  })

  demoBackground.addEventListener('click', function() {
    demoModal.style.display = "none"
  })

</script>
</body>
</html>