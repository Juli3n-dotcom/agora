
// modal add member
let modalBtn = document.getElementById('add_team_member')
let modalAddMember = document.querySelector('.modal-bg')
let modalClose = document.querySelector('.modal-close')
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

// modal delete member

// let modalDeleteBtn = document.querySelectorAll('delete_team_member');
// let modalDeleteMember = document.querySelector('.modal-bg-delete')

// modalDeleteBtn.addEventListener('click', function () {
//     modalDeleteMember.classList.add('active')
// })


