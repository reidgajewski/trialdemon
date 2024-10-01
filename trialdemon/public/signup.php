<?php
  session_start();
  
  $referral=$_COOKIE['referral'];
 
  

?>

<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Signup</title>
  <meta name="description" content="Signup for TrialDemon, and unlock infinite risk free trials on your favorite websites.">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="./trialdemon/public/style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <link rel="icon" type="image/x-icon" href="./trialdemon/public/imgs/logofinal.png">
  <script src="../js/script.js"></script>
  <link
     rel="stylesheet"
     href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css"
   />
   <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>   

  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-YDH873B4DR"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-YDH873B4DR');
  </script>

</head>
<body class="antialiased ">

    
<!-- Nav -->
<nav class="bg-white px-2 sm:px-4 py-2.5 md:py-0.5 sticky inset-x-0 top-0 z-20 shadow ">
  <div class=" flex flex-wrap items-center justify-between mx-2 md:mx-4   md:relative md:flex md:items-center md:justify-between">
  <a href="./index" class="flex items-center">
      <img src="./trialdemon/public/imgs/logofinal.png" class="h-8 w-8 mr-3" alt="TrialDemon Logo" />
      <span class="self-center text-xl font-semibold whitespace-nowrap text-gray-900">TrialDemon</span>
  </a>
  <div class="flex md:order-2">
      <?php
        if(isset($_SESSION["email"])) {
      ?>
      <a href="./dashboard">
      <button type="button" class="hidden md:block text-white bg-[#0f172a] hover:bg-[#182440] focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-xl text-sm px-5 py-2.5 text-center mr-3 md:mr-0 ">Dashboard</button>
      </a>
      <?php
        } else {
      ?>
      <a href="./signup">
      <button type="button" class="hidden md:block text-white bg-[#0f172a] hover:bg-[#182440] focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-xl text-sm px-5 py-2.5 text-center mr-3 md:mr-0 ">Get started</button>
      </a>
      <?php
        }
      ?>      
      <button data-collapse-toggle="navbar-cta" type="button" class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 " aria-controls="navbar-cta" aria-expanded="false">
            <svg id="mobile-open" style="display: block" class=" h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
            </svg>

            <svg id="mobile-close" style="display: none" class=" h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
    </button>
  </div>
  <div class="items-center justify-between w-full md:flex md:w-auto md:order-1" id="navbar-cta">
    <ul class="hidden md:flex flex-col p-4 mt-4 border tracking-wider  rounded-lg  md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium md:border-0  ">
      <?php
        if(isset($_SESSION["email"])) {
      ?>
      <li>
        <a href="./index" class="block py-2 pl-3 pr-3  text-gray-900 rounded-lg border border-transparent px-2   transition-all duration-200 hover:bg-gray-100 hover:text-gray-900 focus:outline-none focus:ring-1 focus:ring-gray-300  ">Home</a>
      </li>
      <li>
        <a href="./blog" class="block py-2 pl-3 pr-3  text-gray-900 rounded-lg border border-transparent px-2   transition-all duration-200 hover:bg-gray-100 hover:text-gray-900 focus:outline-none focus:ring-1 focus:ring-gray-300  ">Blog</a>
      </li>
      <li>
        <a href="./account" class="block py-2 pl-3 pr-3 text-gray-900 rounded-lg border border-transparent px-2   transition-all duration-200 hover:bg-gray-100 hover:text-gray-900 focus:outline-none focus:ring-1 focus:ring-gray-300  ">Account</a>
      </li>
      <li>
        <a href="./logout" class="block py-2 pl-3 pr-3 text-gray-900 rounded-lg border border-transparent px-2   transition-all duration-200 hover:bg-gray-100 hover:text-gray-900 focus:outline-none focus:ring-1 focus:ring-gray-300  ">Logout</a>
      </li>

      <?php
        } else {
      ?>

      <li>
        <a href="./index" class="block py-2 pl-3 pr-3  text-gray-900 rounded-lg border border-transparent px-2 transition-all duration-200 hover:bg-gray-100 hover:text-gray-900 focus:outline-none focus:ring-1 focus:ring-gray-300  ">Home</a>
      </li>
      <li>
        <a href="./blog" class="block py-2 pl-3 pr-3 text-gray-900 rounded-lg border border-transparent px-2   transition-all duration-200 hover:bg-gray-100 hover:text-gray-900 focus:outline-none focus:ring-1 focus:ring-gray-300  ">Blog</a>
      </li>
      <li>
        <a href="./index#faq" class="block py-2 pl-3 pr-3 text-gray-900 rounded-lg border border-transparent px-2   transition-all duration-200 hover:bg-gray-100 hover:text-gray-900 focus:outline-none focus:ring-1 focus:ring-gray-300  ">FAQ</a>
      </li>
      <li>
        <a href="./login" class="block py-2 pl-3 pr-3 text-gray-900 rounded-lg border border-transparent px-2   transition-all duration-200 hover:bg-gray-100 hover:text-gray-900 focus:outline-none focus:ring-1 focus:ring-gray-300  ">Sign in</a>
      </li>

      <?php
        }
      ?>

    </ul>

    <!-- mobile menu -->
    <div style="display: none" class=" md:hidden " id="mobile-menu">
      <?php
        if(isset($_SESSION["email"])) {
      ?>
      <!-- logged in -->
      <div class="space-y-1  pt-2 pb-3 ">
        <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
        <a href="./index" class=" text-gray-900 block px-3 py-2 text-base font-medium mt-2" aria-current="page">Home</a>

        <a href="./list" class="text-gray-900 block px-3 py-2  text-base font-medium">Free Trial List</a>

        <a href="./features?hide=true" class="text-gray-900  block px-3 py-2 text-base font-medium">Savings Calculator</a>


      </div>
      <div class="border-t border-gray-700 pt-2 pb-3">
        <div class="flex items-center px-5">
     
        </div>
        <div class=" space-y-0">
          <a href="./account" class="text-gray-900 block px-3 py-2  text-base font-medium">Account</a>

          <a href="./logout" class="text-gray-900 block px-3 py-2  text-base font-medium">Logout</a>
        </div>
      </div>

      <?php
        } else {
      ?>

      <!-- not logged in -->
      <div class="space-y-1  pt-2 pb-3 ">
        <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
        <a href="./index" class="text-gray-900 block px-3 py-2  text-base font-medium mt-2" aria-current="page">Home</a>

        <a href="./blog" class="text-gray-900 block px-3 py-2  text-base font-medium">Blog</a>

        <a href="./index#faq" class="text-gray-900 block px-3 py-2  text-base font-medium">FAQ</a>


      </div>
      <div class="border-t border-gray-700 pt-2 pb-3">
        <div class="flex items-center px-5">
     
        </div>
        <div class=" space-y-0">
          <a href="./login" class="text-gray-900 block px-3 py-2  text-base font-medium">Sign in</a>
        </div>
      </div>

      <?php
        }
      ?>

    </div>

  </div>
  </div>
</nav>

    <!-- Sign Up -->
    <section>
        <div class="min-h-full flex items-center justify-center pt-12 pb-5 px-4 sm:px-6 lg:px-8">
            <div class="max-w-md w-full space-y-8">

              <div>
                <img class="mx-auto h-12 w-auto" src="./trialdemon/public/imgs/face-small.png" alt="Workflow">
                <h2 class="mt-4 text-center text-3xl font-extrabold text-gray-900">Sign Up</h2>
                <p class="mt-2 text-center text-sm text-gray-600">
                  Or
                  <a href="./login" class="font-medium text-bookmark-purple hover:text-bookmark-purple hover:underline underline-offset-4"> sign in to an existing account </a>
                </p>
              </div>
              <form id="form" class="mt-8 space-y-6" method="post">
                <input type="hidden" name="remember" value="true">
                <input type="hidden" name="referral" value="<?php echo htmlspecialchars($referral); ?>">
                <input type="hidden" name="action" value="signup">
                <div class="rounded-md shadow-sm -space-y-px">
                  <div>
                    <label for="email" class="sr-only">Email</label>
                    <input name="email" type="text" id="email" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-bookmark-purple focus:border-bookmark-purple focus:z-10 sm:text-sm" placeholder="Email address">
                  </div>
                  <div>
                    <label for="password" class="sr-only">Password</label>
                    <input name="pwd" type="password" id="pwd" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-bookmark-purple focus:border-bookmark-purple focus:z-10 sm:text-sm" placeholder="Password">
                  </div>
                  <div>
                    <label for="password" class="sr-only">Repeat password</label>
                    <input name="pwdrepeat" type="password" id="pwdrepeat" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-bookmark-purple focus:border-bookmark-purple focus:z-10 sm:text-sm" placeholder="Repeat password">
                  </div>
                </div>
                <div class="flex items-center justify-between">
                  <div class="flex items-center">
                    <input id="agree" name="agree" value="yes" type="checkbox" class="h-4 w-4 text-bookmark-purple hover:ring-bookmark-purple border-gray-300 rounded">
                    <label for="agree" class="ml-2 block text-sm text-gray-900"> I agree to <a class="hover:text-bookmark-purple hover:underline underline-offset-4" target="_blank" href="./terms">terms</a> & <a class="hover:text-bookmark-purple hover:underline underline-offset-4"  target="_blank" href="./terms">privacy</a></label>
                  </div>
                </div>
              </form>
              <div>
                  <button name="submit"  id="submit" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white hover:text-bookmark-grey bg-bookmark-purple hover:bg-purple-highlight focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-bookmark-purple">
                    <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                      <!-- Heroicon name: solid/lock-closed -->
                      <svg id="lockIcon" style="display: block" class="h-5 w-5 text-bookmark-white group-hover:text-bookmark-grey" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                      <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                      </svg>
                      
                      <svg id="loadSpinner" style="display: none" role="status" class="mr-2 w-6 h-6 text-gray-200 animate-spin  fill-blue-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                        <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
                      </svg>
                    </span>
                    Sign Up
                  </button>
              </div>
            </div>
          </div>
    </section>
    <div class=" flex items-center justify-center pt-0 pb-7 px-4 sm:px-6 lg:px-8">
      <div id="err" style="display: block" class="text-center text-sm text-error-red font-semibold ">

        <div id="placeholder" style="display: none" class="bg-[#FCD7D7] text-red-500 py-2 px-8 mb-2 w-full justify-center rounded-lg">
          <p>Your password must be at least 8 characters</p>
        </div>
        <div id="error" style="display: none" class="bg-[#FCD7D7] text-red-500 py-2 px-8 mb-2 w-full justify-center rounded-lg">
          <p></p>
        </div>
    </div>


   
<script src="./trialdemon/js/mobile.js"></script>
<script src="./trialdemon/js/signup.js"></script> 

</body>
</html>