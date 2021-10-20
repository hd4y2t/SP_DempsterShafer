<!-- Sticky Footer -->
<footer class="sticky-footer">
  <div class="container my-auto">
    <div class="copyright text-center my-auto">
      <span>Copyright <?php echo SITE_NAME . " " . Date('Y') ?></span>
    </div>
  </div>
</footer>
<script type="text/javascript">
  function gambar(a) {
    if (a.files && a.files[0]) {
      var reader = new FileReader();
      reader.onload = function(e) {
        document.getElementById('foto').src = e.target.result;
      }
      reader.readAsDataURL(a.files[0]);
    }

  }
</script>