const form = document.getElementById('form')
const firstName = document.getElementById('firstName')
const lastName = document.getElementById('lastName')
const phone = document.getElementById('phone')
const mail = document.getElementById('mail')
const subject = document.getElementById('subject')
const message = document.getElementById('message')

form.addEventListener('submit', (e) => {

    //input values
    const firstNameValue = firstName.value.trim();
    const lastNameValue = lastName.value.trim();
    const phoneValue = phone.value.trim();
    const mailValue = mail.value.trim();
    const subjectValue = subject.value.trim();
    const messageValue = message.value.trim();


    //FIRSTNAME
    if (firstNameValue === '' || firstNameValue == null) {
        //show error
        //add error class
        setErrorFor(firstName, 'Voornaam invullen')
        e.preventDefault();
    } else {
        //add success class
        setSuccessFor(firstName)
    }

    //LASTNAME
    if (lastNameValue === '' || lastNameValue == null) {
        setErrorFor(lastName, 'Achternaam invullen')
        e.preventDefault();
    } else {
        setSuccessFor(lastName)
    }

    //PHONE
    if (phoneValue === '' || phoneValue == null) {
        setErrorFor(phone, 'Mobiel invullen')
    } else if (!phoneVal(phoneValue)) {
        setErrorFor(phone, 'Ongeldig mobiel nummer!')
        e.preventDefault();
    } else {
        setSuccessFor(phone)
    }

    //MAIL
    if (mailValue === '' || mailValue == null) {
        setErrorFor(mail, 'Email invullen')
    } else if (!mailVal(mailValue)) {
        setErrorFor(mail, 'Ongeldige email!')
        e.preventDefault();
    } else {
        setSuccessFor(mail)
    }

    //SUBJECT
    if (subjectValue === '' || subjectValue == null) {
        setErrorFor(subject, 'Onderwerp invullen')
        e.preventDefault();
    } else {
        setSuccessFor(subject)
    }

    //MESSAGE
    if (messageValue === '' || messageValue == null) {
        setErrorFor(message, 'Vraag invullen')
        e.preventDefault();
    } else {

        setSuccessFor(message)
    }

})

function setErrorFor(input, message) {
    const formGroup = input.parentElement
    const small = formGroup.querySelector('small')

    small.innerText = message;

    formGroup.className = 'form-group error'

}

function setSuccessFor(input, message) {
    const formGroup = input.parentElement
    const small = formGroup.querySelector('small')

    small.innerText = message;

    formGroup.className = 'form-group success'

}

function mailVal(mail) {
    return /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/.test(mail);
}

function phoneVal(phone) {
    ///^[\s()+-]*([0-9][\s()+-]*){10,11}$/.test(phone);
    return /^(0[1-9]{3})[ -]?(\d{2})[ -]?(\d{2})[ -]?(\d{2})$/.test(phone);
}