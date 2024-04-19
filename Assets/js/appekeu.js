// Get reference to the DOOM elements

const signUp = document.getElementById('sign-up'),
	signIn = document.getElementById('sign-in'),
	LoginIn = document.getElementById('login-in'),
	LoginUp = document.getElementById('login-up');

// add Event Listener
signUp.addEventListener('click', () => {
	// remove classes first if they exist
	LoginIn.classList.remove('block');
	LoginUp.classList.remove('none');

	// add classes
	LoginIn.classList.toggle('none');
	LoginUp.classList.toggle('block');
});

signIn.addEventListener('click', () => {
	// remove classes first if they exist
	LoginIn.classList.remove('none');
	LoginUp.classList.remove('block');

	// add classes
	LoginIn.classList.toggle('block');
	LoginUp.classList.toggle('none');
});