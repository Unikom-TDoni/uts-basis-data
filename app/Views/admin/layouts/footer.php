                <footer class="footer primary text-center">
                    <marquee><b>Copyright © 2021</b></marquee>
                </footer>
            </div>
        </div>
        <!-- END wrapper -->

        <script type="text/javascript">
            function ubahPassword()
            {
                if($("#old_password").val() == "")
                {
                    alert("Harap isi password lama");
                    return false;
                }

                if($("#new_password").val() == "")
                {
                    alert("Harap isi password baru");
                    return false;
                }

                if($("#new_password").val() != $("#confirm_new_password").val())
                {
                    alert("Konfirmasi password tidak sesuai!");
                    return false;
                }

                $.ajax(
                {
                    url: "<?= site_url('admin/users/password') ?>",
                    type: 'POST',
                    data: 
                    {
                        old_password: $("#old_password").val(),
                        password: $("#new_password").val()
                    },
                    success: function (request)
                    {
                        response = JSON.parse(request);

                        if(response.status != "OK")
                        {
                            alert(response.pesan);
                            return false;
                        }
                        else
                        {
                            swal({
                                title: "Berhasil!",
                                text: "Password berhasil diubah!",
                                type: "success"
                            }, function() {
                                location.reload();
                            });
                        }
                    }
                });
                
                return false;
            }
        </script>
    
        <script>
            var resizefunc = [];
        </script>

        <!-- jQuery  --> 
        <script src="<?= base_url('assets/admin')?>/js/jquery.min.js"></script>
        <script src="<?= base_url('assets/admin')?>/js/bootstrap.min.js"></script>
        <script src="<?= base_url('assets/admin')?>/js/waves.js"></script>
        <script src="<?= base_url('assets/admin')?>/js/wow.min.js"></script>
        <script src="<?= base_url('assets/admin')?>/js/jquery.nicescroll.js" type="text/javascript"></script>
        <script src="<?= base_url('assets/admin')?>/js/jquery.scrollTo.min.js"></script>
        <script src="<?= base_url('assets/admin')?>/assets/chat/moment-2.2.1.js"></script>
        <script src="<?= base_url('assets/admin')?>/assets/jquery-sparkline/jquery.sparkline.min.js"></script>
        <script src="<?= base_url('assets/admin')?>/assets/jquery-detectmobile/detect.js"></script>
        <script src="<?= base_url('assets/admin')?>/assets/fastclick/fastclick.js"></script>
        <script src="<?= base_url('assets/admin')?>/assets/jquery-slimscroll/jquery.slimscroll.js"></script>
        <script src="<?= base_url('assets/admin')?>/assets/jquery-blockui/jquery.blockUI.js"></script>

        <!-- sweet alerts -->
        <script src="<?= base_url('assets/admin')?>/assets/sweet-alert/sweet-alert.min.js"></script>
        <script src="<?= base_url('assets/admin')?>/assets/sweet-alert/sweet-alert.init.js"></script>
        
        <!-- Page Specific JS Libraries -->
        <script src="<?= base_url('assets/admin')?>/assets/dropzone/dropzone.min.js"></script>

        <!-- Examples -->
        <script src="<?= base_url('assets/admin')?>/assets/magnific-popup/magnific-popup.js"></script>
        <script src="<?= base_url('assets/admin')?>/assets/jquery-datatables-editable/jquery.dataTables.js"></script> 
        <script src="<?= base_url('assets/admin')?>/assets/datatables/dataTables.bootstrap.js"></script>
        <script src="<?= base_url('assets/admin')?>/assets/jquery-datatables-editable/datatables.editable.init.js"></script>

        <!-- flot Chart -->
        <script src="<?= base_url('assets/admin')?>/assets/flot-chart/jquery.flot.js"></script>
        <script src="<?= base_url('assets/admin')?>/assets/flot-chart/jquery.flot.time.js"></script>
        <script src="<?= base_url('assets/admin')?>/assets/flot-chart/jquery.flot.tooltip.min.js"></script>
        <script src="<?= base_url('assets/admin')?>/assets/flot-chart/jquery.flot.resize.js"></script>
        <script src="<?= base_url('assets/admin')?>/assets/flot-chart/jquery.flot.pie.js"></script>
        <script src="<?= base_url('assets/admin')?>/assets/flot-chart/jquery.flot.selection.js"></script>
        <script src="<?= base_url('assets/admin')?>/assets/flot-chart/jquery.flot.stack.js"></script>
        <script src="<?= base_url('assets/admin')?>/assets/flot-chart/jquery.flot.crosshair.js"></script>

        <!-- Counter-up -->
        <script src="<?= base_url('assets/admin')?>/assets/counterup/waypoints.min.js" type="text/javascript"></script>
        <script src="<?= base_url('assets/admin')?>/assets/counterup/jquery.counterup.min.js" type="text/javascript"></script>
        
        <!-- CUSTOM JS -->
        <script src="<?= base_url('assets/admin')?>/js/jquery.app.js"></script>

        <!-- Dashboard -->
        <script src="<?= base_url('assets/admin')?>/js/jquery.dashboard.js"></script>

        <!-- Chat -->
        <script src="<?= base_url('assets/admin')?>/js/jquery.chat.js"></script>

        <!-- Todo -->
        <script src="<?= base_url('assets/admin')?>/js/jquery.todo.js"></script>

         <!--Data Table -->
        <script src="<?= base_url('assets/admin')?>/assets/datatables/jquery.dataTables.min.js"></script>
        <script src="<?= base_url('assets/admin')?>/assets/datatables/dataTables.bootstrap.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $('#datatable').dataTable();
            });
        </script>

        <script src="<?= base_url('assets/admin')?>/assets/tagsinput/jquery.tagsinput.min.js"></script>
        <script src="<?= base_url('assets/admin')?>/assets/toggles/toggles.min.js"></script>
        <script src="<?= base_url('assets/admin')?>/assets/timepicker/bootstrap-timepicker.min.js"></script>
        <script src="<?= base_url('assets/admin')?>/assets/timepicker/bootstrap-datepicker.js"></script>
        <script type="text/javascript" src="<?= base_url('assets/admin')?>/assets/colorpicker/bootstrap-colorpicker.js"></script>
        <script type="text/javascript" src="<?= base_url('assets/admin')?>/assets/jquery-multi-select/jquery.multi-select.js"></script>
        <script type="text/javascript" src="<?= base_url('assets/admin')?>/assets/jquery-multi-select/jquery.quicksearch.js"></script>
        <script src="<?= base_url('assets/admin')?>/assets/bootstrap-inputmask/bootstrap-inputmask.min.js" type="text/javascript"></script>
        <script type="text/javascript" src="<?= base_url('assets/admin')?>/assets/spinner/spinner.min.js"></script>
        <script src="<?= base_url('assets/admin')?>/assets/select2/select2.min.js" type="text/javascript"></script>


        <script>
            jQuery(document).ready(function() {
                    
                // Tags Input
                jQuery('.tags').tagsInput({width:'auto'});

                // Form Toggles
                jQuery('.toggle').toggles({on: true});

                // Time Picker
                jQuery('#timepicker').timepicker({defaultTIme: false});
                jQuery('#timepicker2').timepicker({showMeridian: false});
                jQuery('#timepicker3').timepicker({minuteStep: 15});

                // Date Picker
                jQuery('#datepicker').datepicker();
                jQuery('#datepicker-inline').datepicker();
                jQuery('#datepicker-multiple').datepicker({
                    numberOfMonths: 3,
                    showButtonPanel: true
                });
                //colorpicker start

                $('.colorpicker-default').colorpicker({
                    format: 'hex'
                });
                $('.colorpicker-rgba').colorpicker();


                //multiselect start

                $('#my_multi_select1').multiSelect();
                $('#my_multi_select2').multiSelect({
                    selectableOptgroup: true
                });

                $('#my_multi_select3').multiSelect({
                    selectableHeader: "<input type='text' class='form-control search-input' autocomplete='off' placeholder='search...'>",
                    selectionHeader: "<input type='text' class='form-control search-input' autocomplete='off' placeholder='search...'>",
                    afterInit: function (ms) {
                        var that = this,
                            $selectableSearch = that.$selectableUl.prev(),
                            $selectionSearch = that.$selectionUl.prev(),
                            selectableSearchString = '#' + that.$container.attr('id') + ' .ms-elem-selectable:not(.ms-selected)',
                            selectionSearchString = '#' + that.$container.attr('id') + ' .ms-elem-selection.ms-selected';

                        that.qs1 = $selectableSearch.quicksearch(selectableSearchString)
                            .on('keydown', function (e) {
                                if (e.which === 40) {
                                    that.$selectableUl.focus();
                                    return false;
                                }
                            });

                        that.qs2 = $selectionSearch.quicksearch(selectionSearchString)
                            .on('keydown', function (e) {
                                if (e.which == 40) {
                                    that.$selectionUl.focus();
                                    return false;
                                }
                            });
                    },
                    afterSelect: function () {
                        this.qs1.cache();
                        this.qs2.cache();
                    },
                    afterDeselect: function () {
                        this.qs1.cache();
                        this.qs2.cache();
                    }
                });

                //spinner start
                $('#spinner1').spinner();
                $('#spinner2').spinner({disabled: true});
                $('#spinner3').spinner({value:0, min: 0, max: 10});
                $('#spinner4').spinner({value:0, step: 5, min: 0, max: 200});
                //spinner end

                // Select2
                jQuery(".select2").select2({
                    width: '100%'
                });
            });
        </script>

        <script type="text/javascript">
            /* ==============================================
            Counter Up
            =============================================== */
            jQuery(document).ready(function($) {
                $('.counter').counterUp({
                    delay: 100,
                    time: 1200
                });
            });
        </script>

        <script type="text/javascript" src="<?= base_url('assets/admin')?>/assets/gallery/isotope.js"></script>
        <script type="text/javascript" src="<?= base_url('assets/admin')?>/assets/magnific-popup/magnific-popup.js"></script> 
          
        <script type="text/javascript">
            $(window).load(function(){
                var $container = $('.portfolioContainer');
                $container.isotope({
                    filter: '*',
                    animationOptions: {
                        duration: 750,
                        easing: 'linear',
                        queue: false
                    }
                });

                $('.portfolioFilter a').click(function(){
                    $('.portfolioFilter .current').removeClass('current');
                    $(this).addClass('current');

                    var selector = $(this).attr('data-filter');
                    $container.isotope({
                        filter: selector,
                        animationOptions: {
                            duration: 750,
                            easing: 'linear',
                            queue: false
                        }
                    });
                    return false;
                }); 
            });
            $(document).ready(function() {
                $('.image-popup').magnificPopup({
                    type: 'image',
                    closeOnContentClick: true,
                    mainClass: 'mfp-fade',
                    gallery: {
                        enabled: true,
                        navigateByImgClick: true,
                        preload: [0,1] // Will preload 0 - before current, and 1 after the current image
                    }
                });
            });
        </script>
    </body>
</html>