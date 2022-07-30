import Swal from 'sweetalert2';

//sweet alert
const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000,
})

window.Toast = Toast
