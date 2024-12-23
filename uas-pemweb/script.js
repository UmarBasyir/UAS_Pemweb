document.getElementById('name').addEventListener('input', function() {
    const name = this.value;
    const nameError = document.getElementById('nameError');
    if (/\d/.test(name)) {
      nameError.textContent = 'Name should not contain numbers.';
    } else {
      nameError.textContent = '';
    }
  });
  
  document.getElementById('email').addEventListener('input', function() {
    const email = this.value;
    const emailError = document.getElementById('emailError');
    if (!email.includes('@')) {
      emailError.textContent = 'Email should contain @.';
    } else {
      emailError.textContent = '';
    }
  });
  
  document.getElementById('gender').addEventListener('change', function() {
    const gender = this.value;
    const genderError = document.getElementById('genderError');
    if (!gender) {
      genderError.textContent = 'Please select a gender.';
    } else {
      genderError.textContent = '';
    }
  });
  
  document.getElementById('interest').addEventListener('change', function() {
    const interest = this.value;
    const interestError = document.getElementById('interestError');
    if (!interest) {
      interestError.textContent = 'Please select an interest.';
    } else {
      interestError.textContent = '';
    }
  });
  
  document.getElementById('myForm').addEventListener('submit', function(event) {
    event.preventDefault();
    const name = document.getElementById('name').value;
    const email = document.getElementById('email').value;
    const gender = document.getElementById('gender').value;
    const interest = document.getElementById('interest').value;
  
    let isValid = true;
  
    if (/\d/.test(name)) {
      document.getElementById('nameError').textContent = 'Name should not contain numbers.';
      isValid = false;
    }
    if (!email.includes('@')) {
      document.getElementById('emailError').textContent = 'Email should contain @.';
      isValid = false;
    }
    if (!gender) {
      document.getElementById('genderError').textContent = 'Please select a gender.';
      isValid = false;
    }
    if (!interest) {
      document.getElementById('interestError').textContent = 'Please select an interest.';
      isValid = false;
    }
  
    if (isValid) {
      alert('Form submitted successfully!');
    }
  });

// membuat cookie
function setCookie(name, value, days) {
    let expires = "";
    if (days) {
        const date = new Date();
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
        expires = "; expires=" + date.toUTCString();
    }
    document.cookie = name + "=" + (value || "") + expires + "; path=/";
}

// membaca cookie
function getCookie(name) {
    const nameEQ = name + "=";
    const ca = document.cookie.split(';');
    for(let i = 0; i < ca.length; i++) {
        let c = ca[i];
        while (c.charAt(0) == ' ') c = c.substring(1, c.length);
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
    }
    return null;
}

// menghapus cookie
function eraseCookie(name) {
    document.cookie = name + '=; Max-Age=-99999999;';
}
