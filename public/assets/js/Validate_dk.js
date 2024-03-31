const user_name = document.getElementById('user_name');
const password = document.getElementById('pass');
const password_confirm = document.getElementById('pass_cf');
const email = document.getElementById('email_user') ;
btn = document.getElementById('btn_sign_up');





// Check null và user name 
user_name.addEventListener('focusout', () => {
    const userNameValue = user_name.value.trim();
    let errorMessage = '';

    if (userNameValue === '') {
        errorMessage = 'Không để trống tên tài khoản';
    }else if (/\s/.test(userNameValue)) {
        errorMessage = 'Tên tài khoản không được chứa khoảng trắng';
    }else if (userNameValue.length < 6) {
        errorMessage = 'Tên tài khoản quá ngắn';
    }

    const errorSpan = document.getElementById("span_user");
    if (errorMessage !== '') {
        errorSpan.innerHTML = errorMessage;
        user_name.style.borderColor = "red";
    } else {
        errorSpan.innerHTML = '';
        user_name.style.borderColor = "gray";
    }
});


// Validate pass
password.addEventListener('input', () => {
    const passwordValue = password.value.trim();
    let errorMessage = '';

    if (passwordValue === '') {
        errorMessage = 'Không để trống mật khẩu';
    } else if (/\s/.test(passwordValue)) {
        errorMessage = 'Mật khẩu không được chứa khoảng trắng';
    } else if (passwordValue.length < 6) {
        errorMessage = 'Mật khẩu yếu, phải có ít nhất 6 ký tự';
    }

    const errorSpan = document.getElementById("span_pass");
    if (errorMessage !== '') {
        errorSpan.innerHTML = errorMessage;
        password.style.borderColor = "red";
    } else {
        errorSpan.innerHTML = '';
        password.style.borderColor = "gray";
    }
});


password_confirm.addEventListener('focusout', () => {
    const confirmPasswordValue = password_confirm.value.trim();
    const passwordValue = password.value.trim();
    let errorMessage = '';

    if (confirmPasswordValue === '') {
        errorMessage = 'Không để trống mật khẩu';
    } else if (passwordValue !== confirmPasswordValue) {
        errorMessage = 'Mật khẩu không khớp. Vui lòng nhập lại mật khẩu';
    }

    const errorSpan = document.getElementById("span_pass_check");
    if (errorMessage !== '') {
        errorSpan.innerHTML = errorMessage;
        password_confirm.style.borderColor = "red";
    } else {
        errorSpan.innerHTML = '';
        password_confirm.style.borderColor = "gray";
    }
});

email.addEventListener('focusout', () => {
    const emailValue = email.value.trim();
    let errorMessage = '';

    if (emailValue === '') {
        errorMessage = 'Không để trống email';
    } else if (!(/@gmail.com/.test(emailValue))) {
        errorMessage = 'Email không đúng định dạng @gmail.com';
    } else if (emailValue.length < 6) {
        errorMessage = 'email quá ngắn';
    }

    const errorSpan = document.getElementById("span_email");
    if (errorMessage !== '') {
        errorSpan.innerHTML = errorMessage;
        email.style.borderColor = "red";
    } else {
        errorSpan.innerHTML = '';
        email.style.borderColor = "gray";
    }

});



