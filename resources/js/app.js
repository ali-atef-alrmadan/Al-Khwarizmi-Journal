require('./bootstrap');
import Alpine from 'alpinejs';
import { isEmpty } from 'lodash';
window.Alpine = Alpine;
Alpine.start();

let btn_user = document.querySelector('.btn-user');
let list_user = document.querySelector('.list-user');
btn_user.addEventListener('click',()=>{
    list_user.classList.toggle('hidden');
})
document.addEventListener('scroll',()=>{
    list_user.classList.add('hidden');
})
let btn_menu = document.querySelector('.btn-menu');
let list_menu = document.querySelector('.list-menu');
btn_menu.addEventListener('click',()=>{
    list_menu.classList.toggle('hidden');
})
document.addEventListener('scroll',()=>{
    list_menu.classList.add('hidden');
})


window.addEventListener('scroll',()=>{
    // feaders code
    const feaders = document.querySelectorAll('.feaders');
    const windowHeight = window.innerHeight;
    const feadPoint = 150;
    feaders.forEach(feader=>{
        const feaderTop = feader.getBoundingClientRect().top;
        if(feaderTop <  windowHeight - feadPoint){
            feader.classList.add('fade-in');
        }
    })
    // counter code
    const counterSection = document.querySelector('.CounterEle');
    const counterTop = counterSection.getBoundingClientRect().top;
    if(counterTop <  windowHeight - feadPoint){
        setTimeout(()=>{
            const counters = document.querySelectorAll('.counter');
            const speed = 2000; // The lower the slower
            counters.forEach(counter => {
                const updateCount = () => {
                    const target = +counter.getAttribute('data-target');
                    const count = +counter.innerText;
                    // Lower inc to slow and higher to slow
                    const inc = target / speed;
                    // console.log(inc);
                    // console.log(count);
                    // Check if target is reached
                    if (count < target) {
                        // Add inc to count and output in counter
                        counter.innerText = count + inc;
                        // Call function every ms
                        setTimeout(updateCount, 1);
                    } else {
                        counter.innerText = target;
                    }
                };
                updateCount();
            });
        },500)
    }
})

function changeName(ele){
    let id2 = ele.id.toString().concat('0');
    let fileNameField = document.getElementById(id2);
    let UploadedFileName = ele.files[0].name;
    fileNameField.innerText = UploadedFileName;
}



