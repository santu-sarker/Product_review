const email = document.getElementById("email");

submit.addEventListener("click", (e) => {
  if (!mail_check(email.value)) {
    alert("Enter a Valid Email Address");
    e.preventDefault();
  }
});
email.addEventListener("change", (e) => {
  if (email.value === "") {
    email.style.borderColor = "grey";
  } else if (mail_check(email.value)) {
    email.style.borderColor = "green";
    console.log("green");
  } else email.style.borderColor = "red";
});
const mail_check = (email) => {
  var mailformat = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/g;
  if (email.match(mailformat)) {
    return true;
  } else {
    return false;
  }
};
