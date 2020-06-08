
function addToCart(id){
    $.ajax({
        url:'/cart/toggle/'+ id +'',
        dataType:'json',
        success: function ($data) {
            if($data['success']){
                $('#addToCart_'+id).hide();
                $('#deleteFromCart_'+id).show();
            }
        }
    });
}
function deleteFromCart(id) {
    $.ajax({
        url:'/cart/toggle/'+ id +'',
        dataType:'json',
        success: function ($data) {
            if($data['success']){
                $('#deleteFromCart_'+id).hide();
                $('#addToCart_'+id).show();

            }
        }
    });
}
