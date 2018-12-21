
var countClicks =0;
function addNewSlip(){
    countClicks++;
    $("#journalForm").html("<input type='hidden' name='count' value='"+countClicks+"'>")
  
    $("#addNew").append('<div class="col-8"><input type="text" name="goods_' +countClicks + '" class="form-control"> <label for="inputState"> <small>Goods</small></label> </div> <div class="col-4"> <input type="number" name="amount_' +countClicks + '" class="form-control" placeholder="N20000" > <label for="inputState"> <small>Amount</small></label></div>')
   
}

//  






//getting journal transactions 



$("#idForm").submit(function(e) {
    e.preventDefault(); // avoid to execute the actual submit of the form.
    $("#journalTable").html("")

    var formData = new FormData(document.getElementsByName('yourForm')[0]);// yourForm: form selector      
    $.ajax({
           type: "POST",
           url: "getJournalTransactions",
        //    data: formData, // serializes the form's elements.
           dataType: "JSON",
           data: new FormData(this),
           processData: false,
           contentType: false,
           success: function(data)
           {
             let number = 1
            for(let i = 0; i < data.length; ++i){
                number = number + i

                $("#journalTable").append("<tr><th scope='row'>"+ number+"</th><td>"+ data[i].customerName+"</td><td>"+ data[i].particular+"</td><td>"+ data[i].amount+"</td><td></td></tr>")
            }
           
           }
         });

   
});







