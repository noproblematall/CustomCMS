$(document).ready(function () {
    $('.toast_container').html('');
    $('.loader_container').addClass('display-none');
    $('#data_submit').click(function () {
        // console.log($('#select_admin').val())
        if ($('#select_admin').val()) {
            var time = 500;
            $('.toast_container').html('');
            $('.my_toast .toast').attr('data-delay', 1000);
            var form_elements = $('.form_container form');
            for (var i = 0; i < form_elements.length; i++) {
                if ($(form_elements[i]).attr('id') != 'search_form') {
                    if ($(form_elements[i]).attr('id') != 'table_search_form') {
                        console.log($(form_elements[i]).attr('id'));
                        var post_data = $(form_elements[i]).serialize();
                        var current_url = $(form_elements[i]).attr('action');
                        $.ajax({
                            url: current_url,
                            data: post_data,
                            type: 'post',
                            beforeSend: function () { $('.loader_container').removeClass('display-none'); },
                            success: function (data) {
                                if (data !== '') {
                                    console.log(data);
                                    $('.my_toast .toast-body').text(data);
                                    var current = $('.my_toast .toast').attr('data-delay');
                                    current = Number(current) + time;
                                    $('.my_toast .toast').attr('data-delay', current);
                                    // let clone = $('.my_toast .toast').clone();
                                    $('.toast_container').append($('.my_toast .toast').clone());
                                    $('.toast_container .toast').toast('show');
                                }
                            },

                        }).done(function () {
                            $('.loader_container').addClass('display-none');
                        })
                    }
                }
            }
        }
    })

    $('#select_admin').change(function () {
        console.log($(this).val())
        if ($(this).val()) {
            $('#admin_id').val($(this).val());
            $('#search_form').submit();
        } else {

        }
    })

    $('#select_table').change(function () {
        if ($(this).val()) {
            let data = $(this).val()
            console.log(data);
            $.ajax({
                url: '/column_name',
                data: { data: data },
                type: 'get',
                beforeSend:function (){$('.loader_container').removeClass('display-none');},
                success: function (data) {
                    var html = `<option value=''>Please select...</option>`;
                    $('#search_col').empty();
                    data.forEach(ele => {
                        if (ele != 'user_id' && ele != 'created_at' && ele != 'updated_at')
                            html += `<option value='${ele}'>${ele}</option>`
                    });
                    $('#search_col').append(html);
                }
            }).done(function (){
                $('.loader_container').addClass('display-none');
            })
        } else {
            $('#search_col').empty();
            $('#search_col').append(`<option value=''>Please select tables...</option>`);
        }
    })

    function make_table(data){
        $('#result_table thead').html("");
        if(data.length > 0){
            var txt="<tr><th>No</th>";
        }else{
            var txt="<tr class='text-center' style='color:red;'><th>Warning</th>";
        }
        
        $.each(data[0], function (key, val) {
            if(key == "id" || key == "user_id" || key == "created_at" || key == "updated_at") {

            } else {
                txt+="<th>"+key+"</th>";

            }
        });
        txt+="</tr>";
        console.log(txt)
        $('#result_table thead').append(txt);

        txt="";
        if(data.length > 0){
            var num_row = 0;
            $.each(data, function (key, val) {
                num_row++;
                txt+="<tr><td>"+num_row+"</td>";
                $.each(val, function (key, val) {
                    if(key == "id" || key == "user_id" || key == "created_at" || key == "updated_at") {
        
                    } else {
                        if(val == null) txt+="<td></td>";
                        else txt+="<td>"+val+"</td>";
        
                    }
                });
                txt+="</tr>";
            });
            $('#result_table tbody').append(txt);
            $('#result_table').DataTable();
        }else{
            txt="<td>There is no any data</td>";
            $('#result_table tbody').append(txt);
        }
        
        
    }

    $('#core_search').click(function () {
        let table = $('#select_table').val();
        let column_name = $('#search_col').val();
        let keyword = $('#search_keyword').val();
        if (table != '' && column_name != '' && keyword != '') {
            $('#edit_button').empty();
            $.ajax({
                url: '/core_search',
                data: { table: table, column: column_name, keyword: keyword },
                type: 'get',
                beforeSend:function (){$('.loader_container').removeClass('display-none');},
                success: function (data) {
                    $('#search_result').empty();
                    var cl = $('.clone').clone();
                    cl.css('display', 'block');
                    $(cl.find('table')[0]).attr('id','result_table');
                    $('#search_result').append(cl);
                    // console.log(data);
                    make_table(data);
                    
                }
            }).done(function (){
                $('.loader_container').addClass('display-none');
            })
        }

    })


    

})