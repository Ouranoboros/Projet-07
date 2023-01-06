const username = document.getElementById('name');
const birthday = document.getElementById('birthday');
const email = document.getElementById('email');
const phone = document.getElementById('phone');
const password = document.getElementById('password');

form.addEventListener('submit', (e) => {
	if (checkInputs() == 5) {
		var f = 5;
	} else {
		e.preventDefault();
	}
});
function checkInputs() {
	var compteur = 0;
	// trim to remove the whitespaces
	const emailValue = email.value.trim();
	const phoneValue = phone.value.trim();
	const nameValue = username.value.trim();
	const birthdayValue = birthday.value.trim();
	const passwordValue = password.value.trim();

	if (nameValue == '') {
		setErrorFor(username, 'Le nom ne peut pas être vide');
	} else {
		setSuccessFor(username);
		compteur += 1;
	}
	if (emailValue === '') {
		setErrorFor(email, "L'email ne peut pas être vide");
	} else if (!isEmail(emailValue)) {
		setErrorFor(email, "L'email n'est pas valide");
	} else {
		setSuccessFor(email);
		compteur += 1;
	}

	if (phoneValue === '') {
		setErrorFor(phone, 'Le numéro ne peut pas être vide');
	} else if (!isPhone(phoneValue)) {
		setErrorFor(phone, 'Numéro pas valide');
	} else {
		setSuccessFor(phone);
		compteur += 1;
	}
	if (birthdayValue === '') {
		setErrorFor(birthday, 'Votre anniversaire ne peut pas être vide');
	} else {
		setSuccessFor(birthday);
		compteur += 1;
	}
	if (passwordValue === '') {
		setErrorFor(password, 'Votre mot de passe ne peut pas être vide');
	} else if (!isPassword(passwordValue)) {
		setErrorFor(password, 'Veuillez utiliser une majuscule et un caractère spécial');
	} else {
		setSuccessFor(password);
		compteur += 1;
	}
	return compteur;
}

function setErrorFor(input, message) {
	const formControl = input.parentElement;
	const small = formControl.querySelector('small');
	//formControl.className = 'form-control error';

	small.innerText = message;
}

function setSuccessFor(input) {
	const formControl = input.parentElement;
	//formControl.className = 'form-control success';
	const small = formControl.querySelector('small');
	//formControl.className = 'form-control error';
	small.innerText = '';
}

function isEmail(email) {
	return /^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/.test(email);
}

function isPhone(phone) {
	return /^\+33 [6-7]( [0-9]{2}){4}$/.test(phone);
}
function isPassword(password) {
	var carac = 0;
	const caracSpecial = "!:/;?,&é'-è_())[]+-*$%";
	for (c in caracSpecial) {
		if (password.includes(caracSpecial[c])) {
			carac += 1;
		}
	}
	var chiffre = 0;
	const chiffres = '0123456789';
	for (c in chiffres) {
		if (password.includes(chiffres[c])) {
			chiffre += 1;
		}
	}
	return password.length > 8 && carac > 0 && chiffre > 0;
}
