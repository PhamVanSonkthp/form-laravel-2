<button id="btn_delete_checkbox_item" onclick="onDeleteItemByCheckbox()" type="button" style="display: none;position: unset;
    width: 35px;
    background: red;
    color: white;
    border: aliceblue;
    padding-top: 5px;
    padding-bottom: 5px;
    border-radius: 20px;">
    <i class="fa-solid fa-x"></i>
</button>

<script>
    function onSelectCheckboxDeleteItem(){
        let is_checked = $('#check_box_delete_all').is(":checked")
        $('.checkbox-delete-item').prop('checked', is_checked)
        showButtonDeleteCheckbox(is_checked)

        $('#check_box_delete_all_footer').prop('checked', is_checked)
    }

    function onSelectCheckboxDeleteItemFooter(){
        let is_checked = $('#check_box_delete_all_footer').is(":checked")
        $('.checkbox-delete-item').prop('checked', is_checked)
        showButtonDeleteCheckbox(is_checked)

        $('#check_box_delete_all').prop('checked', is_checked)
    }

    function showButtonDeleteCheckbox(is_checked){

        if (is_checked){
            $('#btn_delete_checkbox_item').show(500)
        }else{
            $('#btn_delete_checkbox_item').hide(500)
        }
    }

    function onDeleteItemByCheckbox(){
        if (confirm("Xác nhận xóa") == true) {

            let ids = []

            $(".checkbox-delete-item:checked").each(function(){
                if ($(this).val()){
                    ids.push($(this).val());
                }
            });

            if (!ids.length){
                alert("Bạn chưa chọn hàng nào")
                return;
            }

            callAjax(
                "DELETE",
                "{{route('administrator.'.$prefixView.'.delete_many')}}",
                {
                    ids: ids,
                },
                (response) => {
                    window.location.reload()
                },
                (error) => {

                }
            )

        }
    }


    $(document).ready(function() {
        $('.checkbox-delete-item').change(function(){
            let number_not_check = 0;
            let number_check = 0;

            $(".checkbox-delete-item:checked").each(function(){
                number_check++
            });

            $(".checkbox-delete-item").each(function(){
                number_not_check++
            });

            const is_checked = number_check == number_not_check

            $('#check_box_delete_all').prop('checked', is_checked)
            $('#check_box_delete_all_footer').prop('checked', is_checked)
            showButtonDeleteCheckbox(number_check > 0)

        });
    });

</script>
