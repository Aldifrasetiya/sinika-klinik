<footer class="footer">
    <div class="container-fluid">
        <div class="copyright ml-auto">
            made with <i class="fa fa-heart heart text-danger"></i> by <a href="https://www.themekita.com">UBP
                Team</a>
        </div>
    </div>
</footer>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function successRegister() {
      Swal.fire({
        position: 'top-center',
        icon: 'success',
        html: document.getElementById("msg").value,
        showConfirmButton: false,
        timer: 1500
      }).then(function() {
        window.location.href = 'index';
      })
    }
</script>