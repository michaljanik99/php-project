
 const btn_password = document.querySelector('.btn_password');
 const btn_card = document.querySelector('.btn_card');
 const btn_identify = document.querySelector('.btn_identify');
 const btn_new = document.querySelector('.add_new1');
 const btn_cancel = document.querySelector('.btn_cancel');
 const btn_add = document.querySelector('.btn_add');
 const selectedOption = document.querySelector('.option');
 const addPassword = document.querySelector('.addPassword');
 const addCard = document.querySelector('.addCard');
 const addData = document.querySelector('.addData');


 const blockPasswords = document.querySelectorAll('.block-passwords');
 const blockCards = document.querySelectorAll('.block-cards');
 const blockPersonal = document.querySelectorAll('.block-personal_data');

 const showPasswords = () => {
     blockPasswords.forEach(function (element) {
         element.classList.toggle('display_ye');
     })
     blockCards.forEach(function (element) {
         element.classList.remove('display_ye');
     })
     blockPersonal.forEach(function (element) {
         element.classList.remove('display_ye');
     })
 }

 const showCards = () => {
     blockCards.forEach(function (element) {
         element.classList.toggle('display_ye');
     })
     blockPasswords.forEach(function (element) {
         element.classList.remove('display_ye');
     })
     blockPersonal.forEach(function (element) {
         element.classList.remove('display_ye');
     })
 }

 const showPersonal = () => {
     blockPersonal.forEach(function (element) {
         element.classList.toggle('display_ye');
     })
     blockCards.forEach(function (element) {
         element.classList.remove('display_ye');
     })
     blockPasswords.forEach(function (element) {
         element.classList.remove('display_ye');
     })
 }


 btn_cancel.addEventListener('click', closeNewRecord);
 btn_new.addEventListener('click', addNewRecord);
 btn_password.addEventListener('click', showPasswords);
 btn_card.addEventListener('click', showCards);
 btn_identify.addEventListener('click', showPersonal);


