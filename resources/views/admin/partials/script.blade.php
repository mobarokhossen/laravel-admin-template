<?php
/**
 * Created by PhpStorm.
 * User: Mobarok Hossen
 * Date: 12/2/2017
 * Time: 10:11 PM
 */
?>

<!--[if lt IE 9]>
<script src="{{asset('admin/global/plugins/respond.min.js')}}"></script>
<script src="{{asset('admin/global/plugins/excanvas.min.js')}}"></script>
<script src="{{asset('admin/global/plugins/ie8.fix.min.js')}}"></script>
<![endif]-->
<!-- BEGIN CORE PLUGINS -->
<script src="{{asset('admin/global/plugins/jquery.min.js')}}" type="text/javascript"></script>
<script src="{{asset('admin/global/plugins/bootstrap/js/bootstrap.min.js')}}" type="text/javascript"></script>
<script src="{{asset('admin/global/plugins/js.cookie.min.js')}}" type="text/javascript"></script>
<script src="{{asset('admin/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js')}}" type="text/javascript"></script>
<script src="{{asset('admin/global/plugins/jquery.blockui.min.js')}}" type="text/javascript"></script>
<script src="{{asset('admin/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js')}}" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="{{asset('admin/global/plugins/fancybox/source/jquery.fancybox.pack.js')}}" type="text/javascript"></script>
<script src="{{asset('admin/global/plugins/jquery-file-upload/js/vendor/jquery.ui.widget.js')}}" type="text/javascript"></script>
<script src="{{asset('admin/global/plugins/jquery-file-upload/js/vendor/tmpl.min.js')}}" type="text/javascript"></script>
<script src="{{asset('admin/global/plugins/jquery-file-upload/js/vendor/load-image.min.js')}}" type="text/javascript"></script>
<script src="{{asset('admin/global/plugins/jquery-file-upload/js/vendor/canvas-to-blob.min.js')}}" type="text/javascript"></script>
<script src="{{asset('admin/global/plugins/jquery-file-upload/blueimp-gallery/jquery.blueimp-gallery.min.js')}}" type="text/javascript"></script>
<script src="{{asset('admin/global/plugins/jquery-file-upload/js/jquery.iframe-transport.js')}}" type="text/javascript"></script>
<script src="{{asset('admin/global/plugins/jquery-file-upload/js/jquery.fileupload.js')}}" type="text/javascript"></script>
<script src="{{asset('admin/global/plugins/jquery-file-upload/js/jquery.fileupload-process.js')}}" type="text/javascript"></script>
<script src="{{asset('admin/global/plugins/jquery-file-upload/js/jquery.fileupload-image.js')}}" type="text/javascript"></script>
<script src="{{asset('admin/global/plugins/jquery-file-upload/js/jquery.fileupload-audio.js')}}" type="text/javascript"></script>
<script src="{{asset('admin/global/plugins/jquery-file-upload/js/jquery.fileupload-video.js')}}" type="text/javascript"></script>
<script src="{{asset('admin/global/plugins/jquery-file-upload/js/jquery.fileupload-validate.js')}}" type="text/javascript"></script>
<script src="{{asset('admin/global/plugins/jquery-file-upload/js/jquery.fileupload-ui.js')}}" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->

<!-- BEGIN PAGE LEVEL PLUGINS -->

<script src="{{ asset('admin/global/plugins/jqueryUI/jquery-ui.min.js') }}"></script>
<script src="{{ asset('admin/global/plugins/selectboxit/jquery.selectBoxIt.min.js') }}"></script>
<script src="{{asset('admin/global/plugins/select2/js/select2.full.min.js')}}" type="text/javascript"></script>
<script src="{{asset('admin/global/plugins/jquery-validation/js/jquery.validate.min.js')}}" type="text/javascript"></script>
<script src="{{asset('admin/global/plugins/jquery-validation/js/additional-methods.min.js')}}" type="text/javascript"></script>
<script src="{{asset('admin/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}" type="text/javascript"></script>
<script src="{{asset('admin/global/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js')}}" type="text/javascript"></script>
<script src="{{asset('admin/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js')}}" type="text/javascript"></script>
<script src="{{asset('admin/global/plugins/ckeditor/ckeditor.js')}}" type="text/javascript"></script>
<script src="{{asset('admin/global/plugins/bootstrap-markdown/lib/markdown.js')}}" type="text/javascript"></script>
<script src="{{asset('admin/global/plugins/bootstrap-markdown/js/bootstrap-markdown.js')}}" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->

<!-- SweetAlert -->
{{--<script src="{{ asset('plugins/sweetalert/sweetalert.min.js') }}"></script>--}}
<!-- DataTables -->
<script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
<!-- DataTables -->
<script src="{{ asset('plugins/datatables/dataTables.bootstrap.min.js') }}"></script>

@stack('scripts')

<!-- BEGIN THEME GLOBAL SCRIPTS -->
<script src="{{asset('admin/global/scripts/app.min.js')}}" type="text/javascript"></script>
<!-- END THEME GLOBAL SCRIPTS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="{{asset('admin/apps/scripts/inbox.min.js')}}" type="text/javascript"></script>

<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="{{asset('admin/pages/scripts/form-validation.min.js')}}" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<!-- Custom javascript -->
<script src="{{ asset('admin/js/bootbox.min.js') }}"></script>
<script src="{{ asset('admin/js/application.js') }}"></script>

<!-- END PAGE LEVEL SCRIPTS -->
<!-- BEGIN THEME LAYOUT SCRIPTS -->
<script src="{{asset('admin/layouts/layout/scripts/layout.min.js')}}" type="text/javascript"></script>
<script src="{{asset('admin/layouts/global/scripts/quick-sidebar.min.js')}}" type="text/javascript"></script>
<script src="{{asset('admin/layouts/global/scripts/quick-nav.min.js')}}" type="text/javascript"></script>
<!-- END THEME LAYOUT SCRIPTS -->

<script>
    $(document).ready(function()
    {

        $('#clickmewow').click(function()
        {
            $('#radio1003').attr('checked', 'checked');
        });
    })
</script>
