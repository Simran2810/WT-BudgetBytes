$(document).ready(function() {
    var t = $('#katerina').DataTable( {
        "columnDefs": [ {
            "searchable": false,
            "orderable": false,
            "targets": 0
        } ],
         //vertical scroll
         "scrollY":        "250px",
        "scrollCollapse": true,

        //ordering start at column 1
        "order": [[ 1, 'desc' ]]
    } );
 
    t.on( 'order.dt search.dt', function () {
        t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        } );
    } ).draw();
} );

$(document).on("click", ".signup", function () { 
          $.ajax({    //create an ajax request to load_page.php
            type:"POST",
            url: "signmodal.php",             
            dataType: "text",   //expect html to be returned  
            data:{id:"submit"},               
            success: function(data){                    
                $("#smyModal").html(data); 
                // alert(data); 
            }

        });

});

$(document).on("click", ".submit", function () { 

        var y=document.forms["personal"]["FIRSTNAME"].value;
        var a=document.forms["personal"]["LASTNAME"].value;
        var b=document.forms["personal"]["HOMENUMBER"].value;
        var c=document.forms["personal"]["BARANGGY"].value;
        var d=document.forms["personal"]["STREET"].value;
        var e=document.forms["personal"]["CITYADDRESS"].value; 
        var f=document.forms["personal"]["ZIPCODE"].value; 
        // var g=document.forms["personal"]["UEMAIL"].value;
        var h=document.forms["personal"]["USERNAME"].value;
        var i=document.forms["personal"]["CONTACTNUMBER"].value;
        var j=document.forms["personal"]["PASS"].value; 
        var k=document.forms["personal"]["CUSTOMERID"].value;
        var passw=  /^[A-Za-z]\w{7,14}$/;  
        var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        // var uploadpath = $('#image').val();
        // var fileExtension = uploadpath.substring(uploadpath.lastIndexOf(".") + 1, uploadpath.length);

       
        if ((a=="Last Name" || a=="")  || (c=="Baranggy" || c=="") || (d=="Street" || d=="") ||  (e=="City Address" || e=="") || (f=="Zip Code" || f=="")  || (h=="username" || h=="") ||  (i=="Contact Number" || i=="") || (j=="Password" || j=="" )){
        alert("all field are required!");
        return false;
        // }else if (!filter.test(g)) {
        // alert('Please provide a valid email address');
        // g.focus; 
        // return false; 
        }else if(!j.match(passw)) {     
        alert(' Password must be atleast 8 to 15 characters. Only letter, numeric digits, underscore and first character must be a letter.')  ;
        return false;  
        }
        // else if (document.personal.condition.checked == false) {
        // alert ('pls. agree the term and condition of this Bakeshop');
        // return false;
        // }
        //  if ($('#image').val().length == 0) {
        //     // write error message
        //     alert("No seleted image!");
        //     return false;
        // }else if (!(fileExtension == "jpeg" || fileExtension == "png" || fileExtension == "jpg")){ 
        //     //error code - select only excel files
        //     alert("Invalid file extension. it must be jpg,jpeg and png.");
        //     return false;
        // }     
 
          $.ajax({    //create an ajax request to load_page.php
            type:"POST",
            url: "customer/controller.php?action=add",             
            dataType: "text",   //expect html to be returned  
            data:{

            button:"button",
            CUSTOMERID:k,
            FIRSTNAME:y,
            LASTNAME:a,
            HOMENUMBER:b,
            BARANGGY:c,
            STREET:d,
            CITYADDRESS:e,
            ZIPCODE:f, 
            USERNAME:h,
            CONTACTNUMBER:i,
            PASS:j
             },               
            success: function(data){                    
                $("#smyModal").html(data); 
                // alert(data); 

            }

        });
 
  
});  



$(document).on("click", ".Aorderid", function () {
   var p_id = $(this).data('id');
   // alert(p_id);
    // $(".modal-body #tabledata").val( p_id );

  
      $.ajax({    //create an ajax request to load_page.php
        type:"POST",
        url: "orderedproduct.php",             
        dataType: "text",   //expect html to be returned  
        data:{ordernumber:p_id},               
        success: function(data){                    
            $("#myModal").html(data); 
            // alert(data);

        }

    });
 
   
});

$(document).on("click", ".confirm" , function () {
   var confirm = $(this).data('id');
   // alert(confirm);
    // // $(".modal-body #tabledata").val( p_id );

  
      $.ajax({    //create an ajax request to load_page.php
        type:"POST",
        url: "orderedproduct.php",             
        dataType: "text",   //expect html to be returned  
        data:{id:confirm,actions:"confirm"},               
        success: function(data){                    
            // $("#status").html(data); 
        $("#myModal").html(data) ;
                      // alert(data);
        }

    });
 
   
});

$(document).on("click", ".cancel" , function () {
   var cancel = $(this).data('id');
   // alert(cancel);
    // // $(".modal-body #tabledata").val( p_id );

  
      $.ajax({    //create an ajax request to load_page.php
        type:"POST",
        url: "orderedproduct.php",             
        dataType: "text",   //expect html to be returned  
        data:{id:cancel,actions:"cancel"},               
        success: function(data){                    
            // $("#status").html(data); 
            // alert(data);
             $("#myModal").html(data) ;
              
        }

    });
 
   
});

$(document).on("click", "#btnclose" , function () {
 
  
      $.ajax({    //create an ajax request to load_page.php
        type:"POST",
        url: "orderedproduct.php",             
        dataType: "text",   //expect html to be returned  
        data:{close:"close"},               
        success: function(data){                    
            
            // alert("closing");
            
              
        }

    });
 
   
});

   
 $(document).on("click", ".orderid", function () {
   var p_id = $(this).data('id');
   // alert(p_id);
    // $(".modal-body #tabledata").val( p_id );
 
      $.ajax({    //create an ajax request to load_page.php
        type:"POST",
        url: "customer/listorderedproduct.php",             
        dataType: "text",   //expect html to be returned  
        data:{ordernumber:p_id},               
        success: function(data){                    
            $("#myOrdered").html(data); 
            // alert(data);
            
        }

    });
 
   
});
   
 $(document).on("click", ".MAINorder", function () {
   var productid = $(this).data('id');
   // alert(p_id);
    // $(".modal-body #tabledata").val( p_id );
 
      $.ajax({    //create an ajax request to load_page.php
        type:"POST",
        url: "addtocart.php",             
        dataType: "text",   //expect html to be returned  
        data:{product_id:productid},               
        success: function(data){                    
            $("#CART").html(data); 
            // alert(data);
            
        }

    });
 
   
});

 $(document).on("click", ".delete", function () {
   var productid = $(this).data('id');
   // alert(p_id);
    // $(".modal-body #tabledata").val( p_id );
 
      $.ajax({    //create an ajax request to load_page.php
        type:"GET",
        url: "add.php",             
        dataType: "text",   //expect html to be returned  
        data:{id:productid},               
        success: function(data){                    
            $("#CART").html(data); 
           // alert(data);
            
        }

    });
 
   
});
 
$(document).on("keyup", ".qty", function () {
   var productid = $(this).data('id');
// alert(productid);

    var qty = document.getElementById('QTY'+productid).value; 
    var originalqty =  document.getElementById('originalqty'+productid).value;
    var price =  document.getElementById('PRICE'+productid).value;
    var subtot;
 if (parseInt(originalqty)<parseInt(qty)){

  alert("The quantity that you put is greater that the availabe quantity of the product.");
  document.getElementById('QTY'+productid).value = originalqty;

    subtot = parseFloat(price) * parseFloat(originalqty);

} else{
   subtot = parseFloat(price) * parseFloat(qty);
}

 // subtot = parseFloat(price) * parseFloat(qty);

 // alert(subtot.toFixed(2))
 
  $.ajax({    //create an ajax request to load_page.php
        type:"GET",
        url: "addtocart.php?QTY"+productid+"="+ qty + "&subTOT"+productid+"=" +  subtot.toFixed(2),             
        dataType: "text",   //expect html to be returned  
        data:{updateid:productid},               
        success: function(data){                    
            $("#CART").html(data); 
           // alert(data);
            
        }

    });


// alert(subtot.toFixed(2));
//  alert('price:' + price + ' qty:' + qty + ' subtot: ' + subtot);


 document.getElementById('TOT'+productid).value = subtot.toFixed(2);
document.getElementById('Osubtot'+productid).value  =  document.getElementById('TOT'+productid).value;

  var table = document.getElementById('table');
    var items = table.getElementsByTagName('output');

    var sum = 0;
    for(var i=0; i<items.length; i++)
        sum +=   parseFloat(items[i].value);

    var output = document.getElementById('sum');
    output.innerHTML =  sum.toFixed(2);

    // $(".modal-body #tabledata").val( p_id );
 
     
 
   
});
 
$(document).on("change", ".qty", function () {
   var productid = $(this).data('id');
// alert(productid);

    var qty = document.getElementById('QTY'+productid).value; 
    var originalqty =  document.getElementById('originalqty'+productid).value;
    var price =  document.getElementById('PRICE'+productid).value;
    var subtot;
 if (parseInt(originalqty)<parseInt(qty)){

  alert("The quantity that you put is greater that the availabe quantity of the product.");
  document.getElementById('QTY'+productid).value = originalqty;

    subtot = parseFloat(price) * parseFloat(originalqty);

} else{
   subtot = parseFloat(price) * parseFloat(qty);
}



 // alert(subtot.toFixed(2))
 
  $.ajax({    //create an ajax request to load_page.php
        type:"GET",
        url: "addtocart.php?QTY"+productid+"="+ qty + "&subTOT"+productid+"=" +  subtot.toFixed(2),             
        dataType: "text",   //expect html to be returned  
        data:{updateid:productid},               
        success: function(data){                    
            $("#CART").html(data); 
           // alert(data);
            
        }

    });


// alert(subtot.toFixed(2));
//  alert('price:' + price + ' qty:' + qty + ' subtot: ' + subtot);


  document.getElementById('TOT'+productid).value = subtot.toFixed(2);
  document.getElementById('Osubtot'+productid).value  =  document.getElementById('TOT'+productid).value;

    var table = document.getElementById('table');
    var items = table.getElementsByTagName('output');

    var sum = 0;
    for(var i=0; i<items.length; i++)
        sum +=   parseFloat(items[i].value);

    var output = document.getElementById('sum');
    output.innerHTML =  sum.toFixed(2);

    // $(".modal-body #tabledata").val( p_id );
 
     
 
   
});
function validatepasswords(){
 var txt2 = document.getElementById("user_pass2").value;
   var passw=  /^[A-Za-z]\w{7,14}$/; 
  if(!txt2.match(passw))  {     
  alert('Password must be atleast 8 to 15 characters. Only letters, numeric digits, underscore and first character must be a letter.')  ;
  return false; 
  }
 }
function validatepass(){
  var txt = document.getElementById("user_pass").value; 
   var passw=  /^[A-Za-z]\w{7,14}$/; 
  if(!txt.match(passw))  {     
  alert('Password must be atleast 8 to 15 characters. Only letters, numeric digits, underscore and first character must be a letter.')  ;
  return false; 
  }
}
function profilepass(){
     var pass1 = document.getElementById("password1").value; 
      var pass2= document.getElementById("password2").value; 
        var passw=  /^[A-Za-z]\w{7,14}$/; 
        if(!pass1.match(passw)){
         alert('Password must be atleast 8 to 15 characters. Only letters, numeric digits, underscore and first character must be a letter.')  ;
        return false;  
        }else if (pass1 != pass2){
            alert('Password not match.')  ;
        return false; 
        }else if ((pass1=="" || pass1=="password" ) || (pass2 =="" || pass2 =="confirm password" )) {
        alert('Password must be filled up.')  ;
        return false;
        }


}

function validatecustomer(){
        var y=document.forms["personal"]["FIRSTNAME"].value;
        var a=document.forms["personal"]["LASTNAME"].value;
        // var b=document.forms["personal"]["HOMENUMBER"].value;
        var c=document.forms["personal"]["BARANGGY"].value;
        var d=document.forms["personal"]["STREET"].value;
        var e=document.forms["personal"]["CITYADDRESS"].value; 
        var f=document.forms["personal"]["ZIPCODE"].value; 
        // var g=document.forms["personal"]["UEMAIL"].value;
        var h=document.forms["personal"]["USERNAME"].value;
        var i=document.forms["personal"]["CONTACTNUMBER"].value;
        var j=document.forms["personal"]["PASS"].value; 
        var k=document.forms["personal"]["CUSTOMERID"].value;
        var passw=  /^[A-Za-z]\w{7,14}$/;  
        var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        // var uploadpath = $('#image').val();
        // var fileExtension = uploadpath.substring(uploadpath.lastIndexOf(".") + 1, uploadpath.length);

       
        if ((a=="Last Name" || a=="") ||  (c=="Barangay" || c=="") || (d=="Street" || d=="") ||  (e=="City Address" || e=="") || (f=="Zip Code" || f=="")  ||  (h=="username" || h=="") ||  (i=="Contact Number" || i=="") || (j=="Password" || j=="" )){
        alert("all field are required!");
        return false;
        // }else if (!filter.test(g)) {
        // alert('Please provide a valid email address');
        // g.focus; 
        // return false;
        }else if(!j.match(passw)) {     
        alert('Password must be atleast 8 to 15 characters. Only letters, numeric digits, underscore and first character must be a letter.')  ;
        return false;  
        }
        // else if (document.personal.condition.checked == false) {
        // alert ('pls. agree the term and condition of this Bakeshop');
        // return false;
        // }
        //  if ($('#image').val().length == 0) {
        //     // write error message
        //     alert("No seleted image!");
        //     return false;
        // }else if (!(fileExtension == "jpeg" || fileExtension == "png" || fileExtension == "jpg")){ 
        //     //error code - select only excel files
        //     alert("Invalid file extension. it must be jpg,jpeg and png.");
        //     return false;
        // }     
}
 