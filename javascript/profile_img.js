const preview = document.getElementById("preview_img");
const fileinp = document.getElementById("fileToUpload");
fileinp.addEventListener("change", function () {
  const file = document.querySelector("input[type=file]").files[0];

  if (file) {
    const reader = new FileReader();
    preview.style.display = "block";

    reader.addEventListener("load", function () {
      console.log(this);
      preview.setAttribute("src", this.result);
    });
    reader.readAsDataURL(file);
  } else {
    preview.style.display = "none";
    preview.setAttribute("src", "");
  }
});

const remove = document.getElementById("remove");
remove.addEventListener("click", (e) => {
  file = "";
  previewFile();
});
