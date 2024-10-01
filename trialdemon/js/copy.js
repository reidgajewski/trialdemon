const carddiv = document.getElementById('carddiv');
const expdiv = document.getElementById('expdiv');
const cvcdiv = document.getElementById('cvcdiv');
const copied = document.getElementById('copied');
const emailbutton = document.getElementById('emailBox');
const addressbutton = document.getElementById('addressbutton');
const citybutton = document.getElementById('citybutton');
const statebutton = document.getElementById('statebutton');
const zipbutton = document.getElementById('zipbutton');

carddiv.addEventListener('click', () => {
    const cardnumm = document.getElementById('cardnum').innerHTML;
    navigator.clipboard.writeText(cardnumm);
    console.log(cardnumm);
    copied.style.visibility = "visible";
    setTimeout(function(){
    copied.style.visibility = "hidden";
    },2500);
})

expdiv.addEventListener('click', () => {
    const cardexp = document.getElementById('cardexp').innerHTML;
    navigator.clipboard.writeText(cardexp);
    console.log(cardexp);
    copied.style.visibility = "visible";
    setTimeout(function(){
        copied.style.visibility = "hidden";
    },2500);
})

cvcdiv.addEventListener('click', () => {
    const cardcvc = document.getElementById('cardcvc').innerHTML;
    navigator.clipboard.writeText(cardcvc);
    console.log(cardcvc);
    copied.style.visibility = "visible";
    setTimeout(function(){
        copied.style.visibility = "hidden";
    },2500);
})

emailbutton.addEventListener('click', () => {
    const contactemail = document.getElementById('emailInfo').innerHTML;
    navigator.clipboard.writeText(contactemail);
    console.log(contactemail);
    copied.style.visibility = "visible";
    setTimeout(function(){
        copied.style.visibility = "hidden";
    },2500);
})

addressbutton.addEventListener('click', () => {
    const contactaddress = document.getElementById('address').innerHTML;
    navigator.clipboard.writeText(contactaddress);
    console.log(contactaddress);
    copied.style.visibility = "visible";
    setTimeout(function(){
        copied.style.visibility = "hidden";
    },2500);
})

citybutton.addEventListener('click', () => {
    const contactcity = document.getElementById('city').innerHTML;
    navigator.clipboard.writeText(contactcity);
    console.log(contactcity);
    copied.style.visibility = "visible";
    setTimeout(function(){
        copied.style.visibility = "hidden";
    },2500);
})

statebutton.addEventListener('click', () => {
    const contactstate = document.getElementById('state').innerHTML;
    navigator.clipboard.writeText(contactstate);
    console.log(contactstate);
    copied.style.visibility = "visible";
    setTimeout(function(){
        copied.style.visibility = "hidden";
    },2500);
})

zipbutton.addEventListener('click', () => {
    const contactzip = document.getElementById('zip').innerHTML;
    navigator.clipboard.writeText(contactzip);
    console.log(contactzip);
    copied.style.visibility = "visible";
    setTimeout(function(){
        copied.style.visibility = "hidden";
    },2500);
})