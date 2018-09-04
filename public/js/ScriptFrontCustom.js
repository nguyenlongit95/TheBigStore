function deleteItemWishList(id){
    $.get('deleteItemWishList/'+id,function(result){
        if(result == 1){
            alert("Delete Item success");
            location.reload();
        }else{
            alert("Delete Item Failed, Please check again");
        }
    });
}

function addItemToWishList(id){
    $.get('AddItemWishList/'+id,function(result){
        if(result == 1){
            alert("Add New Item success");
            location.reload();
        }else{
            alert("Add Item Failed, Please check again");
        }
    });
}

// Phuong thuc add moi san pham vao gio hang
/*
* Nhan tham so truyen vao la id cua san pham
* Sau khi lay duoc id cua san pham thi dung ajax day len server
* Tai server se xu ly va them vao gio hang
* Sau khi server xu ly xong thi truyen gia tri ve va xu ly tai day
* */
function getAddItemToCart(id){
    $.get('AddToCart/'+id,function(result){
        if(result == 1){
            alert("Add Item To Cart Success");
        }else{
            alert("Add Item To Cart Failed");
        }
    });
}