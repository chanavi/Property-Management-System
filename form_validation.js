function sell() {
  document.getElementById("section-2").classList.remove("invisible");
  document.getElementById("section-3").classList.add("invisible");
}

function rent() {
  document.getElementById("section-3").classList.remove("invisible");
  document.getElementById("section-2").classList.add("invisible");
}

// Example starter JavaScript for disabling form submissions if there are invalid fields
(function () {
  'use strict'

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  var forms = document.querySelectorAll('.needs-validation')

  // Loop over them and prevent submission
  Array.prototype.slice.call(forms)
    .forEach(function (form) {
      form.addEventListener('submit', function (event) {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }

        form.classList.add('was-validated')
      }, false)
    })
})()
