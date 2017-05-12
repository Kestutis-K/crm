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



document.querySelector('#js--products').insertAdjacentHTML('beforeend', productsReplace);

//---------------------------------------------------------------------
//----------- Add product fields (create order page): End -----------
//---------------------------------------------------------------------