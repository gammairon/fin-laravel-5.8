
let Gamma = {

    init: function(){
        this.sidebarToolgle();

        this.commonEvents();
    },


    block: function($element){
        $element.prepend('<div class="block-loader"><div class="block-loader-content"><i class="fa fa-cog fa-spin fa-3x fa-fw"></i></div></div>');
    },

    unblock: function($element){
        $element.find('.block-loader').remove();
    },

    commonEvents: function(){
        //Delete events
        $('.btn-delete').on('click', function(event) {
            event.preventDefault();
            var form_id = $(this).data('form');
            bootbox.confirm({
                message: "Вы уверены?",
                buttons: {
                    confirm: {
                        label: 'Да',
                        className: 'btn-success'
                    },
                    cancel: {
                        label: 'Нет',
                        className: 'btn-danger'
                    }
                },
                callback: function (result) {
                    if(!result)
                        return;

                    $( form_id ).submit();
                }
            });


        });

        //Numeric fields
        $('body').on('input propertychange', '.numeric', function(event) {
            var str = $.trim($(this).val());
            if(!$.isNumeric(str)){
                $(this).val(str.substring(0, str.length - 1));
            }
            else{
                $(this).val(str);
            }
        });

        //Чекбоксы в таблицах списков
        $('table .checkall').on('change', function(event) {
            let self = $(this);
            self.closest('table').find('.checkthis').each(function(index, el) {
                $(el).prop('checked', self.prop('checked'));
            });
        });

        //Date fields

        $('.date-field.from-current-date').each(function(index, el) {
            $(el).datetimepicker({
                locale: 'ru',
                format: 'DD/MM/YYYY',
                defaultDate: moment.now(),
                minDate: moment.now()
            });
        });

        $('.date-field.edit-date').each(function(index, el) {
            $(el).datetimepicker({
                locale: 'ru',
                format: 'DD/MM/YYYY',
            });
        });


        //Multi fields
        var multi_field_count = $('.multi-field').length;

        $('.add_multi_field').on('click', function(event) {
            event.preventDefault();

            let template = _.template($($(this).data('template')).html());

            $(this).closest('.multi-fields').find('.multi-fields-container').append(template({count : multi_field_count}));

            multi_field_count++;
        });

        $('.multi-fields').on('click', '.remove_multi_field', function(event) {
            event.preventDefault();

            $(this).closest('.multi-field').remove();
        });

        $('.photo').filemanager('image');

        $('.select2').select2();

        $('.select2-multi').select2();

        //Tooltips
        $('body').on('mouseenter', '.admin-lists .list', function (event) {
            $('.tooltip').remove();
            $('[data-toggle="tooltip"]', this).tooltip();
        });
    },

    sidebarToolgle: function(){
        $('#sidebarCollapse').on('click', function () {
            $('#sidebar').toggleClass('active');
            $(this).toggleClass('active');
        });
    },





};

$(document).ready(function() {
    Gamma.init();
});

