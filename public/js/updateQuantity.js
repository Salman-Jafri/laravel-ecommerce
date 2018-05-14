$(function () {
    $('.form-control').on('keydown keyup', function(e){
        if ($(this).val() > 5 || $(this).val() < 0
            && e.keyCode !== 46 // keycode for delete
            && e.keyCode !== 8 // keycode for backspace
        ) {
            e.preventDefault();
            $(this).val(5);
        }
    })

    $('.form-control').change(function (e) {

        //alert(this.getAttribute('data-id'));
        var rowId = this.getAttribute('data-id');
        var qty = 0;
        if(this.value==null || this.value=='')
        {
            $(this).val(1);
            return "";
        }
        else
            {
                qty =this.value;
            }
        // axios.patch('/cart/update', {
        //     rowId: rowId,
        //     qty: quantity
        // })
        //     .then(function (response) {
        //         console.log(response);
        //     })
        //     .catch(function (error) {
        //         console.log(error);
        //     });
        $.ajax({
            //url:'/cart/update/'+rowId+'/'+qty,
            method:"PUT",
            url:'/cart/update',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data:{

                'qty': qty,
                'rowId' : rowId
            },
            dataType:'JSON',
            success:function(data)
            {

                //alert(JSON.stringify(data.data.total));
                $('#total').text(data.data.total);
                $('#sub-total').text(data.data.sub_total);
                $('#tax').text(data.data.tax);

            },
            error:function(err)
            {
                console.log('my message' + err)
            }
        })

    })

});