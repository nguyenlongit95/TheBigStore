/*
* Tai day code JS cho cac phan ajax
* Code se duoc tach ra thanh cac phan nho
* Cac phan se duoc thuc thi khi website load xong
* Voi 1 phan se co 1 ham ready de xac dinh code jQuery thuc thi
* */
$(document).ready(function(){
   $("#SelectMainCategories").change(function(){
        var idMainCategories = $(this).val();
        // Su dung ajax truyen du lieu o day
       $.get('admin/Product/LoadCategories/'+idMainCategories,function(Categories){
            $("#showCategoriesForAddProeuct").html(Categories);
       });
   });
});
// ///////////////////////////////////////////////////////////
// Cac ham jQuery load Ajax cho phan Contact
//////////////////////////////////////////////////////////////


// ///////////////////////////////////////////////////////////
// Cac ham jQuery load Ajax cho phan ratting
//////////////////////////////////////////////////////////////