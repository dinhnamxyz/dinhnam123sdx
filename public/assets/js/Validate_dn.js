const user_name = document.getElementById('user_name');
const password = document.getElementById('pass');

btn = document.getElementById('btn_login');





// Check null và user name 
user_name.addEventListener('focusout', () => {
    const userNameValue = user_name.value.trim();
    let errorMessage = '';

    if (userNameValue === '') {
        errorMessage = 'Không để trống tên tài khoản';
    }else if (/\s/.test(userNameValue)) {
        errorMessage = 'Tên tài khoản không hợp lệ (Khoảng trắng)';
    }else if (userNameValue.length < 6) {
        errorMessage = 'Tên tài khoản không hợp lệ ( ngắn )';
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
password.addEventListener('focusout', () => {
    const passwordValue = password.value.trim();
    let errorMessage = '';

    if (passwordValue === '') {
        errorMessage = 'Không để trống mật khẩu';
    } else if (/\s/.test(passwordValue)) {
        errorMessage = 'Mật khẩu không được chứa khoảng trắng';
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







