const page_name = document.getElementById("page_name");
const email = document.getElementById("page_email");
const password = document.getElementById("page_Password");
const confirm_password = document.getElementById("confirm_password");
const check = document.getElementById("page_checkbox");
const submit = document.getElementById("page_submit");

email.addEventListener("change", (e) => {
  if (e.target.value !== "") {
    if (mail_check(email.value)) {
      email.style.borderColor = "green";
    } else {
      email.style.borderColor = "red";
    }
  } else {
    email.style.borderColor = "grey";
  }
});
page_name.addEventListener("change", (e) => {
  if (e.target.value !== "") {
    if (name_check(page_name.value)) {
      page_name.style.borderColor = "green";
    } else {
      page_name.style.borderColor = "red";
    }
  } else {
    page_name.style.borderColor = "grey";
  }
});

password.addEventListener("change", (e) => {
  if (password.value !== "") {
    if (password.value.length < 6) {
      password.style.borderColor = "red";
    } else {
      password.style.borderColor = "green";
    }
  } else {
    password.style.borderColor = "grey";
  }
});
confirm_password.addEventListener("change", (e) => {
  if (confirm_password.value === "") {
    confirm_password.style.borderColor = "grey";
  } else {
    if (pass_check(password.value, confirm_password.value)) {
      confirm_password.style.borderColor = "green";
    } else {
      confirm_password.style.borderColor = "red";
      console.log(confirm_password.value);
    }
  }
});

submit.addEventListener("click", (e) => {
  page_name = name_check(page_name.value);
  mailcheck = mail_check(email.value);
  passcheck = pass_check(password.value, confirm_password.value);

  if (page_name !== true) {
    alert("Invalid page Name !");
    e.preventDefault();
  } else if (mailcheck !== true) {
    alert("Invalid Email Address !");
    console.log(mailcheck);
    e.preventDefault();
  } else if (passcheck !== true || password.value.length < 6) {
    alert("Password is less than 6 digit or Password Mismatch !");
    e.preventDefault();
  } else {
    alert("skipped");
    e.preventDefault();
  }
});

const pass_check = (pass, confirm_pass) => {
  const compare = pass.localeCompare(confirm_pass);
  if (compare == 0) {
    return true;
  } else {
    return false;
  }
};
const mail_check = (email) => {
  var mailformat = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/g;
  if (email.match(mailformat)) {
    return true;
  } else {
    return false;
  }
};
const name_check = (name) => {
  var name_format = /^[a-zA-z 0-9]*$/;
  if (name.match(name_format) && name !== "") {
    return true;
  } else {
    return false;
  }
};

/*
if (page_name !== true) {
    alert("Invalid page Name !");
    e.preventDefault();
  } else if (mailcheck !== true) {
    alert("Invalid Email Address !");
    console.log(mailcheck);
    e.preventDefault();
  } else if (passcheck !== true || password.value.length < 6) {
    alert("Password is less than 6 digit or Password Mismatch !");
    e.preventDefault();
  } else {
    alert("skipped");
    e.preventDefault();
  }
  */
