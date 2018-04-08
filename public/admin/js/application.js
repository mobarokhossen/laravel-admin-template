/**
 * Created by Mobarok Hossen on 12/11/2017.
 */

$(document).ready(function () {
    let $body = $('body');
    const $modal = $('#footer-modal');


    $(".select-search").select2({
        theme: "bootstrap"
    });

    $("body").on('change', '.checkbox-parent', function () {
        $(this).parents('table').find('.checkbox-child').prop('checked', $(this).prop('checked'));
    });

    $body.on('click', '.reload-page', function () {
        location.reload();
    });

    $body.on('click', '.ajax-show', function (e) {
        e.preventDefault();

        $modal.modal('hide');

        let $this = $(this);

        $.ajax({
            type: "GET",
            url: $this.data('target'),
            dataType: "json",
            success: function(data) {
                let response = data.data;

                $modal.find('.modal-title').html( response.title );
                $modal.find('.modal-body').html( response.view );
            },
            error: function (xhr,status,error) {
                console.log('Error occurred!');
            }
        }).done(function( data, textStatus, jqXHR ) {
            $modal.modal('show');
        });
    });


    $body.on('click', '.delete-confirm', function () {
        let $this = $(this);

        bootbox.confirm({
            title: "Are you sure?",
            message: "You will not be able to recover this data and it's associated ones!",
            buttons: {
                confirm: {
                    label: 'Yes',
                    className: 'btn-success'
                },
                cancel: {
                    label: 'No',
                    className: 'btn-danger'
                }
            },
            callback: function (result) {
                if(result){
                    $.ajax({
                        url: $this.data('target'),
                        type: "DELETE",
                        dataType: "json",
                        success: function(data) {
                            bootbox.alert({
                                message: "Resource has been deleted.",
                                callback: function () {
                                    location.reload();
                                }
                            });
                        },
                        error: function(xhr, textStatus, errorThrown) {
                            let response = xhr.responseJSON;
                            bootbox.alert({
                                message:  'Oops...'+
                                    response.message+
                                    ' Error !!!'
                            });
                        }
                    });
                }
            }
        });
    });

    $("form input[type=submit], form button[type=submit]").click(function() {
        $(this).addClass('enable');
        $(this).prop('disabled', true);
        setTimeout(function() {
            $(".enable").prop('disabled', false);
            $("form input[type=submit], form button[type=submit]").removeClass('enable');
        }, 4000);
        $(this).parents('form').submit();
    });

    $body.on('change', '#scholarship_provider', function () {
        let $this = $(this);
        if( $this.val() == "organization"){
            $('#institute').hide();
            $('#organization').removeClass('hidden');
            $('#organization').show();
        }else{
            $('#institute').show();
            $('#organization').hide();
        }
    });
});
