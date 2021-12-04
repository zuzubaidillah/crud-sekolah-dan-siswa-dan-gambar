
  <!-- footer -->
  <footer class="footer mt-auto py-3">
    <div class="container">
      <span class="text-muted">FOOTER</span>
    </div>
  </footer>
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>
    function cek_nis(jenis,id=null){
      var nis = document.getElementById('nis').value;
      console.log(nis);
      if (nis=='') {
        $('#nis').removeClass('is-valid');
        $('#nis_info').remove();
      }else{
        $.ajax({
          type: "post",
          url: "./siswa_cek_nis.php",
          data: {
            nis_siswa: nis,
            id: id,
            jenis: jenis
          },
          dataType: "json",
          cache: false,
          success: function (response) {
            console.log(response);
            if (response.status=='sukses') {
              if($('#nis_info').length==0){
                $('#nis_info').remove();
                $('.nis').append('<div id="nis_info" class="invalid-feedback">NIS sudah digunakan!</div>');
              }else{
                $('#nis_info').addClass('invalid-feedback');
                $('#nis_info').removeClass('valid-feedback');
                $('#nis_info').html('NIS sudah digunakan!');
              }
              $('#nis').removeClass('is-valid');
              $('#nis').removeClass('is-invalid');
              $('#nis').addClass('is-invalid');
            }else{
              if($('#nis_info').length==0){
                $('#nis_info').remove();
                $('.nis').append('<div id="nis_info" class="valid-feedback">NIS aman!</div>');
              }else{
                $('#nis_info').removeClass('invalid-feedback');
                $('#nis_info').addClass('valid-feedback');
                $('#nis_info').html('NIS aman!');
              }
              $('#nis').removeClass('is-valid');
              $('#nis').removeClass('is-invalid');
              $('#nis').addClass('is-valid');
            }
          },
          error: function (a,b,c) {
            // console.log(a);
            // var convert_ke_json = JSON.parse(a.responseText);
            // console.log(convert_ke_json);
            // console.log(b);
            // console.log(c);
          }
        });
      }
    }
  </script>
</body>

</html>