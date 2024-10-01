<?php
  session_start();
?>

<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>How to Get a Free Trial on Youtube TV Without Getting Charged [2023]</title>
  <meta property="description" content="A YouTube TV Free Trial is great until you forget to cancel it. In this blog we'll show you how to avoid getting charged with the TrialDemon virtual credit card.">
  <meta name="keywords" content="virtual card, YouTube TV, free trial, credit card generator">

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
<body class="antialiased">
<div class="min-h-full">   
<!-- Nav -->
<nav class="bg-white px-2 sm:px-4 py-2.5 sm:py-0.5 sticky inset-x-0 top-0 z-20 shadow ">
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
      <button type="button" class=" text-white bg-[#0f172a] hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-xl text-sm px-5 py-2.5 text-center mr-3 md:mr-0 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Dashboard</button>
      </a>
      <?php
        } else {
      ?>
      <a href="./signup">
      <button type="button" class=" text-white bg-[#0f172a] hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-xl text-sm px-5 py-2.5 text-center mr-3 md:mr-0 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Get started</button>
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
        <a href="./blog" class="block py-2 pl-3 pr-3  text-gray-900 rounded-lg border border-transparent px-2   transition-all duration-200 hover:bg-gray-100 hover:text-gray-900 focus:outline-none focus:ring-1 focus:ring-gray-300  ">Blog</a>
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
<main class="pt-8 lg:pt-12 lg:pb-24 bg-white ">
    <div class="flex justify-between px-4 mx-auto max-w-screen-xl ">
        <article class="mx-auto w-full max-w-2xl format format-sm sm:format-base lg:format-lg format-blue ">
            <header class="mb-4 lg:mb-6 not-format">
            <address class="flex items-center mb-6 not-italic">
                  <div class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white">
                      <img class="mr-4 w-16 h-16 object-fill rounded-full" src="./trialdemon/public/imgs/headshot.JPG" alt="Reid Gajewski">
                      <div>
                          <a href="#" rel="author" class="text-xl font-bold text-gray-900 ">Reid Gajewski</a>
                          <p class="text-base font-light text-gray-500 ">Founder at TrialDemon</p>
                          <p class="text-base font-light text-gray-500 "><time pubdate datetime="2022-02-08" title="February 8th, 2022">Last updated - April 14, 2023</time></p>
                      </div>
                  </div>
              </address>

                <h1 class="mb-4 text-4xl font-extrabold leading-tight text-gray-900 lg:mb-6 lg:text-5xl ">How to Get a Free Trial on Youtube TV Without Getting Charged [2023]</h1>
            </header>
            <p class="text-gray-600 mb-8 text-xl tracking-wide">
            It can be difficult to decline a free trial offer since it doesn't cost anything. But it's important to remember that you'll be charged after the trial period ends. One example of a good free trial offer is the YouTube TV Free Trial, which can be useful during events like the NFL season or March Madness. However, the monthly fee of $72.99 for a YouTube TV subscription may not be worth it for some people, even with the free trial. To avoid further charges, it's essential to cancel the subscription after you've finished watching your favorite TV shows. This is a straightforward process, and we provide all the necessary information on how to unsubscribe in this article. You can learn how to make the most of your YouTube TV free trial while avoiding additional costs.
            <br>
            <br>
            However, we won't go over the conventional way to cancel the YouTube TV trial. Instead, we'll introduce a tool called TrialDemon that will not only cancel all of your trials for you, but will let you get unlimited free trials on your favorite services like YouTube TV.
            </p>

            <div class="mb-8 bg-gray-200 rounded-xl">
              <div class="aspect-w-4 aspect-h-3">
                <img rel="preload" src="./trialdemon/public/imgs/YTTV.png" class="object-cover rounded-xl" width="1920" height="1080" alt="Image showing a bunch of virtual credit cards">
              </div>
            </div>

            <!-- section -->
            <div>
                <h1 class="mb-4 text-3xl font-extrabold leading-tight text-gray-900 lg:mb-6 lg:text-4xl ">How to signup for a YouTube TV free trial?</h1>
                <p class="text-gray-700 mb-8 tracking-wide text-lg mt-4">
                It is very easy to sign up for a YouTube TV free trial.
                <br>
                <br>
                1. Go to tv.youtube.com
                <br>
                2. Click the "Start Free Trial Button"
                <br>
                3. Choose the google account you want to use
                <br>
                4. Choose between a 14-day trial base plan or a 7-day trial plan
                <br>
                <br>
                That's it! Now you have access to YouTube TV for your entire free trial period. 
              </p>
            </div>


            <!-- section -->
            <div>
              <h1 class="mb-4 text-3xl font-extrabold leading-tight text-gray-900 lg:mb-6 lg:text-4xl ">The better way to start a YouTube TV free trial</h1>
              <p class="text-gray-700 mb-8 tracking-wide text-lg mt-4">
                As we all know, companies like YouTube require you to enter credit card information when starting a trial. This is because they can automatically charge you when the trial is over. While this is sometimes convenient, it also makes it very easy to forget to cancel which will slowly drain your bank account over time. TrialDemon is a service that enables you to start free trials with virtual cards, so you'll never have to cancel a trial again.
              When you use the TrialDemon virtual credit card when starting a trial, you are actually using a real active credit card with money on it. You input this card number when a service requires a credit card to start a trial, and it bypasses the $1 temporary charge payment processors use to determine if a card is real. Once the trial ends, the card will automatically decline the charge so you don’t have to worry about canceling your free trial. 
                <br>
                <br>
              TrialDemon also provides a temporary email address that you can use to sign up for these services. 
              <br>
              <br>
              If you want another trial on the same website, you just have to generate a new virtual card and temporary email which effectively allows you to get unlimited free trials on any subscription website. 

              </p>
            </div>

            <!-- section -->
            <div>
                <h1 class="mb-4 text-3xl font-extrabold leading-tight text-gray-900 lg:mb-6 lg:text-4xl ">How to use TrialDemon to get unlimited trials on YouTube TV?</h1>
                <p class="text-gray-700 mb-8 tracking-wide text-lg mt-4">
                Now that we've introduced TrialDemon, we'll show you how to use it to get unlimited trials on YouTube TV. With this trick you'll never have to worry about cancelling your trials again.
                <br>
                <br>
                1. Sign up for a TrialDemon account
                <br>
                2. Generate your first free trial credit card and email
                <br>
                3. Copy the temporary email address and use it to create your YouTube TV account
                <br>
                4. Copy the temporary virtual card number and use it when YouTube TV requests payment info
                <br>
                5. Enjoy your free trial 
                <br>
                6. Don't worry about cancelling your trial, the TrialDemon card won't let any charges through when the trial ends.
                <br>
                <br>
                It is that easy! Now, you'll never have to worry about cancelling your trials ever again!
              </p>
            </div>
        
 
        </article>
    </div>

    <div class="flex justify-center items-center mt-4">
      <div class="max-w-2xl">
        <div class="relative isolate overflow-hidden bg-gray-900 px-6 py-24 text-center shadow-2xl sm:rounded-xl sm:px-16 ">
          <h2 class="mx-auto max-w-2xl text-4xl font-bold tracking-tight text-white">Get Unlimited Free Trials, Anywhere</h2>
          <p class="mx-auto mt-6 max-w-xl text-xl leading-8 text-gray-300">Get unlimited free trials on any subscription website & never forget to cancel a free trial again.</p>
          <div class="mt-10 flex items-center justify-center gap-x-6">
            <a href="https://www.trialdemon.com/index?referral=blog" class="rounded-md bg-white px-3.5 py-3 text-base font-semibold leading-7 text-gray-900 shadow-sm hover:bg-gray-100 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-white">Get started</a>
            <a href="https://www.trialdemon.com/index?referral=blog" class="text-base font-semibold leading-7 text-white">Learn More<span aria-hidden="true">→</span></a>
          </div>
          <svg viewBox="0 0 1024 1024" class="absolute top-1/2 left-1/2 -z-10 h-[64rem] w-[64rem] -translate-x-1/2 [mask-image:radial-gradient(closest-side,white,transparent)]" aria-hidden="true">
            <circle cx="512" cy="512" r="512" fill="url(#827591b1-ce8c-4110-b064-7cb85a0b1217)" fill-opacity="0.7"></circle>
            <defs>
              <radialGradient id="827591b1-ce8c-4110-b064-7cb85a0b1217">
                <stop stop-color="#7775D6"></stop>
                <stop offset="1" stop-color="#E935C1"></stop>
              </radialGradient>
            </defs>
          </svg>
        </div>
      </div>
    </div>

</main>


<!-- floating button -->
<div id="nextButton" class='fixed bottom-0 w-full' style="display:block">
    <a href="https://www.trialdemon.com/index?referral=blog">
        <button class='bottom-0 mr-4 my-4 float-right px-7 py-4 md:px-10 md:py-5 bg-bookmark-purple hover:bg-purple-highlight text-white text-sm md:text-lg font-bold shadow-2xl tracking-wide rounded-full focus:outline-none'>Get unlimited free trials</button>
    </a>
</div>

<!-- Footer -->
<section class="">
    <footer class="bg-gray-100">
        <div class=" px-4 py-16 mx-auto space-y-12 sm:px-6 lg:px-8">
          <div class="sm:items-center sm:justify-between sm:flex">
            <div class="flex justify-start">
              <img src="./trialdemon/public/imgs/logofinal.png" class="pb-1 mr-2 w-8 sm:w-8" alt="TrialDemon logo" />
              <span class="self-center text-xl sm:text-2xl font-semibold whitespace-nowrap text-announcement">TrialDemon</span>
            </div>
    
      
            <div class="flex mt-8 space-x-6 text-gray-500 sm:mt-0">
              <a class="hover:opacity-75" href="" target="_blank" rel="noreferrer">
                <span class="sr-only"> Facebook </span>
      
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                  <path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd" />
                </svg>
              </a>
      
              <a class="hover:opacity-75" href="" target="_blank" rel="noreferrer">
                <span class="sr-only"> Instagram </span>
      
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                  <path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" clip-rule="evenodd" />
                </svg>
              </a>
      
              <a class="hover:opacity-75" href="" target="_blank" rel="noreferrer">
                <span class="sr-only"> Twitter </span>
      
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                  <path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84" />
                </svg>
              </a>
      
              <a class="hover:opacity-75" href="" target="_blank" rel="noreferrer">
                <span class="sr-only"> GitHub </span>
      
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                  <path fill-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z" clip-rule="evenodd" />
                </svg>
              </a>
            </div>
          </div>
      
          <div class="grid grid-cols-1 gap-8 pt-12 border-t border-gray-100 sm:grid-cols-2 lg:grid-cols-4">
            <div>
              <p class="font-medium">
                Company
              </p>
      
              <nav class="flex flex-col mt-4 space-y-2 text-sm text-gray-500">
                <a class="hover:opacity-75" href="./index"> About </a>
                <a class="hover:opacity-75" href="./blog"> Blog </a>
              </nav>
            </div>
      
            <div>
              <p class="font-medium">
                Services
              </p>
      
              <nav class="flex flex-col mt-4 space-y-2 text-sm text-gray-500">
                <a class="hover:opacity-75" href="./index"> Temporary email generator </a>
                <a class="hover:opacity-75" href="./index"> Virtual debit card generator </a>
              </nav>
            </div>
      
            <div>
              <p class="font-medium">
                Helpful Links
              </p>
      
              <nav class="flex flex-col mt-4 space-y-2 text-sm text-gray-500">
                <a class="hover:opacity-75" href="./index#faq"> FAQs </a>
                <a class="hover:opacity-75" href="./tutorial"> Tutorial </a>
              </nav>
            </div>
      
            <div>
              <p class="font-medium">
                Legal
              </p>
              <nav class="flex flex-col mt-4 space-y-2 text-sm text-gray-500">
              <a class="hover:opacity-75" target="_blank" href="./terms"> Privacy Policy </a>
                <a class="hover:opacity-75" target="_blank" href="./terms"> Terms & Conditions </a>
                <a class="hover:opacity-75" href="./terms"> Refund Policy </a>
              </nav>
            </div>
          </div>
      
          <p class="text-xs text-gray-500">
            &copy; 2023 Demon Technologies LLC
          </p>
          <p class="pr-4 text-sm text-gray-500">
          Demon Technologies LLC provides the TrialDemon Visa®️ Card, which is issued by Celtic Bank, a Utah-chartered Industrial Bank (Member FDIC). TrialDemon is not currently endorsed by supported subscription providers listed on TrialDemon's website and products.
          </p>
        </div>
      </footer>
</section>

</div>
<script src="./trialdemon/js/mobile.js"></script>
<script src="./trialdemon/js/index.js"></script>
</body>
</html>