<!-- Sticky Footer -->
      <footer class="sticky-footer">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved</span>
          </div>
        </div>
      </footer>

    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="<?php echo base_url()?>login/logout">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="<?php echo base_url();?>assets/admin/vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url();?>assets/admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?php echo base_url();?>assets/admin/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Page level plugin JavaScript-->
  <!-- <script src="<?php echo base_url();?>assets/admin/vendor/chart.js/Chart.min.js"></script> -->
  <script src="<?php echo base_url();?>assets/admin/vendor/datatables/jquery.dataTables.js"></script>
  <script src="<?php echo base_url();?>assets/admin/vendor/datatables/dataTables.bootstrap4.js"></script>
  <script src="<?php echo base_url();?>assets/admin/vendor/datatables/responsive/js/dataTables.responsive.min.js"></script>
  <script src="<?php echo base_url();?>assets/admin/vendor/datatables/responsive/js/responsive.bootstrap.min.js"></script>
  <script src="<?php echo base_url();?>assets/admin/vendor/videojs/video.min.js"></script>
  <script src="<?php echo base_url();?>assets/admin/vendor/videojs/youtube.min.js"></script>
  <script src="<?php echo base_url();?>assets/admin/vendor/videojs/videojs-vimeo.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?php echo base_url();?>assets/admin/js/sb-admin.min.js"></script>

  <!-- Demo scripts for this page-->
  <script src="<?php echo base_url();?>assets/admin/js/demo/datatables-demo.js"></script>
  <!-- <script src="<?php echo base_url();?>assets/admin/js/demo/chart-area-demo.js"></script> -->

  <script src="<?php echo base_url()?>assets/login/plugins/bootstrap-toastr/toastr.min.js"></script>

  <script src="<?php echo base_url();?>assets/admin/js/ajaxfileupload.js"></script>
  <script src="<?php echo base_url();?>assets/admin/vendor/summernote/summernote-lite.min.js"></script>
  
  <!-- <script type="text/javascript" src="<?php echo base_url();?>assets/admin/js/bootstrap-datetimepicker.js" charset="UTF-8"></script> -->


  <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>

  <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.5.0/js/bootstrap4-toggle.min.js"></script>

  <script src="<?php echo base_url();?>assets/admin/js/main.js"></script>
  <?php render_page_js($menu);?>
  <script>
      $('.summernote').summernote({
        toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['table', ['table']],
          ['insert', ['link']],
          ['view', ['fullscreen', 'codeview', 'help']]
        ]
      });
  </script>
</body>

</html>
