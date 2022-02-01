const first_name = document.getElementById("first_name");
const last_name = document.getElementById("last_name");
const email = document.getElementById("user_email");
const password = document.getElementById("user_Password");
const confirm_password = document.getElementById("confirm_password");
const check = document.getElementById("user_check");
const submit = document.getElementById("submit");
const male = document.getElementById("male");
const female = document.getElementById("female");
const message = document.getElementById("messages");
var gender;

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
first_name.addEventListener("change", (e) => {
  if (e.target.value !== "") {
    if (name_check(first_name.value)) {
      first_name.style.borderColor = "green";
    } else {
      first_name.style.borderColor = "red";
    }
  } else {
    first_name.style.borderColor = "grey";
  }
});
last_name.addEventListener("change", (e) => {
  if (e.target.value !== "") {
    if (name_check(last_name.value)) {
      last_name.style.borderColor = "green";
    } else {
      last_name.style.borderColor = "red";
    }
  } else {
    last_name.style.borderColor = "grey";
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
  if (confirm_password === "") {
    confirm_password.style.borderColor = "grey";
  } else {
    if (pass_check(password.value, confirm_password.value)) {
      confirm_password.style.borderColor = "green";
    } else {
      confirm_password.style.borderColor = "red";
    }
  }
});

submit.addEventListener("click", (e) => {
  firstname = name_check(first_name.value);
  lastname = name_check(last_name.value);
  mailcheck = mail_check(email.value);
  passcheck = pass_check(password.value, confirm_password.value);

  if (firstname !== true || lastname !== true) {
    alert("Invalid Name !");
    e.preventDefault();
  } else if (mailcheck !== true) {
    alert("Invalid Email Address !");
    console.log(mailcheck);
    e.preventDefault();
  } else if (passcheck !== true || password.value.length < 6) {
    alert("Password is less than 6 digit or Password Mismatch !");
    e.preventDefault();
  }
});

male.addEventListener("click", (e) => {
  gender = "male";
});
female.addEventListener("click", (e) => {
  gender = "female";
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
