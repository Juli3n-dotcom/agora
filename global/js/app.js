var header = document.querySelector('header');
var menu = document.querySelector('.menu')
var menuToggle = document.querySelector('.menu__icon')
var icon_one = document.querySelector('.menu__icon--one')
var icon_two = document.querySelector('.menu__icon--two')
var icon_three = document.querySelector('.menu__icon--three')

window.addEventListener('scroll', function () { 
  header.classList.toggle('sticky', window.scrollY > 0)
  icon_one.classList.toggle('sticky', window.scrollY > 0)
  icon_two.classList.toggle('sticky', window.scrollY > 0)
  icon_three.classList.toggle('sticky',window.scrollY > 0)
})

   
menuToggle.addEventListener('click', function () {  
  if (window.scrollY > 0) {
    menu.classList.toggle('active')
  } else {
     menu.classList.toggle('active')
    header.classList.toggle('sticky')
  icon_one.classList.toggle('sticky')
  icon_two.classList.toggle('sticky')
  icon_three.classList.toggle('sticky')
  }
    })

$('.menu__icon').click(function () {
  $('.menu__icon--one').toggleClass('active')
  $('.menu__icon--two').toggleClass('active')
    $('.menu__icon--three').toggleClass('active')
    $('.nav__list').toggleClass('active')
});