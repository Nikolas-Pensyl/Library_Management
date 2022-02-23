var staffer = document.querySelector('input[id="staff"]');
var managerer = document.querySelector('input[id="manager"]');
var userer = document.querySelector('input[id="usern"]');
var passwer = document.querySelector('input[id="passw"]');
var conpasser = document.querySelector('input[id="conpassw"]');
var text_man = document.querySelector('label[for="manager"]');
var text_user = document.querySelector('label[for="usern"]');
var text_pass = document.querySelector('label[for="passw"]');
var text_conpass = document.querySelector('label[for="conpassw"]');


managerer.style.visibility = 'hidden';
userer.style.visibility = 'hidden';
passwer.style.visibility = 'hidden';
conpasser.style.visibility = 'hidden';
text_user.style.visibility = 'hidden';
text_pass.style.visibility = 'hidden';
text_conpass.style.visibility = 'hidden';
text_man.style.visibility = 'hidden';

staffer.addEventListener('change',  ()=> {    

if(staffer.checked) {
    managerer.style.visibility = 'visible';
    userer.style.visibility = 'visible';
    passwer.style.visibility = 'visible';
    conpasser.style.visibility = 'visible';
    text_user.style.visibility = 'visible';
    text_pass.style.visibility = 'visible';
    text_conpass.style.visibility = 'visible';
    text_man.style.visibility = 'visible';
    userer.value = '';
    passwer.value = '';
    conpasser.value = '';
} else {
    managerer.style.visibility = 'hidden';
    userer.style.visibility = 'hidden';
    passwer.style.visibility = 'hidden';
    conpasser.style.visibility = 'hidden';
    text_user.style.visibility = 'hidden';
    text_pass.style.visibility = 'hidden';
    text_conpass.style.visibility = 'hidden';
    text_man.style.visibility = 'hidden';
}
});