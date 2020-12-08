
// modal add member
var modalBtn = document.getElementById('add_team_member')
var modalAddMember = document.querySelector('.modal-bg')
var modalClose = document.querySelector('.modal-close')
let validModal = document.getElementById('add_team_member')

modalBtn.addEventListener('click', function () {
    modalAddMember.classList.add('active')
})

modalClose.addEventListener('click', function () {
    modalAddMember.classList.remove('active')
})

// validModal.addEventListener('click', function () {
//     modalAddMember.classList.remove('active')
// })

