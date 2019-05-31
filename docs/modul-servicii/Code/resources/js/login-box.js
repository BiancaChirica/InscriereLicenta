let modal_login = document.getElementById('login');
let modal_add_account = document.getElementById('add-account');
let modal_forgot = document.getElementById('forgot-pass-modal');


window.onclick = function (event) {
    if (event.target === modal_login) {
        modal_login.style.display = "none";
    } else if (event.target === modal_add_account) {
        modal_add_account.style.display = "none"
    } else if (event.target === modal_forgot) {
        modal_forgot.style.display = 'none'
    }
};


function modalForgotPass() {
    document.getElementById('forgot-pass-modal').style.display='block';
    modal_login.style.display='none';
}
