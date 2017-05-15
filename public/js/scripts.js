//-------------------------------------------
//---------- Select2 search: Start ----------
//-------------------------------------------
$(".js-select-search").select2({
    placeholder: "Pasirinkite klientą...",
    minimumInputLength: 2,

    ajax: {
        url: function(params) {
            return '/clients/find/' + params.term;
        },
        delay: 250,
        dataType: 'json',
        data: function (params) {
            return {
                q: $.trim(params.term)
            };
        },
        processResults: function (data) {
            console.log(data);
            return {
                results: data
            };
        },
        cache: false
    }
});


$(".js-select-search2").on('change', function(e) {
    var id = $(this).val();

    $.ajax({
        url: '/clients/info/'+id, // This is the url we gave in the route
        dataType: 'json',
        success: function (data) {
            document.querySelector("#js--name").innerHTML = "";
            document.querySelector("#js--comp_vat").innerHTML = "";
            document.querySelector("#js--comp_id").innerHTML = "";
            document.querySelector("#js--address").innerHTML = "";
            document.querySelector("#js--phone").innerHTML = "";
            document.querySelector("#js--email").innerHTML = "";
            document.querySelector("#js--vip").innerHTML = "";
            document.querySelector("#js--note").innerHTML = "";

            var type = data.type;


            var name = '<div class="col-md-12 col-sm-12 col-xs-12 mail_list listing"> <div class="col-md-3 col-sm-3 col-xs-12">  Vardas arba pavadinimas</div> <div class="col-md-9 col-sm-9 col-xs-12">%name%</div> </div>';
            var nameReplace  = name.replace('%name%', data.name);

            var comp_id = '<div class="col-md-12 col-sm-12 col-xs-12 mail_list listing"> <div class="col-md-3 col-sm-3 col-xs-12">Įmonės kodas</div> <div class="col-md-9 col-sm-9 col-xs-12">%comp_id%</div> </div>';
            var comp_idReplace = comp_id.replace('%comp_id%', data.comp_id);

            var comp_vat = '<div class="col-md-12 col-sm-12 col-xs-12 mail_list listing"> <div class="col-md-3 col-sm-3 col-xs-12">PVM kodas</div> <div class="col-md-9 col-sm-9 col-xs-12">%comp_vat%</div> </div>';
            var comp_vatReplace = comp_vat.replace('%comp_vat%', data.comp_vat);

            var address = '<div class="col-md-12 col-sm-12 col-xs-12 mail_list listing"> <div class="col-md-3 col-sm-3 col-xs-12">Adresas</div> <div class="col-md-9 col-sm-9 col-xs-12">%address%, %city%, %country%, %postcode%</div> </div>';
            var mapObj = {'%address%': data.address, '%city%': data.city, '%country%': data.country, '%postcode%': data.postcode};
            addressReplace = address.replace(/%address%|%city%|%country%|%postcode%/gi, function(matched){
                return mapObj[matched];
            });

            var phone = '<div class="col-md-12 col-sm-12 col-xs-12 mail_list listing"> <div class="col-md-3 col-sm-3 col-xs-12">Telefonas</div> <div class="col-md-9 col-sm-9 col-xs-12">%phone%</div> </div>';
            var phoneReplace = phone.replace('%phone%', data.phone);

            var email = '<div class="col-md-12 col-sm-12 col-xs-12 mail_list listing"> <div class="col-md-3 col-sm-3 col-xs-12">El. paštas</div> <div class="col-md-9 col-sm-9 col-xs-12">%email%</div> </div>';
            var emailReplace = email.replace('%email%', data.email);

            var note = '<div class="col-md-12 col-sm-12 col-xs-12 mail_list listing"> <div class="col-md-3 col-sm-3 col-xs-12">Komentaras</div> <div class="col-md-9 col-sm-9 col-xs-12">%note%</div> </div>';
            var noteReplace = note.replace('%note%', data.note);

            var vipText;
            if(data.vip === 1) {
                vipText = "Svarbus klientas";
            } else {
                vipText = "Paprastas klientas"
            }

            var vip = '<div class="col-md-12 col-sm-12 col-xs-12 mail_list listing"> <div class="col-md-3 col-sm-3 col-xs-12">Svarbumas</div> <div class="col-md-9 col-sm-9 col-xs-12">%vip%</div> </div>';
            var vipReplace = vip.replace('%vip%', vipText);


            //var comp_id = data.comp_id;

            document.querySelector('#js--name').insertAdjacentHTML('beforeend', nameReplace);
            if(type === "1") {
                document.querySelector('#js--comp_id').insertAdjacentHTML('beforeend', comp_idReplace);
                document.querySelector('#js--comp_vat').insertAdjacentHTML('beforeend', comp_vatReplace);
            }
            document.querySelector('#js--address').insertAdjacentHTML('beforeend', addressReplace);
            document.querySelector('#js--phone').insertAdjacentHTML('beforeend', phoneReplace);
            document.querySelector('#js--email').insertAdjacentHTML('beforeend', emailReplace);
            document.querySelector('#js--note').insertAdjacentHTML('beforeend', noteReplace);
            document.querySelector('#js--vip').insertAdjacentHTML('beforeend', vipReplace);
            // document.querySelector('#js--userid').valueContent = 2;
            document.getElementById("js--userid").value = data.id;
        }
    });
});

//-------------------------------------------
//----------- Select2 search: End -----------
//-------------------------------------------


//---------------------------------------------------------------------
//----------- Add product fields (create order page): Start -----------
//---------------------------------------------------------------------

// var pricesVat = parseInt(prices_vat);
// var upVat = parseInt(vat);
// if(pricesVat === 1) {
// $(".js--price").change(function(){
//     var price = Number($(this).val());
//     var total = price - ((price * upVat) / (100 + upVat));
//     $(".js--price-calc"+ productIndex).val(total);
//
// });
// } else {
//     $(".js--price").change(function(){
//         var price = Number($(this).val());
//         var total = ((price * upVat) / 100) + price;
//         $(".js--price-calc0"+ productIndex).val(total);
//     });
// }



$(document).ready(function() {
    var titleValidators = {
            row: '.js--product-title',   // The title is placed inside a <div class="col-xs-4"> element
            validators: {
                notEmpty: {
                    message: 'Būtina įrašyti produkto ar paslaugos pavadinimą'
                }
            }
        },
        quantityValidators = {
            row: '.js--quantity',
            validators: {
                notEmpty: {
                    message: 'Būtina įrašyti kiekį'
                }
            }
        },
        priceValidators = {
            row: '.js--price',
            validators: {
                notEmpty: {
                    message: 'Būtina įrašyti kainą'
                },
                numeric: {
                    message: 'Kaina turi būti sudaryta tik iš skaičių'
                }
            }
        },
        productIndex = 0;

    $('#js--products')
        .formValidation({
            framework: 'bootstrap',
            icon: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                'product[0].product-title': titleValidators,
                'product[0].quantity': quantityValidators,
                'product[0].price': priceValidators
            }
        })

        // Add button click handler
        .on('click', '.add__btn', function() {
            productIndex++;
            var $template = $('#productTemplate'),
                $clone    = $template
                    .clone()
                    .removeClass('hide')
                    .removeAttr('id')
                    .attr('data-product-index', productIndex)
                    .insertBefore($template);

            // Update the name attributes
            $clone
                .find('[name="jsProductTitle"]').attr('name', 'product[' + productIndex + '].product-title').end()
                .find('[name="jsQuantity"]').attr('name', 'product[' + productIndex + '].quantity').end()
                .find('[name="jsPrice"]').attr('name', 'product[' + productIndex + '].price').end();

            // Add new fields
            // Note that we also pass the validator rules for new field as the third parameter
            $('#js--products')
                .formValidation('addField', 'product[' + productIndex + '].product-title', titleValidators)
                .formValidation('addField', 'product[' + productIndex + '].quantity', quantityValidators)
                .formValidation('addField', 'product[' + productIndex + '].price', priceValidators);


        })

        // Remove button click handler
        .on('click', '.remove__btn', function() {
            var $row  = $(this).parents('.form-group'),
                index = $row.attr('data-product-index');

            // // Remove fields
             $('#js--products')
                .formValidation('removeField', $row.find('[name="product[' + index + '].product-title"]'))
                .formValidation('removeField', $row.find('[name="product[' + index + '].quantity"]'))
                .formValidation('removeField', $row.find('[name="product[' + index + '].price"]'));

            // Remove element containing the fields
            $row.remove();
        });


    // var pricesVat = parseInt(prices_vat);

    // if(pricesVat === 1) {
    $(document).on('keyup', '.js--price', function() {
        var upVat = parseInt(vat);
            var price = Number($(this).val());
            var total = price - ((price * upVat) / (100 + upVat));
            var totals = total.toFixed(2)

            var priceWithoutVatElement = $(this)
                .closest('.product-row')
                .find('.js--price-calc');
            console.log(total);
            console.log(priceWithoutVatElement);
            priceWithoutVatElement.val(totals);

        });

    // } else {
    //     $(".js--price"+ productIndex).change(function(){
    //         var price = Number($(this).val());
    //         var total = ((price * upVat) / 100) + price;
    //         $(".js--price-calc"+ productIndex).val(total);
    //     });
    // }
});



//---------------------------------------------------------------------
//----------- Add product fields (create order page): End -----------
//---------------------------------------------------------------------