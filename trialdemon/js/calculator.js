// mobile stuff
const mobileOpen = document.getElementById("mobileOpen");
const mobileClose = document.getElementById("mobileClose");
const mobileMenu = document.getElementById("mobile-menu");
const mobileButton = document.getElementById("mobileButton");

mobileButton.addEventListener('click', () => {
    const status = mobileButton.getAttribute("aria-expanded")
    if(status === "false") {
        mobileOpen.style.display = "none";
        mobileMenu.style.display = "block";
        mobileClose.style.display = "block";
        mobileButton.setAttribute("aria-expanded", "true");
    } else if(status === "true") {
        mobileClose.style.display = "none";
        mobileMenu.style.display = "none";
        mobileOpen.style.display = "block";
        mobileButton.setAttribute("aria-expanded", "false");
    }
  })

// desktop stuff
const desktopClosed = document.getElementById("desktopClosed");
const desktopOpen = document.getElementById("desktopOpen");
const desktopDropdownButton = document.getElementById("desktopDropdownButton");
const desktopDropdown = document.getElementById("desktopDropdown");

desktopDropdownButton.addEventListener('click', () => {
    if(desktopDropdownButton.getAttribute("aria-expanded") === "false") {
        desktopDropdownButton.setAttribute("aria-expanded", "true");
        desktopDropdown.style.display = "block";
        desktopClosed.style.display = "none";
        desktopOpen.style.display = "block";
    } else {
        desktopDropdownButton.setAttribute("aria-expanded", "false");
        desktopDropdown.style.display = "none";
        desktopOpen.style.display = "none";
        desktopClosed.style.display = "block";
    }
})


// creating map and setting ids / values
function createPricesMap() {
    const pricesMap = new Map()
    pricesMap.set('hulu', 15)
    pricesMap.set('quizlet', 8)
    pricesMap.set('amc', 7)
    pricesMap.set('skillshare', 14)
    pricesMap.set('canva', 13)
    pricesMap.set('showtime', 11)
    pricesMap.set('adobe', 29)
    pricesMap.set('headspace', 13)
    pricesMap.set('calm', 6)
    pricesMap.set('yt', 18)
    pricesMap.set('fubo', 8)
    pricesMap.set('prime', 15)
    pricesMap.set('duolingo', 7)
    pricesMap.set('audible', 15)
    pricesMap.set('paramount', 10)
    pricesMap.set('crunchy', 15)
    pricesMap.set('fox', 6)
    pricesMap.set('espn', 10)
    pricesMap.set('vimeo', 25)
    pricesMap.set('starz', 9)
    pricesMap.set('hbo', 10)
    pricesMap.set('coursera', 50)
    return pricesMap
}
function createTappedMap() {
    const tappedMap = new Map()
    tappedMap.set('hulu', 0)
    tappedMap.set('quizlet', 0)
    tappedMap.set('amc', 0)
    tappedMap.set('skillshare', 0)
    tappedMap.set('canva', 0)
    tappedMap.set('showtime', 0)
    tappedMap.set('adobe', 0)
    tappedMap.set('headspace', 0)
    tappedMap.set('calm', 0)
    tappedMap.set('yt', 0)
    tappedMap.set('fubo', 0)
    tappedMap.set('prime', 0)
    tappedMap.set('duolingo', 0)
    tappedMap.set('audible', 0)
    tappedMap.set('paramount', 0)
    tappedMap.set('crunchy', 0)
    tappedMap.set('fox', 0)
    tappedMap.set('espn', 0)
    tappedMap.set('vimeo', 0)
    tappedMap.set('starz', 0)
    tappedMap.set('hbo', 0)
    tappedMap.set('coursera', 0)
    return tappedMap
}
pricesMap = createPricesMap()
tappedMap = createTappedMap()
let dollarsSaved = 0
const emoji = document.getElementById('emoji')
const nextButton = document.getElementById('nextButton')

const hulu = document.getElementById('hulu')
const quizlet = document.getElementById('quizlet')
const amc = document.getElementById('amc')
const skillshare = document.getElementById('skillshare')
const canva = document.getElementById('canva')
const showtime = document.getElementById('showtime')
const adobe = document.getElementById('adobe')
const headspace = document.getElementById('headspace')
const calm = document.getElementById('calm')
const yt = document.getElementById('yt')
const fubo = document.getElementById('fubo')
const prime = document.getElementById('prime')
const duolingo = document.getElementById('duolingo')
const audible = document.getElementById('audible')
const paramount = document.getElementById('paramount')
const crunchy = document.getElementById('crunchy')
const fox = document.getElementById('fox')
const espn = document.getElementById('espn')
const vimeo = document.getElementById('vimeo')
const starz = document.getElementById('starz')
const hbo = document.getElementById('hbo')
const coursera = document.getElementById('coursera')


// counting function
function changeEmoji(dollarsSaved) {
    emojiChange = null
    if(dollarsSaved == 0) {
        emojiChange = "😐"
    } else if(dollarsSaved > 0 && dollarsSaved <= 25) {
        emojiChange = "😎"
    } else if(dollarsSaved > 25 && dollarsSaved <= 45) {
        emojiChange = "😜"
    } else if(dollarsSaved > 45 && dollarsSaved <= 55) {
        emojiChange = "🥶"
    } else if(dollarsSaved > 55 && dollarsSaved <= 65) {
        emojiChange = "🥵"
    } else if(dollarsSaved > 65 && dollarsSaved <= 1000) {
        emojiChange = "🤯"
    }
    return emojiChange
}
function counter(name, dollarsSaved) {
    price = pricesMap.get(name)
    tapped = tappedMap.get(name)
    if(tapped == 0) {
        dollarsSaved += price
        tappedMap.set(name, 1)
    } else if(tapped == 1) {
        dollarsSaved -= price
        tappedMap.set(name, 0)
    }
    return dollarsSaved
}

function displayDolllarsSaved(dollarsSaved) {
    let stringDollarsSaved = "$".concat(dollarsSaved.toString());
    document.getElementById('count').innerHTML = stringDollarsSaved
    newEmoji = changeEmoji(dollarsSaved)
    document.getElementById('emoji').innerHTML = newEmoji
}

// listeners
hulu.addEventListener('click', 
    function() {
        dollarsSaved = counter("hulu", dollarsSaved);
        
        if(hulu.getAttribute("aria-clicked") === "false") {
            hulu.setAttribute("aria-clicked", "true");
            hulu.style.borderColor = "#0856ec";
        } else if(hulu.getAttribute("aria-clicked") === "true") {
            hulu.setAttribute("aria-clicked", "false");
            hulu.style.borderColor = "#d1d5db";
        }

        displayDolllarsSaved(dollarsSaved)

        const urlParams = new URLSearchParams(window.location.search);
        const hide = urlParams.get('hide');
        if(hide == "true") {
            nextButton.style.display = "none"
        } else {
            nextButton.style.display = "block"
        }
    }
);

quizlet.addEventListener('click',
    function() {
        dollarsSaved = counter("quizlet", dollarsSaved);
        if(quizlet.getAttribute("aria-clicked") === "false") {
            quizlet.setAttribute("aria-clicked", "true");
            quizlet.style.borderColor = "#0856ec";
        } else if(quizlet.getAttribute("aria-clicked") === "true") {
            quizlet.setAttribute("aria-clicked", "false");
            quizlet.style.borderColor = "#d1d5db";
        }
        displayDolllarsSaved(dollarsSaved)
        const urlParams = new URLSearchParams(window.location.search);
        const hide = urlParams.get('hide');
        if(hide == "true") {
            nextButton.style.display = "none"
        } else {
            nextButton.style.display = "block"
        }
    }
);

amc.addEventListener('click',  
    function() {
        dollarsSaved = counter("amc", dollarsSaved);
        if(amc.getAttribute("aria-clicked") === "false") {
            amc.setAttribute("aria-clicked", "true");
            amc.style.borderColor = "#0856ec";
        } else if(amc.getAttribute("aria-clicked") === "true") {
            amc.setAttribute("aria-clicked", "false");
            amc.style.borderColor = "#d1d5db";
        }
        displayDolllarsSaved(dollarsSaved)
        const urlParams = new URLSearchParams(window.location.search);
        const hide = urlParams.get('hide');
        if(hide == "true") {
            nextButton.style.display = "none"
        } else {
            nextButton.style.display = "block"
        }
    }
);

skillshare.addEventListener('click',
    function() {
        dollarsSaved = counter("skillshare", dollarsSaved);
        if(skillshare.getAttribute("aria-clicked") === "false") {
            skillshare.setAttribute("aria-clicked", "true");
            skillshare.style.borderColor = "#0856ec";
        } else if(skillshare.getAttribute("aria-clicked") === "true") {
            skillshare.setAttribute("aria-clicked", "false");
            skillshare.style.borderColor = "#d1d5db";
        }
        displayDolllarsSaved(dollarsSaved)
        const urlParams = new URLSearchParams(window.location.search);
        const hide = urlParams.get('hide');
        if(hide == "true") {
            nextButton.style.display = "none"
        } else {
            nextButton.style.display = "block"
        }
    }
);

canva.addEventListener('click',
    function() {
        dollarsSaved = counter("canva", dollarsSaved);
        if(canva.getAttribute("aria-clicked") === "false") {
            canva.setAttribute("aria-clicked", "true");
            canva.style.borderColor = "#0856ec";
        } else if(canva.getAttribute("aria-clicked") === "true") {
            canva.setAttribute("aria-clicked", "false");
            canva.style.borderColor = "#d1d5db";
        }
        displayDolllarsSaved(dollarsSaved)
        const urlParams = new URLSearchParams(window.location.search);
        const hide = urlParams.get('hide');
        if(hide == "true") {
            nextButton.style.display = "none"
        } else {
            nextButton.style.display = "block"
        }
    }
);

showtime.addEventListener('click',
    function() {
        dollarsSaved = counter("showtime", dollarsSaved);
        if(showtime.getAttribute("aria-clicked") === "false") {
            showtime.setAttribute("aria-clicked", "true");
            showtime.style.borderColor = "#0856ec";
        } else if(showtime.getAttribute("aria-clicked") === "true") {
            showtime.setAttribute("aria-clicked", "false");
            showtime.style.borderColor = "#d1d5db";
        }
        displayDolllarsSaved(dollarsSaved)
        const urlParams = new URLSearchParams(window.location.search);
        const hide = urlParams.get('hide');
        if(hide == "true") {
            nextButton.style.display = "none"
        } else {
            nextButton.style.display = "block"
        }
    }
);

adobe.addEventListener('click',
    function() {
        dollarsSaved = counter("adobe", dollarsSaved);
        if(adobe.getAttribute("aria-clicked") === "false") {
            adobe.setAttribute("aria-clicked", "true");
            adobe.style.borderColor = "#0856ec";
        } else if(adobe.getAttribute("aria-clicked") === "true") {
            adobe.setAttribute("aria-clicked", "false");
            adobe.style.borderColor = "#d1d5db";
        }
        displayDolllarsSaved(dollarsSaved)
        const urlParams = new URLSearchParams(window.location.search);
        const hide = urlParams.get('hide');
        if(hide == "true") {
            nextButton.style.display = "none"
        } else {
            nextButton.style.display = "block"
        }
    }
);

headspace.addEventListener('click',
    function() {
        dollarsSaved = counter("headspace", dollarsSaved);
        if(headspace.getAttribute("aria-clicked") === "false") {
            headspace.setAttribute("aria-clicked", "true");
            headspace.style.borderColor = "#0856ec";
        } else if(headspace.getAttribute("aria-clicked") === "true") {
            headspace.setAttribute("aria-clicked", "false");
            headspace.style.borderColor = "#d1d5db";
        }
        displayDolllarsSaved(dollarsSaved)
        const urlParams = new URLSearchParams(window.location.search);
        const hide = urlParams.get('hide');
        if(hide == "true") {
            nextButton.style.display = "none"
        } else {
            nextButton.style.display = "block"
        }
    }
);

calm.addEventListener('click',
    function() {
        dollarsSaved = counter("calm", dollarsSaved);
        if(calm.getAttribute("aria-clicked") === "false") {
            calm.setAttribute("aria-clicked", "true");
            calm.style.borderColor = "#0856ec";
        } else if(calm.getAttribute("aria-clicked") === "true") {
            calm.setAttribute("aria-clicked", "false");
            calm.style.borderColor = "#d1d5db";
        }
        displayDolllarsSaved(dollarsSaved)
        const urlParams = new URLSearchParams(window.location.search);
        const hide = urlParams.get('hide');
        if(hide == "true") {
            nextButton.style.display = "none"
        } else {
            nextButton.style.display = "block"
        }
    }
);

yt.addEventListener('click',
    function() {
        dollarsSaved = counter("yt", dollarsSaved);
        if(yt.getAttribute("aria-clicked") === "false") {
            yt.setAttribute("aria-clicked", "true");
            yt.style.borderColor = "#0856ec";
        } else if(yt.getAttribute("aria-clicked") === "true") {
            yt.setAttribute("aria-clicked", "false");
            yt.style.borderColor = "#d1d5db";
        }
        displayDolllarsSaved(dollarsSaved)
        const urlParams = new URLSearchParams(window.location.search);
        const hide = urlParams.get('hide');
        if(hide == "true") {
            nextButton.style.display = "none"
        } else {
            nextButton.style.display = "block"
        }
    }
);

fubo.addEventListener('click',
    function() {
        dollarsSaved = counter("fubo", dollarsSaved);
        if(fubo.getAttribute("aria-clicked") === "false") {
            fubo.setAttribute("aria-clicked", "true");
            fubo.style.borderColor = "#0856ec";
        } else if(fubo.getAttribute("aria-clicked") === "true") {
            fubo.setAttribute("aria-clicked", "false");
            fubo.style.borderColor = "#d1d5db";
        }
        displayDolllarsSaved(dollarsSaved)
        const urlParams = new URLSearchParams(window.location.search);
        const hide = urlParams.get('hide');
        if(hide == "true") {
            nextButton.style.display = "none"
        } else {
            nextButton.style.display = "block"
        }
    }
);

prime.addEventListener('click',
    function() {
        dollarsSaved = counter("prime", dollarsSaved);
        if(prime.getAttribute("aria-clicked") === "false") {
            prime.setAttribute("aria-clicked", "true");
            prime.style.borderColor = "#0856ec";
        } else if(prime.getAttribute("aria-clicked") === "true") {
            prime.setAttribute("aria-clicked", "false");
            prime.style.borderColor = "#d1d5db";
        }
        displayDolllarsSaved(dollarsSaved)
        const urlParams = new URLSearchParams(window.location.search);
        const hide = urlParams.get('hide');
        if(hide == "true") {
            nextButton.style.display = "none"
        } else {
            nextButton.style.display = "block"
        }
    }
);

duolingo.addEventListener('click',
    function() {
        dollarsSaved = counter("duolingo", dollarsSaved);
        if(duolingo.getAttribute("aria-clicked") === "false") {
            duolingo.setAttribute("aria-clicked", "true");
            duolingo.style.borderColor = "#0856ec";
        } else if(duolingo.getAttribute("aria-clicked") === "true") {
            duolingo.setAttribute("aria-clicked", "false");
            duolingo.style.borderColor = "#d1d5db";
        }
        displayDolllarsSaved(dollarsSaved)
        const urlParams = new URLSearchParams(window.location.search);
        const hide = urlParams.get('hide');
        if(hide == "true") {
            nextButton.style.display = "none"
        } else {
            nextButton.style.display = "block"
        }
    }
);

audible.addEventListener('click',
    function() {
        dollarsSaved = counter("audible", dollarsSaved);
        if(audible.getAttribute("aria-clicked") === "false") {
            audible.setAttribute("aria-clicked", "true");
            audible.style.borderColor = "#0856ec";
        } else if(audible.getAttribute("aria-clicked") === "true") {
            audible.setAttribute("aria-clicked", "false");
            audible.style.borderColor = "#d1d5db";
        }
        displayDolllarsSaved(dollarsSaved)
        const urlParams = new URLSearchParams(window.location.search);
        const hide = urlParams.get('hide');
        if(hide == "true") {
            nextButton.style.display = "none"
        } else {
            nextButton.style.display = "block"
        }
    }
);

paramount.addEventListener('click',
    function() {
        dollarsSaved = counter("paramount", dollarsSaved);
        if(paramount.getAttribute("aria-clicked") === "false") {
            paramount.setAttribute("aria-clicked", "true");
            paramount.style.borderColor = "#0856ec";
        } else if(paramount.getAttribute("aria-clicked") === "true") {
            paramount.setAttribute("aria-clicked", "false");
            paramount.style.borderColor = "#d1d5db";
        }
        displayDolllarsSaved(dollarsSaved)
        const urlParams = new URLSearchParams(window.location.search);
        const hide = urlParams.get('hide');
        if(hide == "true") {
            nextButton.style.display = "none"
        } else {
            nextButton.style.display = "block"
        }
    }
);

crunchy.addEventListener('click',
    function() {
        dollarsSaved = counter("crunchy", dollarsSaved);
        if(crunchy.getAttribute("aria-clicked") === "false") {
            crunchy.setAttribute("aria-clicked", "true");
            crunchy.style.borderColor = "#0856ec";
        } else if(crunchy.getAttribute("aria-clicked") === "true") {
            crunchy.setAttribute("aria-clicked", "false");
            crunchy.style.borderColor = "#d1d5db";
        }
        displayDolllarsSaved(dollarsSaved)
        const urlParams = new URLSearchParams(window.location.search);
        const hide = urlParams.get('hide');
        if(hide == "true") {
            nextButton.style.display = "none"
        } else {
            nextButton.style.display = "block"
        }
    }
);

fox.addEventListener('click',
    function() {
        dollarsSaved = counter("fox", dollarsSaved);
        if(fox.getAttribute("aria-clicked") === "false") {
            fox.setAttribute("aria-clicked", "true");
            fox.style.borderColor = "#0856ec";
        } else if(fox.getAttribute("aria-clicked") === "true") {
            fox.setAttribute("aria-clicked", "false");
            fox.style.borderColor = "#d1d5db";
        }
        displayDolllarsSaved(dollarsSaved)
        const urlParams = new URLSearchParams(window.location.search);
        const hide = urlParams.get('hide');
        if(hide == "true") {
            nextButton.style.display = "none"
        } else {
            nextButton.style.display = "block"
        }
    }
);

espn.addEventListener('click',
    function() {
        dollarsSaved = counter("espn", dollarsSaved);
        if(espn.getAttribute("aria-clicked") === "false") {
            espn.setAttribute("aria-clicked", "true");
            espn.style.borderColor = "#0856ec";
        } else if(espn.getAttribute("aria-clicked") === "true") {
            espn.setAttribute("aria-clicked", "false");
            espn.style.borderColor = "#d1d5db";
        }
        displayDolllarsSaved(dollarsSaved)
        const urlParams = new URLSearchParams(window.location.search);
        const hide = urlParams.get('hide');
        if(hide == "true") {
            nextButton.style.display = "none"
        } else {
            nextButton.style.display = "block"
        }
    }       
);

vimeo.addEventListener('click',
    function() {
        dollarsSaved = counter("vimeo", dollarsSaved);
        if(vimeo.getAttribute("aria-clicked") === "false") {
            vimeo.setAttribute("aria-clicked", "true");
            vimeo.style.borderColor = "#0856ec";
        } else if(vimeo.getAttribute("aria-clicked") === "true") {
            vimeo.setAttribute("aria-clicked", "false");
            vimeo.style.borderColor = "#d1d5db";
        }
        displayDolllarsSaved(dollarsSaved)
        const urlParams = new URLSearchParams(window.location.search);
        const hide = urlParams.get('hide');
        if(hide == "true") {
            nextButton.style.display = "none"
        } else {
            nextButton.style.display = "block"
        }
    }
);

starz.addEventListener('click',
    function() {
        dollarsSaved = counter("starz", dollarsSaved);
        if(starz.getAttribute("aria-clicked") === "false") {
            starz.setAttribute("aria-clicked", "true");
            starz.style.borderColor = "#0856ec";
        } else if(starz.getAttribute("aria-clicked") === "true") {
            starz.setAttribute("aria-clicked", "false");
            starz.style.borderColor = "#d1d5db";
        }
        displayDolllarsSaved(dollarsSaved)
        const urlParams = new URLSearchParams(window.location.search);
        const hide = urlParams.get('hide');
        if(hide == "true") {
            nextButton.style.display = "none"
        } else {
            nextButton.style.display = "block"
        }
    }
);

hbo.addEventListener('click',
    function() {
        dollarsSaved = counter("hbo", dollarsSaved);
        if(hbo.getAttribute("aria-clicked") === "false") {
            hbo.setAttribute("aria-clicked", "true");
            hbo.style.borderColor = "#0856ec";
        } else if(hbo.getAttribute("aria-clicked") === "true") {
            hbo.setAttribute("aria-clicked", "false");
            hbo.style.borderColor = "#d1d5db";
        }
        displayDolllarsSaved(dollarsSaved)
        const urlParams = new URLSearchParams(window.location.search);
        const hide = urlParams.get('hide');
        if(hide == "true") {
            nextButton.style.display = "none"
        } else {
            nextButton.style.display = "block"
        }
    }
);

coursera.addEventListener('click',
    function() {
        dollarsSaved = counter("coursera", dollarsSaved);
        if(coursera.getAttribute("aria-clicked") === "false") {
            coursera.setAttribute("aria-clicked", "true");
            coursera.style.borderColor = "#0856ec";
        } else if(coursera.getAttribute("aria-clicked") === "true") {
            coursera.setAttribute("aria-clicked", "false");
            coursera.style.borderColor = "#d1d5db";
        }
        displayDolllarsSaved(dollarsSaved)
        const urlParams = new URLSearchParams(window.location.search);
        const hide = urlParams.get('hide');
        if(hide == "true") {
            nextButton.style.display = "none"
        } else {
            nextButton.style.display = "block"
        }
    }
);




