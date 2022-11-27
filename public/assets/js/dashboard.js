let preview = document.getElementById("preview_img");


$(function () {
  $("#sidebarCollapse").on("click", function () {
    $("#sidebar, #content").toggleClass("active");
  });
});

function readURL(input) {
  if (preview != null) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();

      reader.onload = function (e) {
        $("#preview").attr("src", e.target.result);
      };

      reader.readAsDataURL(input.files[0]);
    } else {
      preview.style.display = "none";
    }
  }
}

ClassicEditor.create(document.querySelector("#editor"))
  .then((editor) => {
    console.log(editor);
  })
  .catch((error) => {
    console.error(error);
  });
