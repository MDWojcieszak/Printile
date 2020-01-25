
function addToCart(){
    var cartID = document.getElementById("cartID").nodeValue();
    var quantity = document.getElementById("quantity").nodeValue();
    $.ajax({
      type: 'POST',
      url: 'localhost/Public/js/post.php',
      data: ['quantity' = quantity, 'productID' = cartID],
      success: function(data) {
          alert(data);
      }
    });
}
