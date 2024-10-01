const testiDiv = document.getElementById('testiDiv');
const testiButton = document.getElementById('testiButton');
const testiBottom = document.getElementById('testiBottom');


testiButton.addEventListener('click', () => {
    testiButton.style.display = 'none';
    testiDiv.classList.remove('max-h-[33rem]')
    testiDiv.classList.add('max-h-full')
    testiBottom.classList.remove('bg-gradient-to-t')
    testiBottom.classList.remove('from-white')
    testiBottom.classList.remove('dark:from-slate-900')
})