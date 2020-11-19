/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


window.onload = function () {
    buttonListener();
};

function buttonListener() {
var submitBtnListener = document.getElementById("postingSubmit");

submitBtnListener.addEventListener("click", validateForm);
}
    
function validateForm(event1) {
    
    event1.preventDefault();

}

