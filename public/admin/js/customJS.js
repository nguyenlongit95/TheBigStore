/*
* Su dung Ajax o day
* Load chi tiet cac danh muc con cua MainCategories
* Thuc hien cac chuc nang realTime cho cac thanh phan cua website
* */

/*
 * Function lay cac danh muc con cua categories
 * Su dung Ajax de lay du lieu
 * Sau khi lay du lieu thi innerHTML vao phan tiep theo
*/
function CallCategories(id){
    //alert(x);
    /*
    * Su dung Ajax o day
    * O day ta truyen tham so la Ajax GET
    * */
    // var url = "admin/";
    // var data = {
    //
    // };
    // var success = function(result){
    //
    // };
    // var dataType = "text";
    // $.post(url,data,success,dataType);

    $.get("admin/Categories/AjaxLoadCategories/"+id,function(result){
        $("#showCategories").html(result);
    });
}

/*
* Function get item form order
* Su dung Ajax de truyen du lieu len server
* Nhan du lieu va truyen sang view
* Tham so truyen di la id cua Order
* */
function CallDetailOrder(id){
    $.get('admin/BigStoreOrder/Update/'+id,function(result){
        alert(result);
    });
}

// Phuong thuc gui du lieu JSON len server
// Khai bao 1 bien chua arr kieu JSON

